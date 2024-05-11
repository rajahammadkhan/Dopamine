@extends('management.layouts.master')
@section('title')
    Package Create - {{config('app.dashboard')}}
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
                                <h4 class="page-title"> Package</h4>
                            </li>

                        </ul>
                    </div>
                </div>
                <form action="{{route('package.store')}}" method="POST" enctype="multipart/form-data">
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
                                                       placeholder="Package Title" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Description </strong></label>
                                            <textarea value="{{old('description') }}" type="text"
                                                      name="description"
                                                      id="description" class="ckeditor form-control choices"
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
                            <div class="card py-4">

                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Meta Title </strong></label>
                                            <div class="form-line">
                                                <input value="{{old('meta_title') }}" type="text" id="erp_question_text"
                                                       class="form-control" name="meta_title"
                                                       placeholder="Meta Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Meta Description </strong></label>
                                            <textarea value="{{old('erp_order_message') }}" type="text"
                                                      name="meta_description"
                                                      id="erp_order_message" class="ckeditor form-control choices"
                                                      cols="30"
                                                      rows="10"
                                            ></textarea>
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Meta Keywords </strong></label>

                                            <div class="form-line">
                                                <input value="{{old('meta_keywords')}}" type="text"
                                                       id="erp_question_text"
                                                       class="form-control" name="meta_keywords"
                                                       placeholder="Meta Keywords">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card py-4">
                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <div class="d-flex justify-content-between">
                                                <label for="email_address1"> <strong> Highlights </strong></label>
                                                <button class="btn bg-transparent" onclick="handleClone(this)" type="button">+</button>
                                            </div>
                                            <div class="form-line focused highlightContainer ">
                                                <div class="highlight d-flex">
                                                    <input value="" type="text" class="form-control " name="highlights[]" placeholder="Highlights">
                                                    <button class="bg-transparent border-0" onclick="handleRemove(this)" type="button">X</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card py-4">
                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <div class="d-flex justify-content-between">
                                                <label for="email_address1"> <strong> Itinerarys </strong></label>
                                                <button class="btn bg-transparent" onclick="handleClone(this)" type="button">+</button>
                                            </div>
                                            <div class="form-line focused highlightContainer ">
                                                <div class="highlight d-flex w-100">
                                                    <div class="form-line w-100 p-3 my-3 shadow">
                                                        <div class="d-flex">
                                                            <input value="" type="text"
                                                                   class="form-control" name="itinerary_name[]"
                                                                   placeholder="Itinerary Name">
                                                            <button class="bg-transparent border-0" onclick="handleRemove(this)" type="button">X</button>

                                                        </div>

                                                        <textarea value="{{old('itinerary_description') }}" type="text"
                                                                  name="itinerary_description[]"
                                                                  cols="30"
                                                                  rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card py-4">
                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Inclusions </strong></label>
                                            <textarea value="{{old('inclusions') }}" type="text"
                                                      name="inclusions"
                                                      id="inclusions" class="ckeditor form-control choices"
                                                      cols="30"
                                                      rows="10">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Exclusions </strong></label>
                                            <textarea value="{{old('exclusions') }}" type="text"
                                                      name="exclusions"
                                                      id="exclusions" class="ckeditor form-control choices"
                                                      cols="30"
                                                      rows="10">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card py-4">
                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <div class="d-flex justify-content-between">
                                                <label for="email_address1"> <strong> Faqs </strong></label>
                                                <button class="btn bg-transparent" onclick="handleClone(this)" type="button">+</button>
                                            </div>
                                            <div class="form-line focused highlightContainer ">
                                                <div class="highlight d-flex flex-column shadow p-3 my-3">
                                                    <div class="d-flex w-100 align-items-center">
                                                        <div class="w-100">
                                                            <input value="" type="text" class="form-control" name="faqs_question[]" placeholder="Faqs Title">
                                                            <input value="" type="text" class="form-control" name="faqs_answer[]" placeholder="Faqs description">
                                                        </div>
                                                        <button style="width: 54px" class="bg-transparent btn border-0" onclick="handleRemove(this)" type="button">X</button>
                                                    </div>
                                                  </div>
                                            </div>
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
                                    <div class="row my-1">
                                        <div class=" col-12 mt-4">
                                            <label for="email_address1"><strong>Select Package</strong> </label>
                                            <select class="form-control select2" name="select_package" id="Quiz-type"
                                                    data-placeholder="Select">
                                                <option {{ old('select_package') == 1 ? 'Selected' : '' }}  value=1>Enquiry Package
                                                </option>
                                                <option {{ old('select_package') == 0 ? 'Selected' : '' }}  value=0>Selling Package
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row my-2 mt-5 mb-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email_address1"><strong>Hotels</strong></label>
                                                @if($hotel->isNotEmpty())
                                                    @foreach($hotel as $hotels)
                                                        <label class="d-block">
                                                            <input value="{{$hotels->id}}" type="checkbox"
                                                                   class="continue_selling" name="hotel_id[]"
                                                                   class="py-2">
                                                            <span class="py-2">{{$hotels->title}}</span>
                                                            @endforeach
                                                            @else
                                                                <h6>
                                                                    No Hotels found
                                                                </h6>
                                                        @endif
                                            </div>
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
                                    <label class="mt-3"><strong>Media Gallery</strong></label>
                                    <div class="card">
                                        <label for="email_address1"><strong>Package Images</strong></label>
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

                                                        <a class="btn mt-3 firr fw-normal add_clone border-0 shadow-none">Add
                                                            More</a>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="card">
                                        <label for="email_address1"><strong>Itinerary Images</strong></label>
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
                                                            <input type="file" name="itinerary_image[]"
                                                                   class="main_file w-100 h-100 form-control position-absolute  opacity-0"/>
                                                            <div class="img-thumb">
                                                            </div>
                                                        </div>
                                                        <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>

                                                        <a class="btn mt-3 other fw-normal add_clone border-0 shadow-none">Add
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

                <div class="d-none  cloner firr" style="display:none;">
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
                                <a class="btn mt-3 firr fw-normal add_clone border-0 shadow-none">Add More</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="d-none  cloner other" style="display:none;">
                    <div class="row wow-remove">
                        <div class="col">
                            <div class="main_container m-3">
                                <div class="main imagebox position-relative rounded-3 overflow-hidden">
                                    <div class="select_img d-flex justify-content-center align-items-center">
                                        <div class="dz-message p-3 text-center">
                                            <h3>Click to upload.</h3>
                                        </div>
                                    </div>
                                    <input type="file" name="itinerary_image[]"
                                           class="main_file w-100 h-100 form-control position-absolute  opacity-0"/>
                                    <div class="img-thumb">
                                    </div>
                                </div>
                                <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>
                                <a class="btn mt-3  fw-normal add_clone other border-0 shadow-none">Add More</a>
                            </div>
                        </div>

                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        var maxField = 10; //Input fields increment limitation
                        var addButton = $('.add_clone'); //Add button selector
                        var wrapper = $('.team_main'); //Input field wrapper
                        var fieldHTML = jQuery('.cloner.firr .row');
                        var fieldHTML1 = jQuery('.cloner.other .row');
                        var fieldHTML2 = '<a href="javascript:void(0);" class="remove_button btn btn-dark mx-1">Cancel</a>';
                        var x = 1; //Initial field counter is 1

                        //Once add button is clicked
                        $(document).on('click', '.add_clone.firr', function () {
                            var wow = $(this);
                            //Check maximum number of input fields
                            if (x < maxField) {
                                x++;
                                $(wow).parents('.multiimage').append($(fieldHTML).clone());
                            }
                        });
                        $(document).on('click', '.add_clone.other', function () {
                            var wow = $(this);
                            //Check maximum number of input fields
                            if (x < maxField) {
                                x++;
                                $(wow).parents('.multiimage').append($(fieldHTML1).clone());
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

