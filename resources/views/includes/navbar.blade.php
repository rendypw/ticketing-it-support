          <!-- Navbar -->

          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
              id="layout-navbar">
              <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                  <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                      <i class="bx bx-menu bx-sm"></i>
                  </a>
              </div>

              <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                  <!-- Search -->
                  <div class="navbar-nav align-items-center">
                      <div class="nav-item d-flex align-items-center">
                          <span class="fw-semibold d-block">Hai, {{ auth()->user()->name }}</span>
                      </div>
                  </div>
                  <!-- /Search -->

                  <ul class="navbar-nav flex-row align-items-center ms-auto">
                      <!-- Place this tag where you want the button to render. -->
                      <!-- User -->
                      <li class="nav-item navbar-dropdown dropdown-user dropdown">
                          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                              data-bs-toggle="dropdown">
                              <div class="avatar avatar-online">
                                <img src="../assets/img/avatars/profilasset.png" alt class="w-auto h-40 rounded-circle" />
                              </div>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-end">
                              <li>
                                  <a class="dropdown-item" href="#">
                                      <div class="d-flex">
                                          <div class="flex-shrink-0 me-3">
                                              <div class="avatar ">
                                                      <img src="../assets/img/avatars/profilasset.png" alt
                                                          class="w-auto h-40 rounded-circle" />
                                              </div>
                                          </div>
                                          <div class="flex-grow-1">
                                              <span class="fw-semibold d-block">Profil</span>
                                              <small class="text-muted">{{ auth()->user()->name }}</small>
                                          </div>
                                      </div>
                                  </a>
                              </li>
                              <li>
                                  <div class="dropdown-divider"></div>
                              </li>
                              <li>
                                  <a class="dropdown-item" href="/profil">
                                      <i class="bx bx-user me-2"></i>
                                      <span class="align-middle">My Profile</span>
                                  </a>
                              </li>
                              <li>
                                  <div class="dropdown-divider"></div>
                              </li>
                              <li>
                                  <a class="dropdown-item" href="/logout"
                                      onclick="return confirm('Apakah Anda Yakin Ingin Logout?');">
                                      <i class="bx bx-power-off me-2"></i>
                                      <span class="align-middle">Log Out</span>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <!--/ User -->
                  </ul>
              </div>
          </nav>

          <!-- / Navbar -->
