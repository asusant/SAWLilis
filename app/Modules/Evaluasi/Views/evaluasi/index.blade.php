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
                  <h4 class="text-themecolor">Evaluasi </h4>
              </div>
              <div class="col-md-7 align-self-center text-right">
                  <div class="justify-content-end align-items-center" style="display:inline-flex!important">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                          <li class="breadcrumb-item active">Evaluasi</li>
                      </ol>
                      <a href="{{ url('/evaluasi/create') }}" class="btn btn-info {{--d-none d-lg-block--}} m-l-15"><i class="fa fa-plus-circle"></i> Create New Evaluasi</a>
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
                                          <th style="width:100px; max-width:100px">#</th>
                                          <th>Alternatif</th>
                                          @foreach($evaluasi['kriterias'] as $key => $row)
                                            <th>{{ $row->kode_kriteria }}</th>
                                          @endforeach
                                          <th style="width:150px; max-width:150px">Actions</th>
                                      </tr>
                                  </thead>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
                          <center>
                            <a href="{{route('evaluasi.perhitungan.custom')}}" class="btn btn-info btn-lg"><i class="fa fa-code"></i> Evaluasi</a>
                          </center>
                      </div>
                  </div>
              </div>
          </div>

          @if(isset($evaluasi['saw']))
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">Perangkingan</h4>
                          <h6 class="card-subtitle">Hasil Perangkingan Metode SAW</h6>
                          {!! $evaluasi['saw']->getPerangkinganTable() !!}

                          <center><button class="btn btn-lg btn-success" onclick="showPerhitungan();">Lihat Perhitungan</button></center>
                      </div>
                  </div>
              </div>
          </div>
          @endif

          @if(isset($evaluasi['saw']))
          <div id="perhitungan" style="display: none;" class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">Perhitungan</h4>
                          <h6 class="card-subtitle">Alur Perhitungan SAW</h6>

                          <br>
                          <br>

                          <h5>Kriteria</h5>
                          {!! $evaluasi['saw']->getKriteriaTable() !!}

                          <h5>Rating Kecocokan</h5>
                          {!! $evaluasi['saw']->getRatingKecocokanTable() !!}

                          <h5>Matriks Ternormalisasi</h5>
                          {!! $evaluasi['saw']->getMatriksTernormalisasiTable() !!}

                          <h5>Nilai Preferensi</h5>
                          {!! $evaluasi['saw']->getNilaiPreferensiTable() !!}

                          <h5>Perangkingan Nilai Preferensi</h5>
                          {!! $evaluasi['saw']->getPerangkinganTable() !!}
                      </div>
                  </div>
              </div>
          </div>
          @endif
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

  function showPerhitungan() {
      document.getElementById('perhitungan').style.display = 'block';
      document.getElementById('perhitungan').scrollIntoView({ behavior: 'smooth', block: 'center' });
  }

  $(document).ready(function() {
      $('#main-table').DataTable({
          processing: true,
          serverSide: true,
          deferRender: true,
          ajax: {
              url: "{{ url('/details/evaluasi') }}",
              method: 'GET',
          },
          columns: [
          { data: 'no', 'searchable': false },
          { data: 'alternatif_id' , name: 'alternatif_id' },
          @foreach($evaluasi['kriterias'] as $key => $row)
            { data: 'eval-{{$row->id}}' , name: 'eval-{{$row->id}}' },
          @endforeach

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

      @if(isset($evaluasi['saw']))
          $('#table-hasil').DataTable({
              "order": [[ 2, "desc" ]]
          });
      @endif
  });
  </script>
@endsection
