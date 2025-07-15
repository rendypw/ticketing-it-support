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
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-1">Log History <span class="text-muted fw-light"
                                style="font-style: italic">- diurutkan terbaru paling atas</span>
                        </h4>
                        <div class="card">
                            <div class="table-responsive mb-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>db_ticket</th>
                                            <th>db_user</th>
                                            <th>db_catatan</th>
                                            <th>user</th>
                                            <th>tindakan</th>
                                            <th>catatan</th>
                                            <th>waktu tanggal</th>
                                        </tr>
                                    </thead>
                                    @foreach ($iLog as $no => $x)
                                        <tr tr
                                            @if ($no % 2 == 0) style="background-color: #f2f2f2" @endif>
                                            <th scope="row">{{ ++$no }}</th>
                                            <td>{{ $x->db_ticket }}</td>
                                            <td>{{ $x->db_user }}</td>
                                            <td>{{ $x->db_catatan }}</td>
                                            <td>{{ $x->user_id }}</td>
                                            <td>{{ $x->tindakan }}</td>
                                            <td>{{ $x->catatan }}</td>
                                            <td>{{ $x->created_at }}</td>
                                    @endforeach
                                </table>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-11">
                                    {{ $iLog->links() }}
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
