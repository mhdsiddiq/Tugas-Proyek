<div class="modal-header">
    <h4 class="modal-title">Tambah Data Pasien</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form id="form-tambah" action="{{ url('/pasien/store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Pasien</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama pasien"
                required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat"
                required>
        </div>
        <div class="form-group">
            <label for="no_bpjs">Nomor BPJS</label>
            <input type="number" name="no_bpjs" id="no_bpjs" class="form-control" placeholder="Masukkan nomor BPJS">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
</div>
