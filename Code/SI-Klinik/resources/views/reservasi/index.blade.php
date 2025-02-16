<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dt-buttons btn-group flex-wrap">
                        <button class="btn btn-secondary buttons-pdf buttons-html5" style="margin-right: 10px;"
                            tabindex="0" aria-controls="example1" type="button">
                            <span>PDF</span>
                        </button>
                        <button type="button" class="btn btn-primary" id="btn-tambah"
                            data-url="{{ url('/reservasi/create') }}">
                            Tambah
                        </button>
                    </div>
                </div>
                {{-- Modal Button --}}
                {{-- <div class="col-sm-12 col-md-6">
                    <button type="button" class="btn btn-primary" id="btn-tambah"
                        data-url="{{ url('/reservasi/create') }}">
                        Tambah
                    </button>
                </div> --}}
                <!-- Modal Placeholder -->
                <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body" id="modal-body">
                                <!-- Konten modal akan dimuat di sini -->
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-sm-12 col-md-6">
                </div> --}}
                <div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter">Search<label><input type="search"
                                class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                        aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending" style="">
                                    No</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="">Nama Dokter</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="">Nama Pasien</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="">No BPJS</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="">Keluhan</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="">Tanggal Reservasi</th>
                                {{-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="">Jam Reservasi</th> --}}
                                {{-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="">Status</th> --}}
                                {{-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                    No BPJS</th> --}}
                                {{-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Engine version: activate to sort column ascending"
                                    style="">Jenis Kelamin</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Engine version: activate to sort column ascending"
                                    style="">Tanggal Lahir</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                    style="">Alamat</th> --}}
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                    style="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservasi as $item)
                                <tr class="odd">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->dokter->name }}</td>
                                    <td>{{ $item->pasien->name }}</td>
                                    <td>{{ $item->no_bpjs }}</td>
                                    <td>{{ $item->keluhan }}</td>
                                    <td>{{ $item->tanggal_reservasi }}</td>
                                    {{-- <td>{{ \Carbon\Carbon::parse($item->tanggal_reservasi)->format('H:i') }}</td> --}}
                                    {{-- <td>{{ $item->status }}</td> --}}
                                    {{-- <td>{{ $item->no_bpjs }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->tanggal_lahir }}</td>
                                    <td>{{ $item->alamat }}</td> --}}
                                    <td>
                                        <div class="d-flex">
                                            {{-- <a href="/reservasi/{{ $item->id }}/edit"
                                                class="btn btn-info btn-sm btn-edit"><i class="fas fa-edit"></i></a> --}}
                                            <a href="#" class="btn btn-info btn-sm btn-edit"
                                                data-id="{{ $item->id }}"
                                                data-url="{{ url('/reservasi') }}/{{ $item->id }}/edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {{-- <form action="/reservasi/{{ $item->id }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm ml-1"><i
                                                        class="fas fa-trash" data-confirm-delete="true"></i></button>
                                            </form> --}}
                                            <button type="button" class="btn btn-danger btn-sm ml-1 btn-delete"
                                                data-id="{{ $item->id }}"
                                                data-url="/reservasi/{{ $item->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1" style="">Rendering engine</th>
                                <th rowspan="1" colspan="1" style="">Browser</th>
                                <th rowspan="1" colspan="1">Platform(s)</th>
                                <th rowspan="1" colspan="1" style="">Engine version</th>
                                <th rowspan="1" colspan="1" style="">CSS grade</th>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to
                        10 of 57 entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="example1_previous"><a
                                    href="#" aria-controls="example1" data-dt-idx="0" tabindex="0"
                                    class="page-link">Previous</a></li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="example1"
                                    data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                    data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                    data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                    data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                    data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                    data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                            <li class="paginate_button page-item next" id="example1_next"><a href="#"
                                    aria-controls="example1" data-dt-idx="7" tabindex="0"
                                    class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>


<!-- Tambahkan script jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '#btn-tambah', function() {
        var url = $(this).data('url');

        $.get(url, function(data) {
            $('#modal-body').html(data);
            $('#modal-default').modal('show');
        }).fail(function() {
            alert('Gagal memuat data, coba lagi.');
        });
    });

    $(document).on('submit', '#form-tambah', function(e) {
        e.preventDefault(); // Mencegah reload halaman
        var form = $(this);

        $.ajax({
            url: "{{ url('/reservasi/store') }}", // Update endpoint
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                Swal.fire('Sukses!', 'Data reservasi berhasil ditambahkan', 'success')
                    .then(() => location.reload());
            },
            error: function(xhr) {
                Swal.fire('Error!', xhr.responseJSON.message, 'error');
            }
        });
    });

    // Script untuk membuka modal edit
    $(document).on('click', '.btn-edit', function() {
        var url = $(this).data('url');

        $.get(url, function(data) {
            $('#modal-body').html(data);
            $('#modal-default').modal('show');
        }).fail(function() {
            alert('Gagal memuat data, coba lagi.');
        });
    });

    // Script untuk handle submit form edit
    $(document).on('submit', '#form-edit', function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            url: url,
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    // Tampilkan SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.message,
                    }).then((result) => {
                        $('#modal-default').modal('hide');
                        location.reload(); // Refresh halaman setelah alert ditutup
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: xhr.responseJSON.message,
                });
            }
        });
    });
    $(document).on('click', '.btn-delete', function() {
        var id = $(this).data('id');
        var url = $(this).data('url');

        // Konfirmasi sebelum menghapus
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim request delete menggunakan AJAX
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}' // Tambahkan token CSRF
                    },
                    success: function(response) {
                        if (response.success) {
                            // Tampilkan SweetAlert sukses
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.message,
                            }).then(() => {
                                location
                                    .reload(); // Refresh halaman setelah alert ditutup
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: xhr.responseJSON.message,
                        });
                    }
                });
            }
        });
    });
</script>
