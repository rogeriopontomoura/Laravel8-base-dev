<?php

declare(strict_types=1);

namespace App\Jobs\Tenancy;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Stancl\Tenancy\Jobs\DeleteDatabase;

class DeleteDatabaseJob extends DeleteDatabase
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public function handle()
    {
        if ($this->databaseExists()) {
            parent::handle();
        }

    }

    private function databaseExists()
    {
        $database = $this->tenant->database()->getName();

        return $this->tenant->database()->manager()
            ->databaseExists($database);
    }
}
