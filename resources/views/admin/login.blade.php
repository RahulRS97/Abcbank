<! DOCTYPE html>  
<html lang="en" >  
<head>  
  <meta charset="UTF-8">  
  <title> Login Form   
 </title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
</head>  
<style>  
html {   
    height: 100%;   
}  
body {   
    height: 100%;   
}  
.global-container {  
    height: 100%;  
    display: flex;  
    align-items: center;  
    justify-content: center;  
    background-color:#CCCCCC;  
}  
form {  
    padding-top: 10px;  
    font-size: 14px;  
    margin-top: 30px;  
}  
.card-title {   
font-weight: 300; 
font-style:italic;
color:#990000; 
 }  
.btn {  
    font-size: 14px;  
    margin-top: 20px;  
}  
.login-form {   
    width: 330px;  
    margin: 20px;  
}  
.sign-up {  
    text-align: center;  
    padding: 20px 0 0;  
}  
.alert {  
    margin-bottom: -30px;  
    font-size: 13px;  
    margin-top: 20px;  
}  
</style>  
<body>  
<div class="pt-5" style=" background-color:#CCCCCC;" >  
  <div class="global-container">  
    <div class="card login-form" >  
    <div class="card-body" >  
        <h3 class="card-title text-center"><b> ABC</b> Bank </h3>  
        
        <div class="card-text">  
            <form method="post" action="{{route('login')}}"> 
			@csrf 
			@if(Session::has('success'))
		<div class="alert alert-success">{{session::get('success')}}</div>
		<br>
		    <br>
		@endif
          @if(Session::has('fail'))
		  <div class="alert alert-danger">{{session::get('fail')}}</div>
		  <br>
		    <br>
		  @endif
		  
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Enter Email address </label>  
                    <input type="text" class="form-control form-control-sm"  name="email"id="exampleInputEmail1" aria-describedby="emailHelp">  
                </div>  
                <div class="form-group">  
                    <label for="exampleInputPassword1">Enter Password </label>  
                   
                    <input type="password" class="form-control form-control-sm" name="password" id="exampleInputPassword1">  
                </div>
				
                <button type="submit" class="btn btn-primary btn-block"> Sign in </button>  
                  <div>
				  @foreach($errors->all() as $err)
					<medium class="text-danger">{{$err}}</br></medium>
					@endforeach 
					</div>  
                <div class="sign-up">  
                    Don't have an account? <a href="{{route('register')}}"> Create One </a>  
                </div>  
            </form>  
        </div>  
    </div>  
</div>  
</div>  
</div>
</body>  
</html>  