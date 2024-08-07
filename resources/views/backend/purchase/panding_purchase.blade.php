@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Pending Purchase</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                	<a href="{{ route('add.purchase') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style=" float: right;">Add Purchase</a> <br><br>

                    <h4 class="card-title">All Pending Purchase Data </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Product Name</th> 
                            <th>Purchase No</th> 
                            <th>Category</th> 
                            <th>Qty</th> 
                            <th>Date</th> 
                            <th>Supplier</th> 
                            <th>Status</th> 
                            <th>Action</th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $item['product']['name'] }} </td> 
                            <td> {{ $item->parchase_no }} </td> 
                            <td> {{ $item['category']['name'] }} </td> 
                            <td> {{ $item->buying_qty }} </td> 
                            <td> {{  date('d-m-Y',strtotime($item->date))  }} </td> 
                            <td> {{ $item['supplier']['name'] }} </td> 
                            <td>
                                @if($item->status == 0)
                                <span class="btn btn-warning" >Pending</span> 
                                @elseif($item->status == 1)
                                <span class="btn btn-success">Approved</span>
                                @endif

                            </td> 
                            
                            <td>

     @if($item->status == 0)   

     <a href="{{ route('approve.purchase',$item->id ) }}" class="btn btn-danger sm" title="Approved" id="approveBtn">  <i class="fas fa-check-circle"></i> </a>
      @endif

                            </td>
                           
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                     
                        
                    </div> <!-- container-fluid -->
                </div>
 

@endsection