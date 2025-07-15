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
                        <h4 class="fw-bold py-0 mb-2"><span class="text-muted fw-light">Ticketing /</span> Ajukan Tiket
                        </h4>
                        @if (Session::has('success'))
                            <div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show"
                                role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                <div class="toast-header">
                                    <i class="bx bx-check-circle me-2"></i>
                                    <div class="me-auto fw-semibold">IT Support</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                </div>
                                <div class="toast-body">Data Berhasil Dikirim</div>
                            </div>
                        @endif
                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic Layout -->
                            <div class="col-xxl">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        @if ($iDataTicketing->status == 'Open')
                                            <div class="alert alert-danger" role="alert" style="font-size: 20px">
                                                <center>Status Ticketing {{ $iDataTicketing->status }} </center>
                                            </div>
                                        @elseif ($iDataTicketing->status == 'On Progress')
                                            <div class="alert alert-warning" role="alert" style="font-size: 20px">
                                                <center>Status Ticketing {{ $iDataTicketing->status }} </center>
                                            </div>
                                        @elseif ($iDataTicketing->status == 'Resolved')
                                            <div class="alert alert-success" role="alert" style="font-size: 20px">
                                                <center>Status Ticketing {{ $iDataTicketing->status }} </center>
                                            </div>
                                        @elseif ($iDataTicketing->status == 'Closed')
                                            <div class="alert alert-secondary" role="alert" style="font-size: 20px">
                                                <center>Status Ticketing {{ $iDataTicketing->status }} </center>
                                            </div>
                                        @endif
                                        <div class="row mb-3">
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" name="nama" class="form-control" required
                                                        id="basic-default-name" value="{{ $iDataTicketing->user->name }}"
                                                        readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label>No Ticket</label>
                                                    <input type="text" name="nama" class="form-control" required
                                                        id="basic-default-name" value="{{ $iDataTicketing->ticket_no }}"
                                                        readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select readonly id="kategori" name="kategori" class="form-select"
                                                        required disabled>
                                                                <option value="{{ $iDataTicketing->kategori->id }}">
                                                                    {{ $iDataTicketing->kategori->nama_kategori }}
                                                                </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <textarea readonly id="basic-default-message" name="keterangan" class="form-control"
                                                        placeholder="contoh: tidak bisa konek wifi">{{ $iDataTicketing->keterangan }}</textarea>
                                                </div>
                                            </div>
                                            @if ($iDataTicketing->file_upload != null)
                                                <div class="col-md-5 pl-1">
                                                    <div class="form-group">
                                                        <label>File Tiket</label><br>
                                                        <a type="button" class="btn btn-primary"
                                                            href="../{{ $iDataTicketing->file_upload }}">Unduh File
                                                            Tiket
                                                            Disini</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        @if (auth()->user()->role == 'Admin' && $iDataTicketing->status != "Closed" )
                                            <form method="POST" enctype="multipart/form-data"
                                                action="/simpan-proses-tiket/{{ $iDataTicketing->id }}">
                                                {{ csrf_field() }}
                                                <hr class="m-0" /><br>
                                                <div class="row mb-3">
                                                    <div class="col-md-5 pr-1">
                                                        <div class="form-group">
                                                            <label>catatan</label>
                                                            <textarea id="basic-default-message" name="catatan" class="form-control" placeholder="contoh: sedang dicek ke user"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                            <label>File Upload</label>
                                                            @if (count($errors) > 0)
                                                                @foreach ($errors->all() as $error)
                                                                    <a style="color: rgb(238, 145, 39)">{{ $error }}
                                                                    </a>
                                                                @endforeach
                                                            @endif
                                                            <input class="form-control" type="file" id="file_catatan"
                                                                name="file_catatan" />
                                                            <small class="text-muted" style="font-style: italic">
                                                                *file berupa foto atau data maksimal 10mb</small>
                                                        </div>
                                                    </div>
                                                    @if ($iDataTicketing->status == 'Open')
                                                        <input type="text" name="status" value="On Progress" hidden>
                                                    @elseif ($iDataTicketing->status == 'On Progress')
                                                        <input type="text" name="status" value="Resolved" hidden>
                                                    @else
                                                        <input type="text" name="status" value="Closed" hidden>
                                                    @endif
                                                </div>
                                                @php
                                                    $btStatus = ' On Progress ';
                                                    if ($iDataTicketing->status == 'On Progress') {
                                                        $btStatus = ' Resolved ';
                                                    } elseif ($iDataTicketing->status == 'Resolved') {
                                                        $btStatus = ' Closed ';
                                                    }
                                                @endphp
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-12">
                                                        <button type="proses"
                                                            onclick="return confirm('status ticket akan berubah menjadi{{ $btStatus }}apakah anda yakin?');"class="btn btn-success">Kirim</button><br>
                                                        <small class="text-muted" style="font-style: italic">
                                                            *jika catatan kosong, maka file tidak akan tersimpan</small>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Catatan</h5>
                                        <small style="font-style: italic" class="text-muted float-end">*Catatan
                                            paling
                                            atas adalah yang terbaru</small>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            @foreach ($iDataCatatan as $x)
                                                <div>
                                                    <div class="col-sm-12">
                                                        <small style="font-style: italic"
                                                            class="text-muted float-end">{{ $x->created_at }}</small>
                                                        <label class="form-label"
                                                            style="font-weight: bolder">{{ $x->name }}</label>
                                                        <label class="form-label" style="font-weight: unset">~</label>
                                                        <label class="form-label"
                                                            style="font-weight: bolder">{{ $x->role }}</label>
                                                        <textarea readonly id="basic-default-message" class="form-control mb-1" placeholder="Ketikan sesuatu disini"
                                                            aria-label="Ketikan sesuatu disini" aria-describedby="basic-icon-default-message2">{{ $x->catatan }}</textarea>
                                                        @if (!empty($x->file_catatan))
                                                            <a type="text" href="../{{ $x->file_catatan }}">Unduh
                                                                File
                                                                Hasil Proses
                                                                Disini</a>
                                                            <hr class="mb-0" /><br>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
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
