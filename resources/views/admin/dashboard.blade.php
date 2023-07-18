@extends('admin/layout')
@section('content')
<div class="container-fluid">   
                       <div class="card display-form" >  
                      <div class="card-body" >  
					  
					  <p>Welcome {{$name}}</p>
                        
<table class="table" style="width:50%;">
   
   
      <tr>
        <td>Your ID</td>
        <td>{{$email}}</td>
       
      </tr>
      <tr>
        <td>Your Balence</td>
        <td>Rs. {{$balancechk}}</td>
       
      </tr>
      

  </table>


                        </div>
					</div>
                        
                   
				@endsection