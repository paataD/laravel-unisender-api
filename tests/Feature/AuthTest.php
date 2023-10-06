<?php
namespace AtLab\Tests\Feature;

use AtLab\Unisender\Facades\Unisender;
use AtLab\Unisender\Services\MailingLists;
use Carbon\Carbon;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function testAuthTest()
    {
        $testListName = "Тестовый лист: Автотест " . Carbon::now() ;
        $response = MailingLists::createList($testListName);
        $this->assertArrayHasKey('id', $response);
        $response = MailingLists::deleteList($response->id);
        $this->assertEmpty($response);
    }
}
