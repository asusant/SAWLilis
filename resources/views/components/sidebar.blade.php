<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{ asset('assets/images/users/1.jpg') }}" alt="user-img" class="img-circle"><span class="hide-menu">{{ Auth::user()->name }}</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>

                @foreach($menus as $key => $menu)
                  <li class="nav-small-cap">--- {{ strtoupper($menu->group_name) }}</li>
                  @foreach($menu->menu as $k => $row)
                    @if($row->module->count() > 1)
                      <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="{{ $row->icon }}"></i><span class="hide-menu">{{ $r->menu }}<span class="badge badge-pill badge-cyan ml-auto">{{ $row->module->count() }}</span></span></a>
                        <ul aria-expanded="false" class="collapse">
                          @foreach($row->module as $ke => $r)
                            <li><a href="{{ route($r->route.'.index') }}">{{ $r->module }}</a></li>
                          @endforeach
                        </ul>
                      </li>
                    @else
                      <li>
                        <a class="waves-effect waves-dark" href="{{ route($row->module[0]->route.'.index') }}" aria-expanded="false">
                          <i class="{{ $row->module[0]->icon }}"></i>
                          <span class="hide-menu">{{ $row->module[0]->module }}</span>
                        </a>
                      </li>
                    @endif
                  @endforeach
                @endforeach

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
