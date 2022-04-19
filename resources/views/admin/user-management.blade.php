@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Management</li>
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
          <h3 class="card-title">List of User</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#addUserModal"><i class="bi-clipboard-plus"></i>  Add User</button>

                <!--Add User Modal -->
                <div class="modal fade" id="addUserModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-secondary">
                        <h5 class="modal-title" id="exampleModalLabel">Add User Information</h5>
                      </div>
                      <div class="modal-body">  
                        <form action="#" method="post" id="user_form" enctype="multipart/form-data">
                        @csrf  
                        <div class="form-group">
                            <label for="departmentInput">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name">
                          </div>
                          <div class="form-group">
                            <label for="departmentCodeInput">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name">
                          </div>
                          <div class="form-group">
                            <label for="departmentCodeInput">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                          </div> 
                          <div class="form-group">
                            <label for="departmentCodeInput">Contact Number</label>
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter contact number">
                          </div>
                          <div class="form-group">
                            <label for="departmentCodeInput">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                          </div>
                          <!-- <div class="form-group">
                            <label for="departmentCodeInput">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm password">
                          </div> -->
                      </div>
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
  $(document).ready(function(){

    fetchAllUsers();
    //fetch all departments ajax request
    function fetchAllUsers(){

      $.ajax({
        url: '{{ route('admin.fetchAllUser') }}',
        method: 'get',
        success: function(res){
          $("#user_ui").html(res);
          $("#example").DataTable({
            order:[0,'asc']
          });
        }
      });
    }


    //add new user ajax request
    $("#user_form").submit(function(e){
      e.preventDefault();
      const fd = new FormData(this);
    $("#user_btn").text("Saving...");

    $.ajax({
      url: '{{ route('admin.save-user') }}',
      method: 'post',
      data: fd,
      cache: false,
      processData: false,
      contentType: false,
      success: function(res){
        console.log(res);
      }
    });
  });
});
</script>

@endsection
