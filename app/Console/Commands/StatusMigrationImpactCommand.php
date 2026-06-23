<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * READ-ONLY. Reports how the status-simplification migrations will affect
 * existing rows. Performs no writes. Safe to run on production before migrating.
 */
class StatusMigrationImpactCommand extends Command
{
    protected $signature = 'status:migration-impact';

    protected $description = 'READ-ONLY data-impact report for the status simplification migrations (no writes)';

    /** table => [legacy statuses that get remapped => target status] */
    private array $remap = [
        'invoices'        => [['draft', 'sent'], 'unpaid'],
        'vendor_bills'    => [['draft', 'posted'], 'unpaid'],
        'quotes'          => [['draft', 'sent'], 'active'],
        'purchase_orders' => [['draft', 'sent'], 'active'],
    ];

    public function handle(): int
    {
        foreach ($this->remap as $table => [$legacy, $target]) {
            $this->reportTable($table, $legacy, $target);
        }

        $this->newLine();
        $this->info('READ-ONLY report complete. No rows were modified.');

        return self::SUCCESS;
    }

    private function reportTable(string $table, array $legacy, string $target): void
    {
        $this->newLine();
        $this->line("=== {$table} ===");

        // BEFORE: counts grouped by raw status (ignore soft-deleted? include all for honesty)
        $before = DB::table($table)
            ->select('status', DB::raw('COUNT(*) as c'))
            ->groupBy('status')
            ->pluck('c', 'status')
            ->toArray();

        if (empty($before)) {
            $this->line('  (no rows)');
            return;
        }

        // AFTER: simulate the remap in memory (no writes).
        $after = [];
        foreach ($before as $status => $count) {
            $mapped = in_array($status, $legacy, true) ? $target : $status;
            $after[$mapped] = ($after[$mapped] ?? 0) + $count;
        }

        ksort($before);
        ksort($after);

        $remapped = 0;
        foreach ($legacy as $ls) {
            $remapped += $before[$ls] ?? 0;
        }

        $rows = [];
        $allStatuses = array_unique(array_merge(array_keys($before), array_keys($after)));
        sort($allStatuses);
        foreach ($allStatuses as $s) {
            $rows[] = [
                $s,
                $before[$s] ?? 0,
                $after[$s] ?? 0,
                in_array($s, $legacy, true) ? '→ ' . $target : '',
            ];
        }

        $this->table(['status', 'BEFORE', 'AFTER', 'remap'], $rows);
        $this->line("  Rows remapped: {$remapped}  (".implode('/', $legacy).' → '.$target.')');
        $this->line('  Total rows BEFORE: '.array_sum($before).'   Total rows AFTER: '.array_sum($after).'  (must be equal)');
    }
}
