<div class="modal-header">
    <h4 class="modal-title">Edit Data dokter</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form id="form-edit" action="{{ url('/dokter/' . $dokter->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama dokter</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $dokter->name }}"
                required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                value="{{ $dokter->tanggal_lahir }}" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="L" {{ $dokter->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="P" {{ $dokter->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $dokter->alamat }}"
                required>
        </div>
        <div class="form-group">
            <label for="no_bpjs">Nomor BPJS</label>
            <input type="number" name="no_bpjs" id="no_bpjs" class="form-control" value="{{ $dokter->no_bpjs }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
</div>
