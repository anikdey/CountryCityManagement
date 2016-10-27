<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 10/18/2016
 * Time: 4:45 PM
 */

namespace App\Services;


use App\Model\City;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

class CityServiceImpl implements CityService {

    private $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function getAllCities(){
        return $this->city->get();
    }

    public function getCityWithPagination($itemsPerPage){
        return $this->city->paginate($itemsPerPage);
    }

    public function saveCity(Request $request){
        if($request->file('cityPicture')) {
            $file = $request->file('cityPicture');
            $fileName = time().$file->getClientOriginalName();
            $file->storeAs("uploads", $fileName);
        } else {
            $fileName = "";
        }
        $this->city->cityName = $request->input('cityName');
        $this->city->cityDescription = $request->input('cityDescription');
        $this->city->numberOfDwellers = $request->input('numberOfDwellers');
        $this->city->location = $request->input('location');
        $this->city->weather = $request->input('weather');
        $this->city->country_id = $request->input('country_id');
        $this->city->cityPicture = $fileName;
        $this->city->save();
    }

    public function findCityById($id){
        return $this->city->find($id);
    }

    public function updateCityById($id, Request $request){
        if($request->file('cityPicture')) {
            $file = $request->file('cityPicture');
            $fileName = time().$file->getClientOriginalName();
            $file->storeAs("uploads", $fileName);
            if($request->input('cityOldImage')) {
                Storage::delete('/uploads/'.$request->input('cityOldImage'));
            }
        } else {
            $fileName =$request->input('cityOldImage');
        }
        $city = $this->findCityById($id);
        $city->cityName = $request->input('cityName');
        $city->cityDescription = $request->input('cityDescription');
        $city->numberOfDwellers = $request->input('numberOfDwellers');
        $city->location = $request->input('location');
        $city->weather = $request->input('weather');
        $city->country_id = $request->input('country_id');
        $city->cityPicture = $fileName;
        $city->save();
    }

    public function deleteCityById($id){
        $city = $this->findCityById($id);
        if($city->cityPicture) {
            Storage::delete('/uploads/'.$city->cityPicture);
        }
        $city->delete($id);
    }

    public function searchCityByCityNameAndCountryId($cityName, $countryId){
        return $this->city->where('cityName', 'like', "%".$cityName."%")->where('country_id', 'like', "%".$countryId."%")->get();
    }
} 