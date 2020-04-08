<?php
Route::prefix('cate')->name('cate.')->group(function (){
    Route::get('index','CateController@index')->name('index');
    Route::post('del','CateController@del')->name('del');
    Route::get('add','CateController@add')->name('add');
    Route::post('doAdd','CateController@doAdd')->name('doAdd');
    Route::post('status','CateController@changeStatus')->name('status');
    Route::get('save','CateController@save')->name('save');
    Route::post('doSave','CateController@doSave')->name('doSave');
    Route::post('delAll',"CateController@delAll")->name('delAll');
    Route::get('ajaxList',"CateController@ajaxList")->name('ajaxList');
});
