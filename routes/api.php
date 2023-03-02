<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'],function (){
    Route::get('apps', 'AppController');
    Route::get('users', 'UserController');
    Route::get('subscriptions', 'SubscriptionController');
    Route::get('platforms', 'PlatformController');
    Route::get('histories', 'HistoryController');
});
