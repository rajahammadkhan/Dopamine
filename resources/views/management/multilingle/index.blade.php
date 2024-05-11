@extends('management.layouts.master')
@section('title')
    Multi Lingle Create - {{config('app.dashboard')}}

@endsection
@section('content')
    <div class="container-fluid px-4">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title"> Multi Lingle</h4>
                            </li>

                        </ul>
                    </div>
                </div>
                <form action="{{url('admin/multi-lingle')}}" method="get" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card py-4">
                                <div class="header">
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="email_address1"><strong>Multi Language</strong> </label>
                                            <select class="form-control select2" name="language_id" id="Quiz-type"
                                                    data-placeholder="Select" required>
                                                <option disabled selected value="">Select Option</option>
                                                @foreach($language as $lang)
                                                    <option  value="{{$lang->id}}" {{isset($_GET['language_id']) && $_GET['language_id'] == $lang->id ? 'selected' : ''}}>{{$lang->language_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-5">
                                            <label for="email_address1"><strong>Multi Criteria</strong> </label>
                                            <select class="form-control select2" name="multi_criteria" id="Quiz-type"
                                                    data-placeholder="Select" required>
                                                <option disabled selected value="">Select Option</option>
                                                    <option {{isset($_GET['multi_criteria']) && $_GET['multi_criteria'] == 'categories' ? 'selected' : ''}}  value="categories">Categories</option>
                                                    <option {{isset($_GET['multi_criteria']) && $_GET['multi_criteria'] == 'blog' ? 'selected' : ''}} value="blog">Blog</option>
                                                    <option {{isset($_GET['multi_criteria']) && $_GET['multi_criteria'] == 'testimonials' ? 'selected' : ''}} value="testimonials">Testimonial</option>
                                                    <option {{isset($_GET['multi_criteria']) && $_GET['multi_criteria'] == 'hotel' ? 'selected' : ''}} value="hotel">Hotel</option>
                                                    <option {{isset($_GET['multi_criteria']) && $_GET['multi_criteria'] == 'package' ? 'selected' : ''}} value="package">Package</option>
                                            </select>
                                        </div>
                                        <div class="col-2 mt-2 d-flex align-items-end">
                                            <button class="btn btn-primary float-left"> Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @if($multi_data != null)
                <div class="card">
                    <div class="header">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        </div>
                        <div class="body table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                <tr>
                                    <th class="col-lg-3">Title</th>
                                    <th class="col-lg-3">status</th>
                                    <th class="col-lg-3">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=1
                                ?>
                                @foreach($multi_data as $row)
                                    <tr>
                                        <td> {{$row->title}}</td>
                                        @if(in_array($row->id,$translated))
                                            <td><label class="badge badge-info" data-toggle="modal" data-target="#active_inactive">Translated</label>
                                            </td>
                                        @else
                                            <td><label class="badge badge-danger" data-toggle="modal" data-target="#active_inactive">Not Translated</label>
                                            </td>
                                        @endif
                                        <td>
                                            <a class="btn bg-blue btn-circle" href="{{route('multi-lingle.show',$row->id)}}{{"?language_id=".$_GET['language_id']."&multi_criteria=".$_GET['multi_criteria']}}">
                                                <i class="material-icons" href="">edit</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
@endsection

