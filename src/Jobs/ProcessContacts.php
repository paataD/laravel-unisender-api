<?php
namespace AtLab\Unisender\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Обработка загруженного файла контактов
 */
class ProcessContacts
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle() {



    }
}
