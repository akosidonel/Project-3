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
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title"><i class="bi bi-card-checklist"></i>  List of Department</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#addDepartmentModal"><i class="bi-clipboard-plus"></i>  Add Department</button>

                <!--Add Department Modal -->
                <div class="modal fade" id="addDepartmentModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-secondary">
                        <h5 class="modal-title" id="exampleModalLabel">Add Department Information</h5>
                      </div>
                      <div class="modal-body">  
                        <form action="#" method="post" id="department_form" enctype="multipart/form-data">
                        @csrf  
                        <div class="form-group">
                            <label for="departmentInput">Department</label>
                            <input type="text" class="form-control" id="department_name" name="department_name" placeholder="Enter department">
                            <span class="text-danger error-text department_name_error"></span>
                          </div>
                          <div class="form-group">
                            <label for="departmentCodeInput">Department Code</label>
                            <input type="text" class="form-control" id="department_code" name="department_code" placeholder="Enter department code">
                            <span class="text-danger error-text department_code_error"></span>
                          </div>  
                      </div>
                      <div class="modal-footer bg-secondary">
                        <button type="submit" id="department_btn" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>   
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
                      <div class="modal-header bg-secondary">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                      </div>
                      <div class="modal-body">  
                        <form action="#" method="post" id="edit_department_form" enctype="multipart/form-data">
                        @csrf  
                        <input type="hidden" id="dept_id" name="dept_id">
                        <div class="form-group">
                            <label for="departmentInput">Department</label>
                            <input type="text" class="form-control" id="edit_department_name" name="edit_department_name" placeholder="Enter department">
                          </div>
                          <div class="form-group">
                            <label for="departmentCodeInput">Department Code</label>
                            <input type="text" class="form-control" id="edit_department_code" name="edit_department_code" placeholder="Enter department code">
                          </div> 
                          <div class="form-group">
                            <label for="departmentCodeInput">Status</label>
                            <input type="text" class="form-control" id="edit_department_status" name="edit_department_status" placeholder="Enter department code">
                          </div>  
                      </div>
                      <div class="modal-footer bg-secondary">
                        <button type="submit" id="edit_department_btn" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
          $("#example").DataTable({
            order: [0, 'asc']
          });
        }
      });
    }

    //delete department ajax request
    $(document).on('click','.deleteIcon' , function(e){
      e.preventDefault();
      let id = $(this).attr('id');
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route('admin.deleteDept') }}',
                method: 'post',
                data: {
                  id: id,
                  _token: '{{ csrf_token() }}'},
                  success: function(res){
                    Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'Deleted successfully!',
                      showConfirmButton: false,
                      timer: 2500
                  });
                  fetchAllDepartment();
                }
            });
        }
      });
    });
    

    //update department ajax request
    $("#edit_department_form").submit(function(e){
      e.preventDefault();
      const d = new FormData(this);
      $("#edit_department_btn").text("Updating...");
      $.ajax({
        url: '{{ route('admin.updateDept') }}',
        method:'post',
        data: d,
        cache: false,
        processData: false,
        contentType: false,
        success: function(res){
          if(res.status == 200){
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Updated successfully!',
              showConfirmButton: false,
              timer: 2500
            })
            fetchAllDepartment();
          }
          $("#edit_department_btn").text("Save");
          $("#edit_department_form")[0].reset();
          $("#editDepartmentModal").modal("hide");
        }
      });
    }); 


    //edit department ajax request
    $(document).on('click', '.editIcon', function(e){
      e.preventDefault();
      let id = $(this).attr('id');
      $.ajax({
        url: '{{ route('admin.editDept') }}',
        method: 'get',
        data: {
          id: id,
          _token: '{{ csrf_token() }}'},
        success: function(res){
          $("#edit_department_name").val(res.department_name);
          $("#edit_department_code").val(res.department_code);
          $("#edit_department_status").val(res.status);
          $("#dept_id").val(res.id);
        }
      });
    });


    //add new department ajax request
    $("#department_form").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);    
        $.ajax({
            url: '{{ route('admin.save')}}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){
              $(document).find('span.error-text').text(''); 
            },
            success: function(res){
                if(res.status == 0){
                  $.each(res.error, function(prefix, val){
                      $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
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
            } 
        });
    })
});
</script>
@endsection