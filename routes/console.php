<?php

use Illuminate\Foundation\Console\ClosureCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    /** @var ClosureCommand $this */
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

/*
|--------------------------------------------------------------------------
| Scheduled Tasks
|--------------------------------------------------------------------------
|
| Cron entry required on server:
| * * * * * cd /path-to-project && php artisan schedule:run >> /dev/null 2>&1
|
*/

// Generate invoices from recurring templates every day at 06:00
Schedule::command('invoice:generate-recurring')->dailyAt('06:00');

// Send payment reminders every day at 08:00
Schedule::command('invoice:send-reminders')->dailyAt('08:00');

// Check and expire subscriptions every day at 00:30
Schedule::command('subscription:check-expired')->dailyAt('00:30');

// Mark overdue loan installments every day at 07:00
Schedule::command('loan:process-installments')->dailyAt('07:00');
