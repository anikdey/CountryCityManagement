@extends('layouts.master')
@section('title')
Add New City
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add New Country</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(array('url'=>'admin/city/add-new', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'role'=>'form')) !!}
                    <div class="form-group <?php  if($errors->has('cityName')){ echo 'has-error'; }?> ">
                        <label for="cityName" class="col-lg-3 control-label">
                            City Name
                        </label>
                        <div class="col-lg-9">
                            <input type="text" name="cityName" id="cityName" value="{{ Input::old('cityName') }}" placeholder="City Name" class="form-control">
                            @if ($errors->has('cityName')) <p class="help-block m-b-none">{{ $errors->first('cityName') }}</p> @endif
                        </div>
                    </div>
                    <div class="form-group <?php  if($errors->has('country_id')){ echo 'has-error'; }?> ">
                        <label for="country_id" class="col-lg-3 control-label">
                            Country
                        </label>
                        <div class="col-lg-9">
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="">Select a country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->countryName }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('country_id')) <p class="help-block m-b-none">{{ $errors->first('country_id') }}</p> @endif
                        </div>
                    </div>
                    <div class="form-group <?php  if($errors->has('numberOfDwellers')){ echo 'has-error'; }?> ">
                        <label for="numberOfDwellers" class="col-lg-3 control-label">
                            Number Of Dwellers
                        </label>
                        <div class="col-lg-9">
                            <input type="text" name="numberOfDwellers" id="numberOfDwellers" value="{{ Input::old('numberOfDwellers') }}" placeholder="Number Of Dwellers" class="form-control">
                            @if ($errors->has('numberOfDwellers')) <p class="help-block m-b-none">{{ $errors->first('numberOfDwellers') }}</p> @endif
                        </div>
                    </div>
                    <div class="form-group <?php  if($errors->has('location')){ echo 'has-error'; }?> ">
                        <label for="location" class="col-lg-3 control-label">
                            Location
                        </label>
                        <div class="col-lg-9">
                            <input type="text" name="location" id="location" value="{{ Input::old('location') }}" placeholder="Location" class="form-control">
                            @if ($errors->has('location')) <p class="help-block m-b-none">{{ $errors->first('location') }}</p> @endif
                        </div>
                    </div>
                    <div class="form-group <?php  if($errors->has('weather')){ echo 'has-error'; }?> ">
                        <label for="weather" class="col-lg-3 control-label">
                            Weather
                        </label>
                        <div class="col-lg-9">
                            <input type="text" name="weather" id="weather" value="{{ Input::old('weather') }}" placeholder="Weather" class="form-control">
                            @if ($errors->has('weather')) <p class="help-block m-b-none">{{ $errors->first('weather') }}</p> @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cityDescription" class="col-lg-3 control-label">
                            Description
                        </label>
                        <div class="col-lg-9">
                            <textarea placeholder="Description" name="cityDescription" id="cityDescription" class="form-control">{{ Input::old('cityDescription') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group <?php  if($errors->has('cityPicture')){ echo 'has-error'; }?> ">
                        <label class="col-lg-3 control-label">
                            Picture
                        </label>
                        <div class="col-lg-9">
                            <input type="file" name="cityPicture" class="form-control" value="{{ Input::old('cityPicture') }}" />
                            @if ($errors->has('cityPicture')) <p class="help-block m-b-none">{{ $errors->first('cityPicture') }}</p>@endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <button class="btn btn-sm btn-white" type="submit">Add City</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection