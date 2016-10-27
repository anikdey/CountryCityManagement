<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 10/18/2016
 * Time: 1:45 PM
 */
namespace App\Services;

use Symfony\Component\HttpFoundation\Request;

interface CountryService {

    public function getCountryWithPagination($itemsPerPage);

    public function getAllCountries();

    public function saveCountry(Request $request);

    public function findCountryById($id);

    public function updateCountryById($id, Request $request);

    public function deleteCountryById($id);
} 