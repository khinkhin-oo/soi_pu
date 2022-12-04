<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createTableArea extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createTableArea';

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
        Schema::create('area', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('area_name', 200)->nullable();
            $table->string('area_name_th', 200)->nullable();
            $table->enum('status',['0', '1'])->default('1');
            $table->unsignedInteger('user_id')->nullable();
            $table->longText('locations')->nullable();
            $table->timestamps();
        });
    }
}
