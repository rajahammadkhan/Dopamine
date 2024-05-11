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
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1">   <strong> Short Designation </strong></label>
                                            <textarea type="text" name="short_description"
                                                      id="short_description"  class="ckeditor form-control choices" cols="30"
                                                      rows="10">
                                                {{$multi_data->short_description}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class=" col-12">
                                            <label for="email_address1">   <strong> Long Designation </strong></label>
                                            <textarea type="text" name="long_description"
                                                      id="long_description"  class="ckeditor form-control choices" cols="30"
                                                      rows="10">
                                                {{$multi_data->long_description}}
                                            </textarea>
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

