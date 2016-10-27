<?php


Route::get("/","LoginController@showLoginPage");
Route::post("/login","LoginController@processLogin");
Route::get("/login","LoginController@showLoginPage");
Route::get("/logout","LoginController@processLogout");

Route::group(['middleware' => ['auth', 'roleAdmin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@welcomeScreen');
    Route::get('/country-list', 'CountryController@index');
    Route::get('/country/add-new', 'CountryController@create');
    Route::post('/country/add-new', 'CountryController@saveCountry');
    Route::get('/country/edit/{id}', 'CountryController@editCountryById');
    Route::post('/country/update/{id}', 'CountryController@updateCountryById');
    Route::get('/country/show/{id}', 'CountryController@showCountryById');
    Route::get('/country/delete/{id}', 'CountryController@deleteCountryById');
    Route::get('/country/download-country-image/{filename}', 'CountryController@downloadAttachment');


    Route::get('/city-list', 'CityController@index');
    Route::get('/city/add-new', 'CityController@create');
    Route::post('/city/add-new', 'CityController@saveCity');
    Route::get('/city/edit/{id}', 'CityController@editCityById');
    Route::post('/city/update/{id}', 'CityController@updateCityById');
    Route::get('/city/show/{id}', 'CityController@showCityById');
    Route::get('/city/delete/{id}', 'CityController@deleteCityById');
    Route::get('/city/search-city', 'CityController@searchCity');
    Route::post('/city/search-city', 'CityController@performSearch');


    Route::get('/images/{filename}', function ($filename)
    {
        $path = storage_path() . '\app\uploads\\' . $filename;
        if(!File::exists($path)) abort(404);
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    });

});





