<?php

namespace App\Console\Commands;

use App\Service\Provider\ProviderOneService;
use App\Service\Provider\ProviderTwoService;
use Illuminate\Console\Command;

class ToDo extends Command
{
    private $providerOneService;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:todo';

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
    public function __construct(ProviderOneService $providerOneService, ProviderTwoService $providerTwoService)
    {
        $this->providerOneService = $providerOneService;
        $this->providerTwoService = $providerTwoService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $this->providerOneService->checkTodoList();
        $this->providerTwoService->checkTodoList();

        return Command::SUCCESS;
    }
}
