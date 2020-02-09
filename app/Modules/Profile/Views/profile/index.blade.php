@extends('layouts.app')

@php

  function timeElapsed($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
@endphp

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
                          <h4 class="text-themecolor">Profile</h4>
                      </div>
                      <div class="col-md-7 align-self-center text-right">
                          <div class="d-flex justify-content-end align-items-center">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                  <li class="breadcrumb-item active">Profile</li>
                              </ol>
                              <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                          </div>
                      </div>
                  </div>
                  <!-- ============================================================== -->
                  <!-- End Bread crumb and right sidebar toggle -->
                  <!-- ============================================================== -->
                  <!-- ============================================================== -->
                  <!-- Start Page Content -->
                  <!-- ============================================================== -->
                  <!-- Row -->
                  <div class="row">
                      <!-- Column -->
                      <div class="col-lg-4 col-xlg-3 col-md-5">
                          <div class="card">
                              <div class="card-body">
                                  <center class="m-t-30"> <img src="https://via.placeholder.com/150?text=Profile" class="img-circle" width="150" />
                                      <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
                                      <h6 class="card-subtitle">Loged in as {{ session('level')->level }}</h6>
                                      {{-- <div class="row text-center justify-content-md-center">
                                          <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                          <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                      </div> --}}
                                      <div class="row justify-content-md-center">
                                        <button class="btn btn-circle btn-secondary m-r-10"><i class="fa fa-facebook"></i></button>
                                        <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                                        <button class="btn btn-circle btn-secondary m-l-10"><i class="fa fa-youtube"></i></button>
                                      </div>
                                  </center>
                              </div>
                              <div>
                                  <hr> </div>
                              <div class="card-body">
                                <small class="text-muted">Email address </small>
                                  <h6>{{ Auth::user()->email }}</h6>
                                <small class="text-muted p-t-30 db">Registered since</small>
                                  <h6>{{ Auth::user()->created_at }}</h6>
                                <small class="text-muted p-t-30 db">Status</small>
                                  <h6>Active</h6>
                                {{-- <small class="text-muted p-t-30 db">Phone</small>
                                  <h6>+91 654 784 547</h6>
                                <small class="text-muted p-t-30 db">Address</small>
                                  <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6> --}}


                              </div>
                          </div>
                      </div>
                      <!-- Column -->
                      <!-- Column -->
                      <div class="col-lg-8 col-xlg-9 col-md-7">
                          <div class="card">
                              <!-- Nav tabs -->
                              <ul class="nav nav-tabs profile-tab justify-content-md-center" role="tablist">
                                  <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Timeline</a> </li>
                                  {{-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                                  <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li> --}}
                              </ul>
                              <!-- Tab panes -->
                              <div class="tab-content">
                                  <div class="tab-pane active" id="home" role="tabpanel">
                                      <div class="card-body">
                                        <div class="profiletimeline">
                                            <div class="sl-item">
                                                <div class="sl-left" > <img src="../assets/images/users/1.jpg" alt="user" class="img-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a></p>

                                                        <div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../assets/images/users/2.jpg" alt="user" class="img-circle" /> </div>
                                                <div class="sl-right">
                                                    <div> <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <div class="m-t-20 row">
                                                            <div class="col-md-3 col-xs-12"><img src="../assets/images/big/img1.jpg" alt="user" class="img-responsive radius" /></div>
                                                            <div class="col-md-9 col-xs-12">
                                                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="javascript:void(0)" class="btn btn-success"> Design weblayout</a></div>
                                                        </div>
                                                        <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../assets/images/users/3.jpg" alt="user" class="img-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                                    </div>
                                                    <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../assets/images/users/4.jpg" alt="user" class="img-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <blockquote class="m-t-10">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

            {{-- <ul class="timeline">
						<!-- timeline time label -->
						<li class="time-label">
							  <span class="bg-info">
								Log Aktivitas Anda
							  </span>
						</li>
						<!-- /.timeline-label -->
						@foreach($logs as $log)
						<li>
						  <i class="fa fa-clock-o bg-green"></i>

						  <div class="timeline-item">
							<span class="time"><i class="fa fa-clock-o"></i> {{ timeElapsed('2019-01-07 01:11:58') }}</span>

							<h3 class="timeline-header no-border"><a href="#">Anda</a> {{ $log->description }}</h3>
						  </div>
						</li>
					@endforeach
					  </ul> --}}
                                      </div>
                                  </div>
                                  <!--second tab-->
                                  <div class="tab-pane" id="profile" role="tabpanel">
                                      <div class="card-body">
                                          <div class="row">
                                              <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                  <br>
                                                  <p class="text-muted">Johnathan Deo</p>
                                              </div>
                                              <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                  <br>
                                                  <p class="text-muted">(123) 456 7890</p>
                                              </div>
                                              <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                  <br>
                                                  <p class="text-muted">johnathan@admin.com</p>
                                              </div>
                                              <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                                  <br>
                                                  <p class="text-muted">London</p>
                                              </div>
                                          </div>
                                          <hr>
                                          <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                          <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                          <h4 class="font-medium m-t-30">Skill Set</h4>
                                          <hr>
                                          <h5 class="m-t-30">Wordpress <span class="pull-right">80%</span></h5>
                                          <div class="progress">
                                              <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                          </div>
                                          <h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
                                          <div class="progress">
                                              <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                          </div>
                                          <h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
                                          <div class="progress">
                                              <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                          </div>
                                          <h5 class="m-t-30">Photoshop <span class="pull-right">70%</span></h5>
                                          <div class="progress">
                                              <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="tab-pane" id="settings" role="tabpanel">
                                      <div class="card-body">
                                          <form class="form-horizontal form-material">
                                              <div class="form-group">
                                                  <label class="col-md-12">Full Name</label>
                                                  <div class="col-md-12">
                                                      <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="example-email" class="col-md-12">Email</label>
                                                  <div class="col-md-12">
                                                      <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-md-12">Password</label>
                                                  <div class="col-md-12">
                                                      <input type="password" value="password" class="form-control form-control-line">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-md-12">Phone No</label>
                                                  <div class="col-md-12">
                                                      <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-md-12">Message</label>
                                                  <div class="col-md-12">
                                                      <textarea rows="5" class="form-control form-control-line"></textarea>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-sm-12">Select Country</label>
                                                  <div class="col-sm-12">
                                                      <select class="form-control form-control-line">
                                                          <option>London</option>
                                                          <option>India</option>
                                                          <option>Usa</option>
                                                          <option>Canada</option>
                                                          <option>Thailand</option>
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-12">
                                                      <button class="btn btn-success">Update Profile</button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Column -->
                  </div>
                  <!-- Row -->
                  <!-- ============================================================== -->
                  <!-- End PAge Content -->
                  <!-- ============================================================== -->
                  <!-- ============================================================== -->
                  <!-- Right sidebar -->
                  <!-- ============================================================== -->
                  <!-- .right-sidebar -->
                  <div class="right-sidebar">
                      <div class="slimscrollright">
                          <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                          <div class="r-panel-body">
                              <ul id="themecolors" class="m-t-20">
                                  <li><b>With Light sidebar</b></li>
                                  <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                  <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                  <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                  <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                                  <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                  <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                  <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                  <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                  <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                  <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                  <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                  <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                  <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                              </ul>
                              <ul class="m-t-20 chatonline">
                                  <li><b>Chat option</b></li>
                                  <li>
                                      <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                  </li>
                                  <li>
                                      <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                  </li>
                                  <li>
                                      <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                  </li>
                                  <li>
                                      <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                  </li>
                                  <li>
                                      <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                  </li>
                                  <li>
                                      <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                  </li>
                                  <li>
                                      <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                  </li>
                                  <li>
                                      <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <!-- ============================================================== -->
                  <!-- End Right sidebar -->
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
              url: "{{ url('/details/profile') }}",
              method: 'GET',
          },
          columns: [
          { data: 'no', 'searchable': false },
          { data: 'name' , name: 'name' },
{ data: 'username' , name: 'username' },
{ data: 'email' , name: 'email' },

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
