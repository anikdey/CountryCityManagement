<?php

namespace App\Http\Controllers;

use App\Services\CityService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Services\CountryService;
class CityController extends Controller
{
    private $countryService;
    private $cityService;

    public function __construct(CountryService $countryService, CityService $cityService)
    {
        $this->countryService = $countryService;
        $this->cityService = $cityService;
    }

    public function index() {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $cities = $this->cityService->getCityWithPagination(10);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');

            return view("admin.city.index")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('cities', $cities)
                ;
        } else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function create() {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.city.create")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ;
        } else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function saveCity(Request $request) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $rules = array(
                'cityName' => 'required|unique:cities',
                'country_id' => 'required',
                'cityPicture' => 'image|mimes:jpeg,png,jpg|max:2048'
            );
            $messages = array(
                'cityName.required' => 'Country name is required.',
                'cityName.unique' => 'City name has already been taken.',
                'cityPicture.image' => 'Max size 2MB and Allowed extensions [JPEG,PNG,JPG]',
            );
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return Redirect::to('/admin/city/add-new')->withErrors($validator)->withInput();
            } else {
                $this->cityService->saveCity($request);
                Session::flash('message', 'City added.');
                return Redirect::to('admin/city-list');
            }
        } else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function showCityById($id) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $city = $this->cityService->findCityById($id);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.city.show")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('city', $city)
                ;
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function editCityById($id) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $city = $this->cityService->findCityById($id);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.city.edit")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('city', $city)
                ;
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function updateCityById($id, Request $request) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $rules = array(
                'cityName' => 'required',
                'country_id' => 'required',
                'cityPicture' => 'image|mimes:jpeg,png,jpg|max:2048'
            );
            $messages = array(
                'cityName.required' => 'Country name is required.',
                'cityName.unique' => 'City name has already been taken.',
                'cityPicture.image' => 'Max size 2MB and Allowed extensions [JPEG,PNG,JPG]',
            );
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return Redirect::to('/admin/city/edit/'.$id)->withErrors($validator)->withInput();
            } else {
                $this->cityService->updateCityById($id, $request);
                Session::flash('message', 'City updated.');
                return Redirect::to('admin/city-list');
            }
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function searchCity() {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.city.search")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ;
        } else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function performSearch(Request $request) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $cityName = trim($request->input('cityName'));
            $countryId = trim($request->input('country_id'));

            $cities = $this->cityService->searchCityByCityNameAndCountryId($cityName, $countryId);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');

            return view("admin.city.searchResult")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('cityName', $cityName)
                ->with('countryId', $countryId)
                ->with('cities', $cities)
                ;
        } else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function deleteCityById($id) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $this->cityService->deleteCityById($id);
            Session::flash('message', 'City deleted.');
            return Redirect::to('admin/city-list');
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

}
