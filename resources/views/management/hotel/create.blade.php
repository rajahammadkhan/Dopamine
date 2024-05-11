@extends('management.layouts.master')
@section('title')
    Hotel Create - {{config('app.dashboard')}}
@endsection
@section('content')
    <style>

        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }

        /*
        *
        * ==========================================
        * FOR DEMO PURPOSES
        * ==========================================
        *
        */
        body {
            min-height: 100vh;
            /*background-color: #757f9a;*/
            /*background-image: linear-gradient(147deg, #757f9a 0%, #d7dde8 100%);*/
        }

        /*
</style>
    <div class="container-fluid px-4">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title"> Hotel</h4>
                            </li>

                        </ul>
                    </div>
                </div>
                <form action="{{route('hotel.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card py-4">

                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Title </strong></label>
                                            <div class="form-line">
                                                <input value="{{old('title') }}" type="text" id="title"
                                                       class="form-control" name="title"
                                                       placeholder="Title" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Description </strong></label>
                                            <div class="form-line">
                                                <input type="text" id="description"
                                                       class="form-control" name="description"
                                                       placeholder="Description" value="{{old('description') }}"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Address </strong></label>
                                            <textarea value="{{old('address') }}" type="text"
                                                      name="address"
                                                      id="address" class="ckeditor form-control choices"
                                                      cols="30"
                                                      rows="10"
                                            ></textarea>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class=" col-12">
                                            <label for="email_address1"><strong>Country</strong></label>
                                            <select class="form-control select2" name="country" id="country"
                                                    data-placeholder="Select">
                                                <option selected disabled value=""> select</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->name}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class=" col-12">
                                            <label for="email_address1"><strong>City</strong></label>
                                            <input value="{{old('city')}}" type="text" name="city" class="form-control" placeholder="City Name">
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
                                            <button class="btn btn-primary  my-2 float-right"> Submit</button>
                                        </div>
                                    </div>
                                    <div class="row my-1">


                                        <div class=" col-12">
                                            <label for="email_address1"><strong>Status</strong> </label>
                                            <select class="form-control select2" name="status" id="Quiz-type"
                                                    data-placeholder="Select">
                                                <option {{ old('status') == 1 ? 'Selected' : '' }}  value=1>Publish
                                                </option>
                                                <option {{ old('status') == 0 ? 'Selected' : '' }}  value=0>draft
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class=" col-12">
                                            <label for="email_address1"><strong>Category</strong></label>
                                            <select class="form-control select2" name="category_id" id="Quiz-type"
                                                    data-placeholder="Select">
                                                <option value=""> select</option>
                                                @foreach($cate as $row)
                                                    <option {{ old('category_id') == $row->id ? 'Selected' : '' }}   value={{$row->id}}>{{$row->title}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-12">
                                            <label for="email_address1"><strong>Language</strong></label>
                                            <input type="hidden" name="language_id" value="{{$language->id ?? ''}}">
                                            <input type="text" class="form-control" value="{{$language->language_name ?? ''}}" id="Quiz-type" disabled>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class=" col-12">
                                            <label for="email_address1"><strong>Hotel Type</strong></label>
                                            <select class="form-control select2" name="hotel_type" id="hotel_type"
                                                    data-placeholder="Select">
                                                <option selected disabled value=""> select</option>
                                                <option value="1">1 Star</option>
                                                <option value="2">2 Star</option>
                                                <option value="3">3 Star</option>
                                                <option value="4">4 Star</option>
                                                <option value="5">5 Star</option>
                                            </select>
                                        </div>
                                    </div>
                                    <label class="mt-3"><strong>Media Gallery</strong></label>
                                    <div class="card">
                                            <div class="multiimage main_duplicated_par">
                                                <div class="row wow-remove">
                                                    <div class="col">
                                                        <div class="main_container m-3">
                                                            <div class="main imagebox position-relative rounded-3 overflow-hidden">
                                                                <div class="select_img d-flex justify-content-center align-items-center">
                                                                    <div class="dz-message p-3 text-center">
                                                                        <h3>Click to upload.</h3>
                                                                    </div>
                                                                </div>
                                                                <input type="file" name="image[]"
                                                                       class="main_file w-100 h-100 form-control position-absolute  opacity-0"/>
                                                                <div class="img-thumb">
                                                                </div>
                                                            </div>
                                                            <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>

                                                            <a class="btn mt-3  fw-normal add_clone border-0 shadow-none">Add
                                                                More</a>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>

                <div class="d-none  cloner" style="display:none;">
                    <div class="row wow-remove">
                        <div class="col">
                            <div class="main_container m-3">
                                <div class="main imagebox position-relative rounded-3 overflow-hidden">
                                    <div class="select_img d-flex justify-content-center align-items-center">
                                        <div class="dz-message p-3 text-center">
                                            <h3>Click to upload.</h3>
                                        </div>
                                    </div>
                                    <input type="file" name="image[]"
                                           class="main_file w-100 h-100 form-control position-absolute  opacity-0"/>
                                    <div class="img-thumb">
                                    </div>
                                </div>
                                <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>
                                <a class="btn mt-3  fw-normal add_clone border-0 shadow-none">Add More</a>
                            </div>
                        </div>

                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        var maxField = 10; //Input fields increment limitation
                        var addButton = $('.add_clone'); //Add button selector
                        var wrapper = $('.team_main'); //Input field wrapper
                        var fieldHTML = jQuery('.cloner .row');
                        var fieldHTML2 = '<a href="javascript:void(0);" class="remove_button btn btn-dark mx-1">Cancel</a>';
                        var x = 1; //Initial field counter is 1

                        //Once add button is clicked
                        $(document).on('click', '.add_clone', function () {
                            var wow = $(this);
                            //Check maximum number of input fields
                            if (x < maxField) {
                                x++;
                                $(wow).parents('.multiimage').append($(fieldHTML).clone());
                            }
                        });
                        //Once remove button is clicked
                        $(document).on('click', '.remove_clone', function (e) {

                            $(this).parents('.wow-remove').remove(); //Remove field html
                            if ($(".multiimage .row").length == 0) {
                                $('.multiimage').append($(fieldHTML).clone());

                            }

                        });
                    });

                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#imageResult')
                                    .attr('src', e.target.result);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    $(function () {
                        $('#upload').on('change', function () {
                            readURL(input);
                        });
                    });

                    /*  ==========================================
                        SHOW UPLOADED IMAGE NAME
                    * ========================================== */
                    var input = document.getElementById('upload');
                    var infoArea = document.getElementById('upload-label');

                    input.addEventListener('change', showFileName);

                    function showFileName(event) {
                        var input = event.srcElement;
                        var fileName = input.files[0].name;
                        infoArea.textContent = 'File name: ' + fileName;
                    }

                </script>

@endsection

