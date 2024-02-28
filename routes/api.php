<?php

use App\Http\Controllers\Api\ApiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route :: group(['prefix' => '/v1'], function() {


    Route ::get('technologies', [ApiController :: class, 'getTechnologies'])
        ->name('api.technologies');
        
});