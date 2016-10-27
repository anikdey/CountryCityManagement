<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 10/18/2016
 * Time: 1:47 PM
 */

namespace App\Services;


use App\Model\Country;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Storage;

class CountryServiceImpl implements CountryService {

     private $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function getAllCountries() {
        return $this->country->get();
    }

    public function getCountryWithPagination($itemsPerPage){
        return $this->country->paginate($itemsPerPage);
    }

    public function saveCountry(Request $request){
        if($request->file('countryPicture')) {
            $file = $request->file('countryPicture');
            $fileName = time().$file->getClientOriginalName();
            $file->storeAs("uploads", $fileName);
        } else {
            $fileName = "";
        }
        $this->country->countryName = $request->input('countryName');
        $this->country->countryDescription = $request->input('countryDescription');
        $this->country->countryPicture = $fileName;
        $this->country->save();
    }

    public function findCountryById($id){
        return $this->country->find($id);
    }

    public function updateCountryById($id, Request $request){
        if($request->file('countryPicture')) {
            $file = $request->file('countryPicture');
            $fileName = time().$file->getClientOriginalName();
            $file->storeAs("uploads", $fileName);
            if($request->input('countryOldImage')) {
                Storage::delete('/uploads/'.$request->input('countryOldImage'));
            }
        } else {
            $fileName =$request->input('countryOldImage');
        }
        $country = $this->country->find($id);
        $country->countryName = $request->input('countryName');
        $country->countryDescription = $request->input('countryDescription');
        $country->countryPicture = $fileName;
        $country->save();
    }

    public function deleteCountryById($id){
        $country = $this->findCountryById($id);
        if($country->countryPicture) {
            Storage::delete('/uploads/'.$country->countryPicture);
        }
        $country->delete($id);
    }
} 