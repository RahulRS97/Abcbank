@extends('admin/layout')
@section('content')
<div class="container-fluid">   
                       <div class="card display-form" >  
                      <div class="card-body" >  
					  
					  <p>Transfer Money </p>
					  <hr />
     <form class="user" method="post"  action="{{route('transferpost')}}" >
     @csrf   
     @if(Session::has('success'))
		<div class="alert alert-success" style="width:50%;">{{session::get('success')}}</div>
		<br>
		    <br>
		@endif
          @if(Session::has('fail'))
		  <div class="alert alert-danger" style="width:50%;">{{session::get('fail')}}</div>
		  <br>
		    <br>
		  @endif        
	 <div class="row">                        
 <div class="col-md-6">
 <label><b> Email address</b></label>
    <input type="email"  id="email" class="form-control form-control-user" placeholder="Enter Email" name="email" >
   </div>
   </div>
   	 <div class="row">                        
 <div class="col-md-6">
 <label><b> Amount</b></label>
    <input type="number"  id="transfer" class="form-control form-control-user" placeholder="Enter Amount" name="transfer" >
   </div>
   </div>
   <br/>
    <div class="row"> 
  <div class="col-md-6">
   <button type="submit" class="btn btn-primary btn-user btn-block"> Transfer </button>
   </div>
   </div>
   
  </form>


                        </div>
					</div>
                        
                   
				@endsection