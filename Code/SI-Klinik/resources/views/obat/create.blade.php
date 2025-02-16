<div class="modal-header">
    <h4 class="modal-title">Tambah Data Obat</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form id="form-tambah" action="{{ url('/obat/store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Obat</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama obat"
                required>
        </div>
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal_expire">Tanggal Expire</label>
            <input type="date" name="tanggal_expire" id="tanggal_expire" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="satuan">Satuan</label>
            <select name="satuan" id="satuan" class="form-control" required>
                <option value="tablet">Tablet</option>
                <option value="kapsul">Kapsul</option>
                <option value="botol">Botol</option>
                <option value="sachet">Sachet</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukkan jumlah"
                required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
</div>
