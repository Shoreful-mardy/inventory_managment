@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add Purchas</h4>
        <br><br>
        <form class="needs-validation" novalidate="">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                    <label for="example-text-input">Date</label>
                    <input class="form-control example-date-input" name="date" type="date"  id="date">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                    <label for="example-text-input">Purchase No</label>
                    <input class="form-control example-date-input" name="parchase_no" type="text"  id="parchase_no">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                    <label for="example-text-input">Supplier Name</label>
                    <select id="supplier_id" name="supplier_id" class="form-select" aria-label="Default select example">
                        <option selected="">Open this select Supplier</option>
                        @foreach($supplier as $item)
                        <option value="{{ $item->id}}">{{ $item->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                    <label for="example-text-input">Category Name</label>
                    <select id="category_id" name="category_id" class="form-select" aria-label="Default select example">
                        <option selected="">Open this select Category</option>
                        
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                    <label for="example-text-input" >Product Name</label>
                    <select id="product_id" name="product_id" class="form-select" aria-label="Default select example">
                        <option selected="">Open this select Supplier</option>
                        
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                	<label for="example-text-input" style="margin-top: 43px;" ></label>
                    <input class="btn btn-secondary" type="submit" value="Add More">
                </div>


            </div> <!-- End Row -->

            <div>
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>
    </div>
</div>
</div>
 


</div>
</div>


<script type="text/javascript">
    

    $(function(){
    	$(document).on('change', '#supplier_id',function() {
    		var supplier_id = $(this).val();
    		$.ajax({
    			url:"{{ route('get-category') }}",
    			type: "GET",
    			data:{supplier_id:supplier_id},
    			success:function(data){
    				var html = '<option value="">Select Category</option>';
    				$.each(data,function(key,v){
    					html += '<option value=" '+v.category_id+' ">  ' +v.category.name+ ' </option>';
    				});

    				$('#category_id').html(html);
    			}
    		})
    	});
    });
    
</script>

 
@endsection 
