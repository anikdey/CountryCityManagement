<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Services\CountryService;

class CountryController extends Controller {

    private $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function index() {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $countries = $this->countryService->getCountryWithPagination(10);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');

            return view("admin.country.index")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('countries', $countries)
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
            return view("admin.country.create")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ;
        } else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function saveCountry(Request $request) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $rules = array(
                'countryName' => 'required|unique:countries',
                'countryPicture' => 'image|mimes:jpeg,png,jpg|max:2048'
            );
            $messages = array(
                'countryName.required' => 'Country name is required.',
                'countryName.unique' => 'Country name has already been taken.',
                'countryPicture.image' => 'Max size 2MB and Allowed extensions [JPEG,PNG,JPG]',
            );
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return Redirect::to('/admin/country/add-new')->withErrors($validator)->withInput();
            } else {
                $this->countryService->saveCountry($request);
                Session::flash('message', 'Country added.');
                return Redirect::to('admin/country-list');
            }
        } else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function showCountryById($id) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $country = $this->countryService->findCountryById($id);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.country.show")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('country', $country)
                ;
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function editCountryById($id) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $country = $this->countryService->findCountryById($id);
            $sidebar = view('inc.sidebar');
            $header = view('inc.header');
            $footer = view('inc.footer');
            return view("admin.country.edit")
                ->with('header', $header)
                ->with('sidebar', $sidebar)
                ->with('footer', $footer)
                ->with('country', $country)
                ;
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function updateCountryById($id, Request $request) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $rules = array(
                'countryName' => 'required',
                'countryPicture' => 'image|mimes:jpeg,png,jpg|max:2048'
            );
            $messages = array(
                'countryName.required' => 'Country name is required.',
                'countryName.unique' => 'Country name has already been taken.',
                'countryPicture.image' => 'Max size 2MB and Allowed extensions [JPEG,PNG,JPG]',
            );
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return Redirect::to('/admin/country/edit/'.$id)->withErrors($validator)->withInput();
            } else {
                $this->countryService->updateCountryById($id, $request);
                Session::flash('message', 'Country updated.');
                return Redirect::to('admin/country-list');
            }
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function deleteCountryById($id) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            $this->countryService->deleteCountryById($id);
            Session::flash('message', 'Country deleted.');
            return Redirect::to('admin/country-list');
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }

    public function downloadAttachment($fileName) {
        if(Auth::check() && Auth::user()->role == "ADMIN") {
            return response()->download(storage_path('\app\uploads\\' . $fileName));
        }else {
            Session::flash('message', 'You are not authorized!');
            return Redirect::to('/');
        }
    }


}
