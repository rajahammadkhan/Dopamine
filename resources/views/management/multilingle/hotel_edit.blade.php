@extends('management.layouts.master')
@section('title')
    Multi Lingle Edit - {{config('app.dashboard')}}

@endsection
@section('content')
    <div class="container-fluid px-4">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title"> Multi Lingle Edit</h4>
                            </li>

                        </ul>
                    </div>
                </div>
                <form action="{{route('multi-lingle.update',$multi_data->id)}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="multi_criteria" value="{{$_GET['multi_criteria']}}">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card py-4">
                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Title </strong></label>
                                            <div class="form-line">
                                                <input type="text" id="title"
                                                       class="form-control" name="title"
                                                       placeholder="Enter Title" value="{{$multi_data->title}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Description </strong></label>
                                                <input type="text"
                                                       value="{{$multi_data->description}}"
                                                       name="description"
                                                       id="description" class=" form-control"
                                                       cols="30"
                                                       rows="10"
                                                >
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Address </strong></label>
                                            <textarea type="text"
                                                      name="address"
                                                      id="address" class="ckeditor form-control choices"
                                                      cols="30"
                                                      rows="10"
                                            >
                                                  {{$multi_data->address}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class=" col-12">
                                            <label for="email_address1"><strong>Country</strong></label>
                                            <select class="form-control select2" name="country" id="country"
                                                    data-placeholder="Select">
                                                <option selected disabled value=""> select</option>
                                                @foreach($countries as $country)
                                                    <option {{$country->name == $multi_data->country ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class=" col-12">
                                            <label for="email_address1"><strong>City</strong></label>
                                            <input type="text" value="{{$multi_data->city}}" name="city" class="form-control" placeholder="City Name">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="card">

                                <div class="header">
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary  my-2 float-right">Submit</button>
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-12">
                                            <label for="email_address1"><strong>Language</strong></label>
                                            <input type="hidden" name="language_id" value="{{$language->id ?? ''}}">
                                            <input type="text" class="form-control" value="{{$language->language_name ?? ''}}" id="Quiz-type" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
@endsection
