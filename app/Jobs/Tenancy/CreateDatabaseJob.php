<?php

declare(strict_types=1);

namespace App\Jobs\Tenancy;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Jobs\DatabaseJob;
use Illuminate\Queue\SerializesModels;
use Stancl\Tenancy\Database\DatabaseManager;
use Stancl\Tenancy\Jobs\CreateDatabase;

class CreateDatabaseJob extends CreateDatabase
{

    public function handle(DatabaseManager $databaseManager)
    {
        if(!app()->isProduction()) {
            (new DeleteDatabaseJob($this->tenant))->handle();
        }

        parent::handle($databaseManager);
    }
}
