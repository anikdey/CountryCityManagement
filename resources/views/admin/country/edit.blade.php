@extends('layouts.master')
@section('title')
Edit Country
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Country</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(array('url'=>'admin/country/update/'.$country->id, 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'role'=>'form')) !!}
                    <div class="form-group <?php  if($errors->has('countryName')){ echo 'has-error'; }?> ">
                        <label for="countryName" class="col-lg-3 control-label">
                            Country Name
                        </label>
                        <div class="col-lg-9">
                            <input type="text" name="countryName" id="countryName" value="{{ $country->countryName }}" placeholder="Country Name" class="form-control">
                            @if ($errors->has('countryName')) <p class="help-block m-b-none">{{ $errors->first('countryName') }}</p> @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="countryDescription" class="col-lg-3 control-label">
                            Description
                        </label>
                        <div class="col-lg-9">
                            <textarea placeholder="Description" name="countryDescription" id="countryDescription" class="form-control">{{ $country->countryDescription }}</textarea>
                        </div>
                    </div>
                    <div class="form-group <?php  if($errors->has('countryPicture')){ echo 'has-error'; }?> ">
                        <label class="col-lg-3 control-label">
                            Picture
                        </label>
                        <div class="col-lg-9">
                            <input type="file" name="countryPicture" class="form-control" value="{{ Input::old('countryPicture') }}" />
                            @if ($errors->has('countryPicture')) <p class="help-block m-b-none">{{ $errors->first('countryPicture') }}</p>@endif
                            @if($country->countryPicture)
                                <img src="{{ URL::to('admin/images/'.$country->countryPicture) }}" height="50" width="50" alt="" />
                            @else
                                <p>Currently no image for country.</p>
                            @endif
                        </div>
                        <input type="hidden" name="countryOldImage" value="{{ $country->countryPicture }}" />
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <button class="btn btn-sm btn-white" type="submit">Update Country</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection