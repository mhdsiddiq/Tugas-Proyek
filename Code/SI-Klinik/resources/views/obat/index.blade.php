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
                            data-url="{{ url('/obat/create') }}">
                            Tambah
                        </button>
                    </div>
                </div>
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
                                <th class="sorting sorting_asc">No</th>
                                <th class="sorting">Nama Obat</th>
                                <th class="sorting">Tanggal Masuk</th>
                                <th class="sorting">Tanggal Expire</th>
                                <th class="sorting">Satuan</th>
                                <th class="sorting">Jumlah</th>
                                <th class="sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obat as $item)
                                <tr class="odd">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tanggal_masuk }}</td>
                                    <td>{{ $item->tanggal_expire }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-info btn-sm btn-edit"
                                                data-id="{{ $item->id }}"
                                                data-url="{{ url('/obat') }}/{{ $item->id }}/edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm ml-1 btn-delete"
                                                data-id="{{ $item->id }}" data-url="/obat/{{ $item->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Pagination section tetap sama -->
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Update semua URL yang terkait dengan 'pasien' menjadi 'obat'
    $(document).on('click', '#btn-tambah', function() {
        var url = $(this).data('url'); // Sudah otomatis mengambil URL obat/create

        $.get(url, function(data) {
            $('#modal-body').html(data);
            $('#modal-default').modal('show');
        });
    });

    // Handle form tambah obat
    $(document).on('submit', '#form-tambah', function(e) {
        e.preventDefault();
        var form = $(this);

        $.ajax({
            url: "{{ url('/obat/store') }}", // Update endpoint
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                Swal.fire('Sukses!', 'Data obat berhasil ditambahkan', 'success')
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

    // Handle form edit obat
    $(document).on('submit', '#form-edit', function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            url: url,
            method: 'PUT',
            data: form.serialize(),
            success: function(response) {
                Swal.fire('Sukses!', 'Data obat berhasil diupdate', 'success')
                    .then(() => location.reload());
            },
            error: function(xhr) {
                Swal.fire('Error!', xhr.responseJSON.message, 'error');
            }
        });
    });

    // Script delete tetap sama (hanya URL yang berubah)
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
