<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ABC BANK - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{env('ASSET_URL')}}/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{env('ASSET_URL')}}/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-login-image"></div> -->
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
							<h1 class="card-title text-center"><b> ABC</b> Bank </h1>  
                                <h3 class="h4 text-gray-900 mb-4">Create New Account!</h3>
                            </div>
                            <form class="user" method="post" enctype="multipart/form-data" action="{{route('regstore')}}" >
							@csrf 
						 @if(Session::has('success'))
		<div class="alert alert-success">{{session::get('success')}}</div>
		@endif
          @if(Session::has('fail'))
		  <div class="alert alert-danger">{{session::get('fail')}}</div>
		  @endif
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Your Name *" name="name" value="{{old('name')}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Phone Number *" name="phonenumber" value="{{old('phonenumber')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                       name="email" placeholder=" Enter Email Address *" value="{{old('email')}}">
                                </div>
								  
								 
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password *" name="password" value="{{old('password')}}"required >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Confirm Password *" name="confirmpassword" value="{{old('confirmpassword')}}" required>
                                    </div>
									 </div>
									 <div class="form-group row">
									  <div class="col-sm-12">
									   <input type="checkbox" id="checkd" name="checkd" required>
									   Agree the<a href="#"> Terms and policy</a>
									 </div>
									 </div> 
                               
								 <div>
									   @foreach($errors->all() as $err)
												<medium class="text-danger">{{$err}}</br></medium>
												@endforeach 
									</div>
                              
								 <button type="submit" class="btn btn-primary btn-user btn-block"> Register Account </button>
                                <hr>
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{env('ASSET_URL')}}/admin/vendor/jquery/jquery.min.js"></script>
    <script src="{{env('ASSET_URL')}}/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{env('ASSET_URL')}}/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{env('ASSET_URL')}}/admin/js/sb-admin-2.min.js"></script>




</body>

</html>