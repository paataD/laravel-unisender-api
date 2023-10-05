<?php
namespace AtLab\Unisender\Facades;

use AtLab\Unisender\Api;
use Illuminate\Support\Facades\Facade;
final class Unisender extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return Api::class;
    }
}
