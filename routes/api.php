<?php

use App\Http\Controllers\Api\ApiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route :: group(['prefix' => '/v1'], function() {

    Route :: get('test', [ApiController :: class, 'getTest'])
        ->name('api.test');
});