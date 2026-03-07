<?php

namespace App\Listeners;

use App\Services\Reports\ReportService;

class FlushReportCacheListener
{
    public function handle(object $event): void
    {
        ReportService::flushTenantCache();
    }
}
