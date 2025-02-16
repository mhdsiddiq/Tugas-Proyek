<div class="modal-header">
    <h4 class="modal-title">Edit Data Pasien</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form id="form-edit" action="{{ url('/pasien/' . $pasien->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Pasien</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $pasien->name }}"
                required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                value="{{ $pasien->tanggal_lahir }}" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="L" {{ $pasien->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="P" {{ $pasien->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $pasien->alamat }}"
                required>
        </div>
        <div class="form-group">
            <label for="no_bpjs">Nomor BPJS</label>
            <input type="number" name="no_bpjs" id="no_bpjs" class="form-control" value="{{ $pasien->no_bpjs }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
</div>
