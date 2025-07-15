<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ url('assets/') }}" data-template="vertical-menu-template-free">

<head>
    <title>
        Ticketing - IT Support
    </title>
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
                    @if (Session::has('success'))
                        <div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show"
                            role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                            <div class="toast-header">
                                <i class="bx bx-check-circle me-2"></i>
                                <div class="me-auto fw-semibold">IT Support</div>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">data user berhasil di tambah</div>
                        </div>
                    @endif

                    @if (Session::has('successUpt'))
                        <div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show"
                            role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                            <div class="toast-header">
                                <i class="bx bx-check-circle me-2"></i>
                                <div class="me-auto fw-semibold">IT Support</div>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">data user berhasil di perbarui</div>
                        </div>
                    @endif
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-1">Data User
                        </h4>
                        <div class="card">
                            <div class="row mb-0 mt-2">
                                <div class="col-md-11 pl-2" align="right" style="margin-right: px">
                                    <a href="/tambah-user" type="button" class="btn btn-success">Input User
                                        Baru</a>
                                </div>
                            </div>
                            <div class="table-responsive  mb-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>

                                    @foreach ($dataUser as $no => $x)
                                        <tr>
                                            <th scope="row">{{ ++$no }}</th>
                                            <td>{{ $x->name }}</td>
                                            <td>{{ $x->username }}</td>
                                            <td>{{ $x->email }}</td>
                                            <td>{{ $x->role }}</td>
                                            @if (auth()->user()->role == 'Admin')
                                                <td>
                                                    <a href="/kelola-user/{{ $x->id }}" type="button"
                                                        class="btn btn-xs btn-outline-primary"> ATUR </a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-11">
                                    {{ $dataUser->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

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
