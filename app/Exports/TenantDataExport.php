<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TenantDataExport implements WithMultipleSheets
{
    public function __construct(
        private readonly array $sheets
    ) {}

    public function sheets(): array
    {
        return $this->sheets;
    }
}
