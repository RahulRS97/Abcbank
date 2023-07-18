@extends('admin/layout')
@section('content')
<div class="container-fluid">   
                       <div class="card display-form" >  
                      <div class="card-body" >  
					  
					  <p>Deposit Money </p>
     <form class="user" method="post" enctype="multipart/form-data" action="{{route('depositpost')}}" >  
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
<table class="table" style="width:50%;">
   
   
      <tr>
        <td><label><b>Amount</b></label></td>
               
      </tr>
      <tr>
        <td>
		 <input type="number"  id="deposit" class="form-control form-control-user" placeholder="Enter Amount" name="deposit" ></td>
        
       
      </tr>
      

  </table>
  <div class="col-md-6">
   <button type="submit" class="btn btn-primary btn-user btn-block"> Deposit </button>
   </div>
  </form>


                        </div>
					</div>
                        
                   
				@endsection