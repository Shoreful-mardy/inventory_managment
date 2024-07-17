@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Supplier/Product Wise Stock Report</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <strong>Supplier Wise Report</strong>
                            <input type="radio" name="supplier_product_wise" value="supplier_product_wise" class="search_value">&nbsp;&nbsp;
                            <strong>Product Wise Report</strong>
                            <input type="radio" name="supplier_product_wise" value="supplier_product_wise" class="search_value">
                        </div>
                    </div><!-- end row -->
                    <div class="show_Supplier">
                       <form method="" action="">
                        <div class="row">
                            <div class="col-sm-8">
                                <label>Supplier Name</label>
                                <select name="supplier_id" class="form-select select2" aria-label="Default select example">
                        <option selected="">Open this select Supplier</option>
                        @foreach($suppliers as $item)
                        <option value="{{ $item->id}}">{{ $item->name}}</option>
                        @endforeach
                        </select>
                            </div>
                        <div class="col-sm-4" style="padding-top: 28px;">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                        </div>
                           
                       </form> 
                    </div>


                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

 
    
</div> <!-- container-fluid -->
</div>
 

@endsection