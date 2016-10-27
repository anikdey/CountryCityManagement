<?php

namespace App\Http\Controllers;

use App\Services\CityService;
use App\Services\CountryService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller {

    private $countryService;
    private $cityService;
    public function __construct(CountryService $countryService, CityService $cityService)
    {
        $this->countryService = $countryService;
        $this->cityService = $cityService;
    }

   public function welcomeScreen() {


      // if(Auth::check() && Auth::user()->role == "ADMIN") {

           $countries = $this->countryService->getAllCountries();
           $cities = $this->cityService->getAllCities();
           $sidebar = view('inc.sidebar');
           $header = view('inc.header');
           $footer = view('inc.footer');

           return view("admin.dashboard.welcomeScreen")
               ->with('header', $header)
               ->with('sidebar', $sidebar)
               ->with('footer', $footer)
               ->with('countries', $countries)
               ->with('cities', $cities)
               ;
//       } else {
//           Session::flash('message', 'You are not authorized!');
//           return Redirect::to('/');
//       }


   }

}
