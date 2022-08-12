<?php

namespace App\Console\Commands;

use App\Imports\TicketsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Excel;

class importTickets extends Command
{
    const FILEPATH = 'var/imports/tickets.csv';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:tickets';

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
     * @return int
     */
    public function handle(TicketsImport $ticketsImport)
    {
        Excel::import($ticketsImport, self::FILEPATH);

        $this->line("Import finished");
    }
}
