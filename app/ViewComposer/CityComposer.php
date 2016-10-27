<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 10/18/2016
 * Time: 5:15 PM
 */

namespace App\ViewComposer;

use App\Services\CountryService;
use Illuminate\View\View;
class CityComposer {


    private $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }


    public function compose(View $view)
    {

        $view->with('countries', $this->countryService->getAllCountries());

    }
} 