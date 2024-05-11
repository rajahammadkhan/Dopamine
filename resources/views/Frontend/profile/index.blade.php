@extends('Frontend/profile/profilesidebar')
@section('content')
<div class="container content vh-100 clear-fix">
    <h2 class="mt-5 mb-5 text-center">Profile Settings</h2>
    <form action="{{url('my-account.update',4)}}" class="mx-auto"  method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row w-100"  >
            <div class="col-12">
                <div href=# class="position-relative" style="text-align: center"><img src="https://image.flaticon.com/icons/svg/236/236831.svg"
                                                                             width=130px style="margin:0"><br>
                    <p class="pl-2 mt-2 position-absolute top-0 start-0 w-100 h-100 " style="top:0; opacity: 0"><input type="file" class="w-100 h-100" name="image"></p></div>
                <div class="container">
                    <div class="form-group">
                        <label for=fullName>Name</label>
                        <input type="text" value="{{$data->name}}" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for=email>Email</label>
                        <input type="email" name="email" value="{{$data->email}}" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for=pass>Phone No</label>
                        <input type="number" name="phone_number" value="{{$data->phone_number}}" class="form-control" id="pass">
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
