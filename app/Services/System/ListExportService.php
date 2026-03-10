<?php

namespace App\Services\System;

use App\Services\Tenancy\TenantContext;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ListExportService
{
    /**
     * Export a query to PDF (table format).
     *
     * @param  Builder|Collection  $source
     * @param  array  $columns  ['db_key' => 'Label FR', ...]
     * @param  string  $title   Page title
     * @param  string  $filename
     */
    public function toPdf(Builder|Collection $source, array $columns, string $title, string $filename): \Illuminate\Http\Response
    {
        $rows = $source instanceof Builder ? $source->get() : $source;

        $pdf = Pdf::loadView('backoffice.exports.list-pdf', [
            'title'   => $title,
            'columns' => $columns,
            'rows'    => $rows,
            'tenant'  => TenantContext::get(),
        ])->setPaper('a4', 'landscape');

        return $pdf->download($filename . '.pdf');
    }

    /**
     * Export a query to CSV (semicolon-delimited, UTF-8 BOM).
     *
     * @param  Builder|Collection  $source
     * @param  array  $columns  ['db_key' => 'Label FR', ...]
     * @param  string  $filename
     */
    public function toCsv(Builder|Collection $source, array $columns, string $filename): StreamedResponse
    {
        $rows = $source instanceof Builder ? $source->get() : $source;

        return response()->streamDownload(function () use ($rows, $columns) {
            $fp = fopen('php://output', 'w');

            // UTF-8 BOM
            fwrite($fp, "\xEF\xBB\xBF");

            // Header row
            fputcsv($fp, array_values($columns), ';');

            // Data rows
            foreach ($rows as $row) {
                $line = [];
                foreach (array_keys($columns) as $key) {
                    $line[] = $this->resolveValue($row, $key);
                }
                fputcsv($fp, $line, ';');
            }

            fclose($fp);
        }, $filename . '.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    /**
     * Resolve a dot-notation or callable value from a model.
     */
    private function resolveValue(mixed $row, string $key): string
    {
        // Support dot notation for relationships: 'customer.name'
        $value = data_get($row, $key);

        if ($value instanceof \DateTimeInterface) {
            return $value->format('d/m/Y');
        }

        if (is_numeric($value) && str_contains($key, 'price') || str_contains($key, 'total') || str_contains($key, 'amount') || str_contains($key, 'balance')) {
            return number_format((float) $value, 2, ',', ' ');
        }

        return (string) ($value ?? '-');
    }
}
