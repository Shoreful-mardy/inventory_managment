@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">All Purchase</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                	<a href="{{ route('add.purchase') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style=" float: right;">Add Purchase</a> <br><br>

                    <h4 class="card-title">All Purchase Data </h4>
                    

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
                                <span class="btn btn-warning" >Pending</span> 
                            </td> 
                            
                            <td>
   <a href="{{ route('edit.product',$item->id ) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

     <a href="{{ route('delete.product',$item->id ) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

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