@extends('layouts.master')
@section('sidebar')
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    {!! HTML::image('img/profile_small.jpg', 'image', array('class'=>'img-circle')) !!}
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">
                                    Anik Dey
                                </strong>
                            </span>
                            <span class="text-muted text-xs block">
                                Admin
                                <b class="caret"></b>
                            </span>
                        </span>
                    </a>

                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        {{--<li><a href="profile.html">Profile</a></li>--}}
                        <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                        <li class="divider"></li>
                    </ul>
                </div>
                <div class="logo-element">
                    CCM+
                </div>
            </li>
            <li>
                <a href="{{ URL::to('admin') }}">
                    <i class="fa fa-dashboard"></i>
                    <span class="nav-label">Dashboards</span>
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('admin/country-list') }}">
                    <i class="fa fa-sliders"></i>
                    <span class="nav-label">Country</span> <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ URL::to('admin/country-list') }}" >
                            Country List
                            <span class="label label-primary pull-right">
                                <i class="fa fa-bars"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/country/add-new') }}">
                            Add New Country
                            <span class="label label-primary pull-right">NEW</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="{{ URL::to('admin/city-list') }}">
                    <i class="fa fa-sliders"></i>
                    <span class="nav-label">City</span> <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ URL::to('admin/city-list') }}" >
                            City List
                            <span class="label label-primary pull-right">
                                <i class="fa fa-bars"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/city/add-new') }}">
                            Add New City
                            <span class="label label-primary pull-right">NEW</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/city/search-city') }}">
                            Search City
                            <span class="label label-primary pull-right"><i class="fa fa-search"></i></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
@endsection