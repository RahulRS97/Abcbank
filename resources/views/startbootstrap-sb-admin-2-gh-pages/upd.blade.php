@extends('layout')
@section('title')
Update
@endsection
@section('content')
				
<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" action="{{route('update',$register->id)}}">
							@csrf 
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" value="{{$register->name}}" name="name" placeholder=" Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Phone Number *" name="phonenumber" value="{{$register->phonenumber}}"">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        name="email" placeholder=" Enter Email Address *" value="{{$register->email}}">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <textarea class="form-control" name="address" placeholder=" Address">{{$register->address}}</textarea>
                                    </div>
                                   
                                </div>
								 <div>
		   @foreach($errors->all() as $err)
					<medium class="text-danger">{{$err}}</br></medium>
					@endforeach 
					</div>
                                <a href="login.html" class="btn btn-primary btn-user btn-block">
                                    Update
                                </a>
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
	@endsection 