@extends('layouts.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5>List of all Countries</h5>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox-tools">
                                 <a href="{{ URL::to('admin/country/add-new') }}" class="pull-right"><span  class="label label-primary">Add New Country</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                   <div class="row">
                        @foreach($countries as $country)
                            <div class="col-lg-6">
                                <h4>{{ $country->countryName }}</h4>
                                @if($country->countryPicture)
                                    <img src="{{ URL::to('admin/images/'.$country->countryPicture) }}" height="150" width="200" alt="" />
                                @else
                                    No Image
                                @endif
                            </div>
                        @endforeach
                   </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5>List of all Cities</h5>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox-tools">
                                 <a href="{{ URL::to('admin/city/add-new') }}" class="pull-right"><span  class="label label-primary">Add New City</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        @foreach($cities as $city)
                            <div class="col-lg-6">
                                <h4>{{ $city->cityName }} | {{ $city->country->countryName }}</h4>
                                @if($city->cityPicture)
                                    <img src="{{ URL::to('admin/images/'.$city->cityPicture) }}" height="150" width="200" alt="" />
                                @else
                                    No Image
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection