@extends('admin/layout')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                 

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Statement of account</h6>
							
                        </div>
						
    
                        <div class="card-body">
                            <div class="table-responsive">
							
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>DateTime</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Details</th>
											<th>Balance</th>
											
                                        </tr>
                                    </thead>
				
                                    <tbody>
									
									@if($user)
									 @foreach($user as $dat)

                                          <td>{{$dat->created_at->format('d-m-Y H:i:s')}}</td>
                                            <td>{{$dat->amount}}</td>
                                            <td>{{$dat->type}}</td>
                                            <td>{{$dat->details}}</td>																
											 <td>{{$dat->balance}}</td>											 											
                                        </tr>
										@endforeach
										@else 
										<div>
											<h2>No posts found</h2>
										</div>
									@endif
											   
                                    </tbody>
									
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

               <!-- /.container-fluid -->
@endsection
            
           