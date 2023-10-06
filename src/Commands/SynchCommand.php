<?php

namespace AtLab\Unisender\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SynchCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'unisender:synch-command';

    /**
     * @var string
     */
    protected $description = 'Синхронизация списка email адресов';

    public function handle(): int
    {
        return self::SUCCESS;
    }
}

