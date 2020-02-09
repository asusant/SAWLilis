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
                  <h4 class="text-themecolor">Detail User </h4>
              </div>
              <div class="col-md-7 align-self-center text-right">
                  <div class="justify-content-end align-items-center" style="display:inline-flex!important">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                          <li class="breadcrumb-item active">Show User</li>
                      </ol>
                      <a href="{{ url('/user') }}" class="btn btn-info m-l-15"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                      <a href="{{ url('/user/' . $user->id . '/edit') }}" class="btn btn-warning m-l-15"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                      <a href="javascript:void(0)" id="delete-item" class="btn btn-danger m-l-15"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                      <form id="delete-form" method="POST" action="{{ url('user' . '/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
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
                    <div class="card-header bg-info"><h4 class="m-b-0 text-white">User #{{ $user->id }}</h4>
                    </div>
                      <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $user->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $user->name }} </td></tr><tr><th> Username </th><td> {{ $user->username }} </td></tr><tr><th> Email </th><td> {{ $user->email }} </td></tr>
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
            swal("Poof! The User  has been deleted!", {
              icon: "success",
            });
            $('#delete-form').submit();
          }
        });
      });
    });
  </script>
@endsection
