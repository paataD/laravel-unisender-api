<?php
namespace AtLab\Unisender\Facades;

use AtLab\Unisender\Api;
use Illuminate\Support\Facades\Facade;

/**
 * @method static subscribe(array $params)
 * @method static getLists()
 * @method static createList(array $params)
 * @method static unsubscribe(string[] $params)
 */

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
