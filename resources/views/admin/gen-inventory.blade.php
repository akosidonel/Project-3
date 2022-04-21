@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Fund Inventory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Fund Inventory</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List of Inventory</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#addItemModal"><i class="bi-clipboard-plus"></i>  Add Item</button>

                <!--Add User Modal -->
                <div class="modal fade " id="addItemModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-secondary">
                        <h5 class="modal-title" id="exampleModalLabel">Add Item Information</h5>
                      </div>
                      <div class="modal-body">  
                        <form action="#" method="post" id="item_form" enctype="multipart/form-data">
                        @csrf  

                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Property Number</label>
                          <input type="text" class="form-control" name="property_number" id="property_number" placeholder="Property Number">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputDate">Date</label>
                          <input type="text" class="form-control" name="date" id="date" placeholder="Enter Date">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputArcticle">Article</label>
                        <input type="text" class="form-control" name="article" id="article" placeholder="Enter Article">
                      </div>
                      <div class="form-group">
                      <label for="forInputDescription">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"></textarea>
                      </div>
                      <div class="form-row">
                      <div class="form-group col-md-4">
                          <label for="inputQuantity">Quantity</label>
                          <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputUnitValue">Unit Value</label>
                          <input type="text" class="form-control" name="unit_value" id="unit_value">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputTotalValue">Total Value</label>
                          <input type="text" class="form-control" name="total_value" id="total_value">
                        </div>
                        
                      </div>
                     <div class="form-row">
                     <div class="form-group col-md-6">
                          <label for="inputlocation">Location</label>
                          <select id="location" name="location" class="form-control">
                            <option selected>Choose...</option>
                            <option>City Hall</option>
                            <option>Ospar I</option>
                            <option>Ospar II</option>
                            <option>Barangay</option>
                            <option>Fire Station</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputDepartment">Department</label>
                          <select id="department" name="department" class="form-control">
                            <option selected>Choose...</option>
                            <option>Accounting</option>
                            <option>Assessor</option>
                            <option>Budget</option>
                            <option>BPLO</option>
                            <option>GSO</option>
                          </select>
                        </div>
                     </div>
                      <div class="form-group">
                        <label for="inputEndUser">End User</label>
                        <input type="text" class="form-control" name="enduser" id="enduser" placeholder="Enter End User">
                      </div>
                      <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputSupplier">Supplier</label>
                        <input type="text" class="form-control" name="supplier" id="supplier" placeholder="Enter Supplier">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPageNumber">Page Number</label>
                        <input type="text" class="form-control" name="page_number" id="page_number" placeholder="Enter Supplier">
                      </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="inputAccountCode">Account Code</label>
                        <input type="text" class="form-control" name="account_code" id="account_code" placeholder="Enter Account Code">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputPurchaseOderNumber">Purchase Order Number</label>
                        <input type="text" class="form-control" name="purchase_order_number" id="purchase_order_number" placeholder="Enter Purchase Order Number">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputObrNumber">Obligation Request Number</label>
                        <input type="text" class="form-control" name="obr_number" id="obr_number" placeholder="Enter Obligation Request Number">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputRemarks">Status</label>
                        <input type="text" class="form-control" name="status" id="status" placeholder="Enter Remarks">
                      </div>

                      </div>
                      <div class="modal-footer bg-secondary">
                          <button type="submit" id="item_btn" class="btn btn-primary">Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </form>  
                    </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
          </div> 
        </div>

        <div class="card-body" id="gen_inventory_ui">


        </div>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('plugins/simple-money-format/simple.money.format.js') }}"></script>
<script>
  $(document).ready(function(){
    $('#unit_value').simpleMoneyFormat();
    $('#total_value').simpleMoneyFormat();

    fetchAllGenInventory();

    function fetchAllGenInventory(){
      $.ajax({
        url: '{{ route('admin.saveGenInventory') }}',
        method: 'get',
        success: function(res){
          $("#gen_inventory_ui").html(res);
          $("#example").DataTable({
            order:[0, 'asc']
          });
        }
      });
    }

  });
</script>
@endsection