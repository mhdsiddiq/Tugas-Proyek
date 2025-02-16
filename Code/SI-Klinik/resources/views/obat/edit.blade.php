<div class="modal-header">
    <h4 class="modal-title">Edit Data Obat</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form id="form-edit" action="{{ url('/obat/' . $obat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Obat</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $obat->nama }}"
                required>
        </div>
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control"
                value="{{ $obat->tanggal_masuk->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_expire">Tanggal Expire</label>
            <input type="date" name="tanggal_expire" id="tanggal_expire" class="form-control"
                value="{{ $obat->tanggal_expire->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="satuan">Satuan</label>
            <select name="satuan" id="satuan" class="form-control" required>
                <option value="tablet" {{ $obat->satuan == 'tablet' ? 'selected' : '' }}>Tablet</option>
                <option value="kapsul" {{ $obat->satuan == 'kapsul' ? 'selected' : '' }}>Kapsul</option>
                <option value="botol" {{ $obat->satuan == 'botol' ? 'selected' : '' }}>Botol</option>
                <option value="sachet" {{ $obat->satuan == 'sachet' ? 'selected' : '' }}>Sachet</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $obat->jumlah }}"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
</div>
