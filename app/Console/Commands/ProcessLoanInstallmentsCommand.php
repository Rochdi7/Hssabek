<?php

namespace App\Console\Commands;

use App\Models\Finance\LoanInstallment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProcessLoanInstallmentsCommand extends Command
{
    protected $signature = 'loan:process-installments';

    protected $description = 'Marque les échéances de prêts en retard si la date d\'échéance est dépassée';

    public function handle(): int
    {
        $this->info('Vérification des échéances de prêts...');

        $overdue = LoanInstallment::where('status', 'pending')
            ->where('due_date', '<', now()->startOfDay())
            ->get();

        if ($overdue->isEmpty()) {
            $this->info('Aucune échéance en retard.');
            return self::SUCCESS;
        }

        $count = 0;

        foreach ($overdue as $installment) {
            try {
                $installment->update(['status' => 'overdue']);
                $count++;
            } catch (\Throwable $e) {
                Log::error("Erreur traitement échéance {$installment->id}", [
                    'error' => $e->getMessage(),
                ]);
            }
        }

        $this->info("Terminé : {$count} échéance(s) marquée(s) en retard.");

        return self::SUCCESS;
    }
}
