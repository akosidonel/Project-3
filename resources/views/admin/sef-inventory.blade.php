@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SEF Fund Inventory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sef Fund Inventory</li>
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
                        <form action="#" method="post" id="item2_form" enctype="multipart/form-data">
                        @csrf  
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputPropertyNumber">Property Number</label>
                          <input type="text" class="form-control" name="property_number" id="property_number" placeholder="Enter Property Number">
                          <span class="text-danger error-text property_number_error"></span>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputDate">Date</label>
                          <input type="text" class="form-control" name="date" id="date" placeholder="Enter Date">
                          <span class="text-danger error-text date_error"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputArcticle">Article</label>
                        <input type="text" class="form-control" name="article" id="article" placeholder="Enter Article">
                        <span class="text-danger error-text article_error"></span>
                      </div>
                      <div class="form-group">
                      <label for="forInputDescription">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Description..."></textarea>
                        <span class="text-danger error-text description_number_error"></span>
                      </div>
                      <div class="form-row">
                      <div class="form-group col-md-4">
                          <label for="inputQuantity">Quantity</label>
                          <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity">
                          <span class="text-danger error-text quantity_number_error"></span>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputUnitValue">Unit Value</label>
                          <input type="text" class="form-control" name="unit_value" id="unit_value" placeholder="Enter Unit Value">
                          <span class="text-danger error-text unit_value_error"></span>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputTotalValue">Total Value</label>
                          <input type="text" class="form-control" name="total_value" id="total_value" placeholder="Enter Total Value">
                          <span class="text-danger error-text total_value_error"></span>
                        </div>
                        
                      </div>
                        <div class="form-group">
                          <label for="inputDepartment">Schools</label>
                          <select id="school" name="school" class="form-control">
                            <option selected>Choose...</option>
                            <option>San Antonio Elementary School</option>
                            <option>Fourth Estate Elementary School</option>
                            <option>Masvile Elementary School</option>
                            <option>San Isidro Elementary School</option>
                            <option>Baclaran Elementary School</option>
                            <option>Tambo Elementary School</option>
                          </select>
                        </div>
                      <div class="form-group">
                        <label for="inputEndUser">End User</label>
                        <input type="text" class="form-control" name="enduser" id="enduser" placeholder="Enter End User">
                        <span class="text-danger error-text enduser_error"></span>
                      </div>
                      <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputSupplier">Supplier</label>
                        <input type="text" class="form-control" name="supplier" id="supplier" placeholder="Enter Supplier">
                        <span class="text-danger error-text supplier_error"></span>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPageNumber">Page Number</label>
                        <input type="text" class="form-control" name="page_number" id="page_number" placeholder="Enter Page Number">
                        <span class="text-danger error-text page_number_error"></span>
                      </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="inputAccountCode">Account Code</label>
                        <input type="text" class="form-control" name="account_code" id="account_code" placeholder="Enter Account Code">
                        <span class="text-danger error-text account_code_error"></span>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputPurchaseOderNumber">Purchase Order Number</label>
                        <input type="text" class="form-control" name="purchase_order_number" id="purchase_order_number" placeholder="Enter Purchase Order Number">
                        <span class="text-danger error-text purchase_order_number_error"></span>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputObrNumber">Obligation Request Number</label>
                        <input type="text" class="form-control" name="obr_number" id="obr_number" placeholder="Enter Obligation Request Number">
                        <span class="text-danger error-text obr_number_error"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option selected>Choose...</option>
                            <option>Serviceable</option>
                            <option>Unserviceable</option>
                          </select>
                      </div>

                      </div>
                      <div class="modal-footer bg-secondary">
                          <button type="submit" id="item2_btn" class="btn btn-primary">Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </form>  
                    </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
          </div> 
        </div>

        <div class="card-body" id="sef_inventory_ui">


        </div>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection