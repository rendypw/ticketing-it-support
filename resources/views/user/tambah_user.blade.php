<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ url('assets/') }}" data-template="vertical-menu-template-free">

<head>
    <title>
        Ticketing - IT Support
    </title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    @include('includes.head')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('includes.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('includes.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <!-- / Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data User /</span> Tambah
                            User Baru</h4>
                        @if (Session::has('success'))
                            <div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show"
                                role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                <div class="toast-header">
                                    <i class="bx bx-check-circle me-2"></i>
                                    <div class="me-auto fw-semibold">IT Support</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                </div>
                                <div class="toast-body">Data Berhasil Disimpan</div>
                            </div>
                        @endif
                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic Layout -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data" action="/simpan-user-baru">
                                            {{ csrf_field() }}
                                            <div class="row mb-1">
                                                <div class="col-md-5 pl-1">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" id="namadokumen" name="nama"
                                                            class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-md-5 pl-1">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        @error('username')
                                                            <a style="color: rgb(238, 145, 39)">{{ $message }}
                                                            </a>
                                                        @enderror
                                                        <input type="text" id="username" name="username"
                                                            class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-md-5 pl-1">
                                                    <div class="form-group">
                                                        <label>email</label>
                                                        @error('email')
                                                            <a style="color: rgb(238, 145, 39)">{{ $message }}
                                                            </a>
                                                        @enderror
                                                        <input type="text" id="namadokumen" name="email"
                                                            class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-md-5 pl-1">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="text" id="password" name="password"
                                                            class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-5 pl-1">
                                                    <div class="form-group">
                                                        <label>Role</label>
                                                        <select id="role" name="role" class="form-select"
                                                            required>
                                                            <option value="">Pilih Disini</option>
                                                            <option value="User">User</option>
                                                            <option value="Admin">Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                    <button type="submit"
                                                        onclick="return confirm('apakah data yang anda input sudah benar?');"class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        @include('includes.footer')
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    @include('includes.coreJs')

</body>

</html>
