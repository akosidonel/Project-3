@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Department</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Department</li>
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
          <h3 class="card-title">List of Department</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addDepartmentModal"><i class="bi-clipboard-plus"></i>  Add Item</button>

                <!--Add Department Modal -->
                <div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                      </div>
                      <div class="modal-body">  
                        <form action="#" method="post" id="department_form" enctype="multipart/form-data">
                        @csrf  
                        <div class="form-group">
                            <label for="departmentInput">Department</label>
                            <input type="text" class="form-control" id="department_name" name="department_name" placeholder="Enter department">
                          </div>
                          <div class="form-group">
                            <label for="departmentCodeInput">Password</label>
                            <input type="text" class="form-control" id="department_code" name="department_code" placeholder="Enter department code">
                          </div>  
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="department_btn" class="btn btn-primary">Save</button>
                    </form>  
                    </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->

                  <!--Edit Department Modal -->
                  <div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                      </div>
                      <div class="modal-body">  
                        <form action="#" method="post" id="department_form" enctype="multipart/form-data">
                        @csrf  
                        <div class="form-group">
                            <label for="departmentInput">Department</label>
                            <input type="text" class="form-control" id="department_name" name="department_name" placeholder="Enter department">
                          </div>
                          <div class="form-group">
                            <label for="departmentCodeInput">Password</label>
                            <input type="text" class="form-control" id="department_code" name="department_code" placeholder="Enter department code">
                          </div>  
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="department_btn" class="btn btn-primary">Save</button>
                    </form>  
                    </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->

          </div> 
        </div>

        <div class="card-body" id="department_ui">

        </div>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection


@section('script')
<script>
  $(document).ready(function() {

    fetchAllDepartment();
    //fetch all Departments ajax request
    function fetchAllDepartment(){
     
      $.ajax({
        url: '{{ route('admin.fetchAllDept') }}',
        method: 'get',
        success: function(res){
          $("#department_ui").html(res);
          $("#example").DataTable({});
        }
      });
    }

    //add new department ajax request
    $("#department_form").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#department_btn").text("Saving...");

        $.ajax({
            url: '{{ route('admin.save')}}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                if(res.status == 200){
                  Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Department added successfully!',
                    showConfirmButton: false,
                    timer: 2500
                  })
                  fetchAllDepartment();
                }
                $("#department_btn").text("Save");
                $("#department_form")[0].reset();
                $("#addDepartmentModal").modal("hide");
            } 
        });
    })
} );
</script>
@endsection