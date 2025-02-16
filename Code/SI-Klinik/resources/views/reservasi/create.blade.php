<div class="modal-header">
    <h4 class="modal-title">Buat Reservasi Pasien</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form id="form-reservasi" action="{{ url('/reservasi/store') }}" method="POST">
        @csrf
        <input type="hidden" name="pasien_id" id="pasien_id" value="{{ $pasien->id }}">

        <div class="form-group">
            <label for="tanggal_reservasi">No BPJS</label>
            <input type="text" name="no_bpjs" id="no_bpjs" class="form-control" value="{{ $pasien->no_bpjs }}"
                required>
        </div>

        <div class="form-group">
            <label for="tanggal_reservasi">Tanggal Reservasi</label>
            <input type="datetime-local" name="tanggal_reservasi" id="tanggal_reservasi" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="dokter">Pilih Dokter</label>
            <select name="dokter_id" id="dokter_id" class="form-control" required>
                @foreach ($dokters as $dokter)
                    <option value="{{ $dokter->id }}">{{ $dokter->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="keluhan">Keluhan</label>
            <textarea name="keluhan" id="keluhan" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Buat Reservasi</button>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
</div>
