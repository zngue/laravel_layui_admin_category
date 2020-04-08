<?php
$namespace = 'Zngue\Category\Http\Controller';
Route::namespace($namespace)->prefix('admin')->middleware(['web'])->group(function (){
    Route::middleware('checkLogin')->group(__DIR__.'/resources.php');
});
