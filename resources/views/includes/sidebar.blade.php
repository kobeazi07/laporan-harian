  <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
              <a href="./index.html" class="text-nowrap logo-img">
                  <img src="assets/images/logos/logo.svg" alt="" />
              </a>
              <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                  <i class="ti ti-x fs-6"></i>
              </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
              <ul id="sidebarnav">
                  <li class="nav-small-cap">
                      <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                      <span class="hide-menu">Home</span>
                  </li>
                  <li class="sidebar-item">
                      <a class="sidebar-link" href="{{ route('HalamanDashboard') }}" aria-expanded="false">
                          <i class="ti ti-atom"></i>
                          <span class="hide-menu">Dashboard</span>
                      </a>
                  </li>
                  <!-- ---------------------------------- -->
                  <!-- Dashboard -->
                  <!-- ---------------------------------- -->

                  <li class="sidebar-item">
                      <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                          aria-expanded="false">
                          <div class="d-flex align-items-center gap-3">
                              <span class="d-flex">
                                  <i class="ti ti-layout-grid"></i>
                              </span>
                              <span class="hide-menu">Laporan Harian</span>
                          </div>

                      </a>
                      <ul aria-expanded="false" class="collapse first-level">
                          <li class="sidebar-item">
                              <a class="sidebar-link justify-content-between" href="{{ route('HalamanAdminproject') }}">
                                  <div class="d-flex align-items-center gap-3">
                                      <div class="round-16 d-flex align-items-center justify-content-center">
                                          <i class="ti ti-circle"></i>
                                      </div>
                                      <span class="hide-menu">Project</span>
                                  </div>

                              </a>
                          </li>

                      </ul>
                  </li>

                  <li>
                      <span class="sidebar-divider lg"></span>
                  </li>
                  <li class="nav-small-cap">
                      <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                      <span class="hide-menu">Master Data</span>
                  </li>

                  <li class="sidebar-item">
                      <a class="sidebar-link justify-content-between" href="#" aria-expanded="false">
                          <div class="d-flex align-items-center gap-3">
                              <span class="d-flex">
                                  <i class="ti ti-user-circle"></i>
                              </span>
                              <span class="hide-menu">User Profile</span>
                          </div>

                      </a>
                  </li>

              </ul>
          </nav>
          <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
  </aside>
