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
                        {{-- <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Ticketing /</span> Data Tiket
                        </h4> --}}
                        <form method="POST" enctype="multipart/form-data" action="/filter">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <a style="font-weight: bolder; font-size: 20px" class="col-sm-4"><span
                                        class="text-muted fw-light">Ticketing /</span> Data Tiket
                                </a>
                                @if (auth()->user()->role == 'Admin')
                                    <div class="col-sm-2">
                                        <select id="filterkategori" name="status" class="form-select">
                                            <option value="">status</option>
                                            <option {{ request('status') == 'Open' ? 'selected' : '' }} value="Open">
                                                Open</option>
                                            <option {{ request('status') == 'On Progress' ? 'selected' : '' }} value="On Progress">
                                                On Progress</option>
                                            <option {{ request('status') == 'Resolved' ? 'selected' : '' }} value="Resolved">
                                                Resolved</option>
                                            <option {{ request('status') == 'Closed' ? 'selected' : '' }} value="Closed">Closed</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select id="filterkategori" name="kategori" class="form-select">
                                            <option value="">Kategori</option>
                                            <option {{ request('kategori') == 1 ? 'selected' : '' }} value="1">
                                                Hardware</option>
                                            <option {{ request('kategori') == 2 ? 'selected' : '' }} value="2">
                                                Software</option>
                                            <option {{ request('kategori') == 3 ? 'selected' : '' }} value="3">
                                                Jaringan</option>
                                            <option {{ request('kategori') == 4 ? 'selected' : '' }} value="4">Lain
                                                - Lain</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="tanggal" class="form-control"
                                            id="basic-default-name" value="{{ request('tanggal') }}" />
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary">filter</button>
                                    </div>
                                @endif
                            </div>

                        </form>
                        <div class="card">
                            <div class="row mb-0 mt-2">
                                <div class="col-md-11 pl-2" align="right" style="margin-right: px">
                                    @if (auth()->user()->role == '1')
                                        <a href="/export-pengajuan" type="button" class="btn btn-primary">Download
                                            Data</a>
                                    @endif
                                </div>
                            </div>
                            <div class="table-responsive mb-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>nama</th>
                                            <th>kategori</th>
                                            <th>Waktu Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    @foreach ($iDataTicketing as $no => $x)
                                        <tr>
                                            <th scope="row">{{ ++$no }}</th>
                                            <td>{{ $x->name }}</td>
                                            <td>{{ $x->nama_kategori }}</td>
                                            <td>{{ $x->created_at }}</td>
                                            <td>
                                                @if ($x->status == 'Open')
                                                    <span id="result" class="badge bg-label-danger">Open</span>
                                                @elseif ($x->status == 'On Progress')
                                                    <span id="result" class="badge bg-label-warning">On
                                                        Progress</span>
                                                @elseif ($x->status == 'Resolved')
                                                    <span id="result" class="badge bg-label-success">Resolved</span>
                                                @elseif ($x->status == 'Closed')
                                                    <span id="result" class="badge bg-label-secondary">Closed</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/detail-data-tiket/{{ $x->id }}"
                                                    class="btn btn-xs btn-outline-primary">Lihat</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-11">
                                    {{ $iDataTicketing->links() }}
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
