<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class czz1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'czz:1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'czz 1';

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
        $this->call("inspire");

        $this->call("question");
    }

}
