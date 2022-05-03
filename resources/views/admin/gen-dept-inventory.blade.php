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
          <h3 class="card-title"> <i class="bi bi-card-checklist"></i> List of Department</h3>
        </div>

        <div class="card-body" id="gen-dept-inventory_ui">

        </div>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection