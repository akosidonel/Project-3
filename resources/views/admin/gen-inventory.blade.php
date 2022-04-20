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
                <div class="modal fade" id="addItemModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-secondary">
                        <h5 class="modal-title" id="exampleModalLabel">Add Item Information</h5>
                      </div>
                      <div class="modal-body">  
                        <form action="#" method="post" id="user_form" enctype="multipart/form-data">
                        @csrf  
                       
                      <div class="modal-footer bg-secondary">
                        <button type="submit" id="user_btn" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </form>  
                    </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->

                

          </div> 
        </div>

        <div class="card-body" id="user_ui">


        </div>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection

@section('script')
<script>

</script>
@endsection