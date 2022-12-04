<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class addVaccinePathAndVaccineStatusAndVaccineReason extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addVaccinePathAndVaccineStatusAndVaccineReason';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Schema::table('models', function(Blueprint $table)
        {
            $table->enum('vaccine_status', ['NOTHING','PENDING','APPROVED','REJECTED']);
            $table->string('vaccine_doc_path');
            $table->string('vaccine_reason');
        });
    }
}
