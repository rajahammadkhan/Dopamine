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
                <form action="{{route('multi-lingle.update',$multi_data->id)}}" method="POST" enctype="multipart/form-data">
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
                                                <input value="{{$multi_data->title}}" type="text" id="title"
                                                       class="form-control" name="title"
                                                       placeholder="Package Title" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Description </strong></label>
                                            <textarea type="text"
                                                      name="description"
                                                      id="description" class="ckeditor form-control choices"
                                                      cols="30"
                                                      rows="10"
                                            >
                                                {{$multi_data->description}}
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
                            <div class="card py-4">
                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <div class="d-flex justify-content-between">
                                                <label for="email_address1"> <strong> Highlights </strong></label>
                                                <button class="btn bg-transparent" onclick="handleClone(this)" type="button">+</button>
                                            </div>
                                            @foreach($highlights as $highlight)
                                                <div class="form-line focused highlightContainer ">
                                                    <div class="highlight d-flex">

                                                        <input type="text" class="form-control" value="{{$highlight->highlights}}" name="highlights[]" placeholder="Highlights">
                                                        <button class="bg-transparent border-0" onclick="handleRemove(this)" type="button">X</button>
                                                    </div>
                                                </div>
                                            @endforeach
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
                                            @foreach($itinerary_detail as $itinerary)
                                                <div class="form-line focused highlightContainer">
                                                    <div class="highlight d-flex w-100">
                                                        <div class="form-line w-100 p-3 my-3 shadow">
                                                            <div class="d-flex">
                                                                <input value="{{$itinerary->itinerary_name}}" type="text"
                                                                       class="form-control" name="itinerary_name[]"
                                                                       placeholder="Itinerary Name">
                                                                <button class="bg-transparent border-0" onclick="handleRemove(this)" type="button">X</button>

                                                            </div>

                                                            <textarea  type="text"
                                                                       name="itinerary_description[]"
                                                                       cols="30"
                                                                       rows="10">
                                                            {{$itinerary->itinerary_description}}
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card py-4">
                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Inclusions </strong></label>
                                            <textarea  type="text"
                                                       name="inclusions"
                                                       id="inclusions" class="ckeditor form-control choices"
                                                       cols="30"
                                                       rows="10">
                                                 {{$inclusion_exclusion->inclusions}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Exclusions </strong></label>
                                            <textarea type="text"
                                                      name="exclusions"
                                                      id="exclusions" class="ckeditor form-control choices"
                                                      cols="30"
                                                      rows="10">
                                                 {{$inclusion_exclusion->exclusions}}
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
                                            @foreach($faqs as $high)
                                                <div class="form-line focused highlightContainer ">
                                                    <div class="highlight d-flex flex-column shadow p-3 my-3">
                                                        <div class="d-flex w-100 align-items-center">
                                                            <div class="w-100">
                                                                <input type="text" class="form-control" value="{{$high->faqs_question}}" name="faqs_question[]" placeholder="Faqs Title">
                                                                <input type="text" class="form-control" value="{{$high->faqs_answer}}" name="faqs_answer[]" placeholder="Faqs description">
                                                            </div>
                                                            <button style="width: 54px" class="bg-transparent btn border-0" onclick="handleRemove(this)" type="button">X</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
{{--                                    <div class="row my-2 mt-5 mb-3">--}}
{{--                                        <div class="col-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="email_address1"><strong>Hotels</strong></label>--}}
{{--                                                @if($hotel->isNotEmpty())--}}
{{--                                                    @foreach($hotel as $hotels)--}}
{{--                                                        <label class="d-block">--}}
{{--                                                            <input {{ in_array($hotels->id,json_decode($multi_data->hotel_id)) ? 'checked' : ''}} value="{{$hotels->id}}" type="checkbox"--}}
{{--                                                                   class="continue_selling" name="hotel_id[]"--}}
{{--                                                                   class="py-2">--}}
{{--                                                            <span class="py-2">{{$hotels->title}}</span>--}}
{{--                                                            @endforeach--}}
{{--                                                            @else--}}
{{--                                                                <h6>--}}
{{--                                                                    No Hotels found--}}
{{--                                                                </h6>--}}
{{--                                                        @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row my-3">--}}
{{--                                        <div class=" col-12">--}}
{{--                                            <label for="email_address1"><strong>Category</strong></label>--}}
{{--                                            <select class="form-control select2" name="category_id" id="Quiz-type"--}}
{{--                                                    data-placeholder="Select">--}}
{{--                                                <option value=""> select</option>--}}
{{--                                                @foreach($cate as $row)--}}
{{--                                                    <option {{ $multi_data->category_id == $row->id ? 'Selected' : '' }}   value={{$row->id}}>{{$row->title}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
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

