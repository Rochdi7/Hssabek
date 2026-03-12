<?php

namespace App\Exports;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class GenericListExport implements FromQuery, WithHeadings, WithMapping, WithTitle, Responsable
{
    use Exportable;

    private string $fileName = 'export.xlsx';

    public function __construct(
        private readonly Builder $query,
        private readonly array $columns,
        private readonly string $title,
        string $filename = 'export',
    ) {
        $this->fileName = $filename . '.xlsx';
    }

    public function query(): Builder
    {
        return $this->query;
    }

    public function headings(): array
    {
        return array_values($this->columns);
    }

    public function map($row): array
    {
        $mapped = [];

        foreach (array_keys($this->columns) as $field) {
            $mapped[] = $this->resolveValue($row, $field);
        }

        return $mapped;
    }

    public function title(): string
    {
        return $this->title;
    }

    private function resolveValue($row, string $field): string
    {
        $value = $row;

        foreach (explode('.', $field) as $segment) {
            if (is_object($value)) {
                $value = $value->{$segment} ?? null;
            } elseif (is_array($value)) {
                $value = $value[$segment] ?? null;
            } else {
                $value = null;
                break;
            }
        }

        if ($value === null) {
            return '-';
        }

        if ($value instanceof \DateTimeInterface) {
            return $value->format('d/m/Y');
        }

        if (is_numeric($value) && str_contains($field, 'amount') || str_contains($field, 'total') || str_contains($field, 'price') || str_contains($field, 'balance') || str_contains($field, 'paid') || str_contains($field, 'due')) {
            return number_format((float) $value, 2, ',', ' ');
        }

        if (is_bool($value)) {
            return $value ? 'Oui' : 'Non';
        }

        return (string) $value;
    }
}
