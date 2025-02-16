<div class="modal-header">
    <h4 class="modal-title">Tambah Data Dokter</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form id="form-tambah" action="{{ url('/dokter/store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role_id">Dokter</label>
            {{-- <input type="text" class="form-control" value="{{ $defaultRole->name ?? 'Dokter' }}" readonly>
            <input type="hidden" name="role_id" value="{{ $defaultRole->id ?? '' }}"> --}}
        </div>
        <div class="form-group">
            <label for="name">Nama Dokter</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama dokter"
                required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email"
                required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password"
                required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
</div>
