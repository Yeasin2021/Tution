<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Exception;
use Illuminate\Support\Facades\Validator;

class Testy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'message show';

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
     * @return int
     */
    public function handle()
    {
        $this->info("The command is Successfully");
        $this->warn("This is warning Message");
        $this->error("This is error Message");
        $this->line("This is line Message");

        toastr()->success('App is running !!!');

    }
}
