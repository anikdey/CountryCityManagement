<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 10/18/2016
 * Time: 4:45 PM
 */

namespace App\Services;

use Illuminate\Http\Request;

use App\Http\Requests;
interface CityService {

    public function getCityWithPagination($itemsPerPage);

    public function getAllCities();

    public function saveCity(Request $request);

    public function findCityById($id);

    public function updateCityById($id, Request $request);

    public function deleteCityById($id);

    public function searchCityByCityNameAndCountryId($cityName, $countryId);
} 