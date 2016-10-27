@extends('layouts.master')
@section('title')
Country List
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-lg-2">
                            <h5>Country List</h5>
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
                                        <a href="{{ URL::to('admin/country/add-new') }}" class="pull-right"><span  class="label label-primary">New</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-responsive table-bordered  table-hover">
                        <thead>
                        <tr>
                            <th>Country Name</th>
                            <th>Description</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $country)
                                <tr>
                                    <td>{{ $country->countryName }}</td>
                                    <td>{{ $country->countryDescription }}</td>
                                    <td>
                                        @if($country->countryPicture)
                                            <img src="{{ URL::to('admin/images/'.$country->countryPicture) }}" height="50" width="50" alt="" />
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        {{--<a href="" class="label label-primary"><i class="fa fa-edit"></i></a>--}}
                                        <a href="{{ URL::to('admin/country/edit/'.$country->id) }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ URL::to('admin/country/show/'.$country->id) }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @if($country->countryPicture)
                                        <a href="{{ URL::to('admin/country/download-country-image/'.$country->countryPicture) }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        @endif
                                        <a href="{{ URL::to('admin/country/delete/'.$country->id) }}" class="btn btn-sm btn-danger" onClick="return checkDelete();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                        {{ $countries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection