<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">{{ __('Welcome') }}</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
            <div class="form-group mb-0">
                <!-- <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                </div> -->
            </div>
        </form>
        <!-- User -->
        <?php if(!empty($data['data_notif'])) { ?>
        <?php $number=0; foreach ($data['data_notif'] as $key => $value_number) { $number= $number+1; } ?>
        <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55" style="color:white;"></i>
                <span class="badge badge-warning badge-pill" style="color:white;"><?php echo $number; ?></span>
              </a>
             
              <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">Pemberitahuan Baru <strong class="text-primary"><?php echo $number; ?></strong> </h6>
                </div>
                <!-- List group -->

                <?php $i=1; foreach ($data['data_notif'] as $key => $value) { ?>
                <div class="list-group list-group-flush">
                  <a href="{{ route('read_notif', [$value->id_notif]) }}" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col ml--2">
                        <p class="text-sm mb-0">&nbsp; <?php echo $i++; ?>. ID <strong><?php echo $value->id_notif ?>-SKBM-TA</strong> <strong><?php echo $value->area_notif ?></strong>  <strong><?php echo $value->serial_number_notif ?></strong> <strong><?php echo $value->company_notif ?></strong> harap segera di update.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } ?>

              </div>
        </li>
        <?php }else{ ?>
        <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55" style="color:white;"></i>
                <span class="badge badge-warning badge-pill" style="color:white;"></span>
              </a>
          </li>
        <?php } ?>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/profile.png">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Change Password') }}</a>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>