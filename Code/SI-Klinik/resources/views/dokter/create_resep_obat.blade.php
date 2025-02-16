{{-- resources/views/resep/create_resep_obat.blade.php --}}
<div class="modal-header">
    <h5 class="modal-title">Buat Resep Obat</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="form-resep" action="{{ route('resep.store') }}" method="POST">
        @csrf
        <input type="hidden" name="rekam_medis_id" value="{{ $rekamMedis->id }}">
        <input type="hidden" name="pasien_id" value="{{ $rekamMedis->pasien->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div class="form-group">
            <label for="obat_id">Pilih Obat</label>
            <select name="obat_id" id="obat_id" class="form-control">
                @foreach ($obats as $obat)
                    <option value="{{ $obat->id }}">
                        {{ $obat->nama }} ({{ $obat->satuan }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" required>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan Resep</button>
        </div>
    </form>
</div>
