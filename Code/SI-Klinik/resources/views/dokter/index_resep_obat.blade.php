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
                            data-url="{{ url('/dokter/create') }}">
                            Tambah
                        </button>
                    </div>
                </div>
                {{-- Modal Button --}}
                {{-- <div class="col-sm-12 col-md-6">
                    <button type="button" class="btn btn-primary" id="btn-tambah"
                        data-url="{{ url('/dokter/create') }}">
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
                                    style="">Nama</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="">No BPJS</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="">Nama Obat</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="">Jumlah Obat</th>
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

                            @foreach ($resep_obat as $item)
                                @if ($item->user_id == auth()->user()->id)
                                    <tr class="odd">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pasien->name }}</td>
                                        <td>{{ $item->pasien->no_bpjs }}</td>
                                        <td>{{ $item->obat->nama }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td {{-- <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->tanggal_lahir }}</td>
                                    <td>{{ $item->alamat }}</td> --}} <td>
                                            <div class="d-flex">
                                                {{-- <a href="/dokter/{{ $item->id }}/edit"
                                                class="btn btn-info btn-sm btn-edit"><i class="fas fa-edit"></i></a> --}}
                                                <a href="#" class="btn btn-info btn-sm btn-edit"
                                                    data-id="{{ $item->id }}"
                                                    data-url="{{ url('/dokter') }}/{{ $item->id }}/edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                {{-- <form action="/dokter/{{ $item->id }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm ml-1"><i
                                                        class="fas fa-trash" data-confirm-delete="true"></i></button>
                                            </form> --}}
                                                <button type="button" class="btn btn-danger btn-sm ml-1 btn-delete"
                                                    data-id="{{ $item->id }}"
                                                    data-url="/dokter/{{ $item->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <button type="button" class="btn btn-success btn-sm ml-1 btn-resep"
                                                    data-id="{{ $item->id }}"
                                                    data-url="{{ $item->id . '/resep/create' }}">
                                                    <i class="fas fa-notes-medical"></i>
                                                </button>
                                            </div>
                                        </td>
                                @endif
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


<!-- Tambahkan script jQuery dan SweetAlert jika belum ada -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Tombol Tambah Dokter (sudah ada)
    $(document).on('click', '#btn-tambah', function() {
        var url = $(this).data('url');

        $.get(url, function(data) {
            $('#modal-body').html(data);
            $('#modal-default').modal('show');
        }).fail(function() {
            alert('Gagal memuat data, coba lagi.');
        });
    });

    // Submit form tambah dokter
    $(document).on('submit', '#form-tambah', function(e) {
        e.preventDefault();
        var form = $(this);

        $.ajax({
            url: "{{ url('/dokter/store') }}",
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                Swal.fire('Sukses!', 'Data dokter berhasil ditambahkan', 'success')
                    .then(() => location.reload());
            },
            error: function(xhr) {
                Swal.fire('Error!', xhr.responseJSON.message, 'error');
            }
        });
    });

    // Tombol Edit Dokter (sudah ada)
    $(document).on('click', '.btn-edit', function() {
        var url = $(this).data('url');

        $.get(url, function(data) {
            $('#modal-body').html(data);
            $('#modal-default').modal('show');
        }).fail(function() {
            alert('Gagal memuat data, coba lagi.');
        });
    });

    // Submit form edit dokter
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
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.message,
                    }).then((result) => {
                        $('#modal-default').modal('hide');
                        location.reload();
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

    // Tombol Delete Dokter (sudah ada)
    $(document).on('click', '.btn-delete', function() {
        var id = $(this).data('id');
        var url = $(this).data('url');

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
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.message,
                            }).then(() => {
                                location.reload();
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

    // --- Script untuk Tombol Resep Obat ---
    $(document).on('click', '.btn-resep', function() {
        var url = $(this).data('url');

        $.get(url, function(data) {
            // Misalnya, form resep obat akan dimuat di modal yang sama
            $('#modal-body').html(data);
            $('#modal-default').modal('show');
        }).fail(function() {
            alert('Gagal memuat data, coba lagi.');
        });
    });

    // Submit form resep obat (pastikan form pada modal memiliki id="form-resep")
    $(document).on('submit', '#form-resep', function(e) {
        e.preventDefault();
        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                Swal.fire('Sukses!', 'Resep obat berhasil dibuat', 'success')
                    .then(() => location.reload());
            },
            error: function(xhr) {
                Swal.fire('Error!', xhr.responseJSON.message, 'error');
            }
        });
    });
</script>
