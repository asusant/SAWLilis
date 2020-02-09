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
                  <h4 class="text-themecolor">Create New Level </h4>
              </div>
              <div class="col-md-7 align-self-center text-right">
                  <div class="d-flex justify-content-end align-items-center" style="display:inline-flex!important">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                          <li class="breadcrumb-item active">Create Level</li>
                      </ol>
                      <a href="{{ url('/level') }}" class="btn btn-info m-l-15"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                  </div>
              </div>
          </div>
          <!-- ============================================================== -->
          <!-- End Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row justify-content-md-center">
              <div class="col-12">
                  <div class="card">
                    <div class="card-header bg-info"><h4 class="m-b-0 text-white">New Level</h4>
                    </div>
                      <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/level') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('Level::level.form', ['formMode' => 'create'])

                        </form>
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
