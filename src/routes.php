<?php

use AtLab\Unisender\Jobs\ProcessContacts;
use Illuminate\Support\Facades\Route;

Route::get(config('unisender.host'), function ($request){
    $f = $request;
    ProcessContacts::dispatch();
});
