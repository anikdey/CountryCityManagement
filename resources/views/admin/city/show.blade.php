@extends('layouts.master')
@section('title')
Show Country
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="col-lg-10">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-lg-2">
                            <h5>City Detail</h5>
                        </div>
                        <div class="col-lg-10">
                            <div class="ibox-tools">
                                <div class="row">
                                    <div class="col-lg-3">
                                        @if (Session::has('message'))
                                          <div class="text-success">{{ Session::get('message') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <a href="{{ URL::to('admin/city/add-new') }}" class="pull-right"><span  class="label label-primary">New</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <table class="table table-responsive table-bordered  table-hover ">
                                <tbody>
                                    <tr>
                                        <th>City Name</th>
                                        <td>{{ $city->cityName }}</td>
                                    </tr>
                                    <tr>
                                        <th>Country Name</th>
                                        <td>{{ $city->country->countryName }}</td>
                                    </tr>
                                    <tr>
                                        <th>Number Of Dwellers</th>
                                        <td>{{ $city->numberOfDwellers }}</td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <td>{{ $city->location }}</td>
                                    </tr>
                                    <tr>
                                        <th>Weather</th>
                                        <td>{{ $city->weather }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $city->cityDescription }}</td>
                                    </tr>
                                    <tr>
                                        <th>Picture</th>
                                        <td>
                                            @if($city->cityPicture)
                                            <br/>
                                                <img src="{{ URL::to('admin/images/'.$city->cityPicture) }}" height="150" width="200" alt="" />
                                            @else
                                                <p>No Image</p>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection