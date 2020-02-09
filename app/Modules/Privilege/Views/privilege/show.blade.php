@extends('layouts.app')

@section('content')

  <!-- ============================================================== -->
  <!-- Page wrapper  -->
  <!-- ============================================================== -->
  <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
          <div class="row page-titles">
              <div class="col-md-5 align-self-center">
                  <h4 class="text-themecolor">Detail Privilege </h4>
              </div>
              <div class="col-md-7 align-self-center text-right">
                  <div class="justify-content-end align-items-center" style="display:inline-flex!important">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                          <li class="breadcrumb-item active">Show Privilege</li>
                      </ol>
                      <a href="{{ url('/privilege') }}" class="btn btn-info m-l-15"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                      <a href="{{ url('/privilege/' . $privilege->id . '/edit') }}" class="btn btn-warning m-l-15"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                      <a href="javascript:void(0)" id="delete-item" class="btn btn-danger m-l-15"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                      <form id="delete-form" method="POST" action="{{ url('privilege' . '/' . $privilege->id) }}" accept-charset="UTF-8" style="display:inline">
                          {{ method_field('DELETE') }}
                          {{ csrf_field() }}
                      </form>
                  </div>
              </div>
          </div>
          <!-- ============================================================== -->
          <!-- End Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
              <div class="col-12">
                  <div class="card">
                    <div class="card-header bg-info"><h4 class="m-b-0 text-white">Privilege #{{ $privilege->id }}</h4>
                    </div>
                      <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $privilege->id }}</td>
                                    </tr>
                                    <tr><th> Level </th><td> {{ $privilege->level->level }} </td></tr>
                                    <tr><th> Module </th><td> {{ $privilege->module->module }} </td></tr>
                                    <tr><th> Index </th><td> {!! ($privilege->index) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>' !!} </td></tr>
                                    <tr><th> Show </th><td> {!! ($privilege->show) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>' !!} </td></tr>
                                    <tr><th> Create </th><td> {!! ($privilege->create) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>' !!} </td></tr>
                                    <tr><th> Store </th><td> {!! ($privilege->store) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>' !!} </td></tr>
                                    <tr><th> Edit </th><td> {!! ($privilege->edit) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>' !!} </td></tr>
                                    <tr><th> Update </th><td> {!! ($privilege->update) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>' !!} </td></tr>
                                    <tr><th> Destroy </th><td> {!! ($privilege->destroy) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>' !!} </td></tr>
                                    
                                </tbody>
                            </table>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Page wrapper  -->
  <!-- ============================================================== -->
@endsection

@section('on-page-js')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#delete-item').on('click', function(){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Poof! The Privilege  has been deleted!", {
              icon: "success",
            });
            $('#delete-form').submit();
          }
        });
      });
    });
  </script>
@endsection
