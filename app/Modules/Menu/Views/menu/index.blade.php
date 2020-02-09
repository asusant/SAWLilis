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
                  <h4 class="text-themecolor">Menu </h4>
              </div>
              <div class="col-md-7 align-self-center text-right">
                  <div class="justify-content-end align-items-center" style="display:inline-flex!important">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                          <li class="breadcrumb-item active">Menu</li>
                      </ol>
                      <a href="{{ url('/menu/create') }}" class="btn btn-info {{--d-none d-lg-block--}} m-l-15"><i class="fa fa-plus-circle"></i> Create New Menu</a>
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
                      <div class="card-body">
                          {{-- <h4 class="card-title">Data Export</h4> --}}
                          {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                          @include('components.flash-message')
                          <div class="table-responsive {{--m-t-40 enable when you need space for export button --}} ">
                              <table id="main-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                  <thead>
                                      <tr>
                                          <th style="width:80px; max-width:80px">#</th>
                                          <th>Group Menu</th><th>Menu</th><th>Icon</th><th>Priority</th>
                                          <th style="width:120px; max-width:120px">Actions</th>
                                      </tr>
                                  </thead>
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
  <script src="{{ asset('assets/node_modules/datatables/jquery.dataTables.min.js') }}"></script>

  <!-- start - This is for export functionality only (load if necessary)-->
  {{-- <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script> --}}

  <script>

  function delete_item(e) {
      console.log('Del');
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              $(e).parents('form:first').submit();
          }
      });
  }

  $(document).ready(function() {
      $('#main-table').DataTable({
          dom: 'Bfrtip',
          processing: true,
          serverSide: true,
          deferRender: true,
          ajax: {
              url: "{{ url('/details/menu') }}",
              method: 'GET',
          },
          columns: [
          { data: 'no', 'searchable': false },
          { data: 'group_menu_id' , name: 'group_menu_id' },
{ data: 'menu' , name: 'menu' },
{ data: 'icon' , name: 'icon' },
{ data: 'priority' , name: 'priority' },

          { data: 'action', 'searchable': false, 'orderable':false },
          ],
          scrollCollapse: true,

          columnDefs: [ {
              sortable: true
              } ,
              {
                  className: "text-center", "targets": [0,-1]
              },
          ],

          order: [[ 0, 'asc' ]],
          fixedColumns: true
          // ,buttons: [
          //     'copy', 'csv', 'excel', 'pdf', 'print' // datatable export button
          // ]
      });
  });
  </script>
@endsection
