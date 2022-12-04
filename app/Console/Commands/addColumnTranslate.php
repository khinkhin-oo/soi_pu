<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class addColumnTranslate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addColumnTranslate';

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
            $table->string('first_name_th')->collate('utf8_general_ci');
        });

        Schema::table('services', function(Blueprint $table)
        {
            $table->string('service_name_th')->collate('utf8_general_ci');
        });

        Schema::table('category', function(Blueprint $table)
        {
            $table->string('category_name_th')->collate('utf8_general_ci');
        });
    }
}
