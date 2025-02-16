    <div class="container">
        <h1>Input Rekam Medis untuk Pasien: {{ $pasien->name }}</h1>
        <!-- List Diagnosis Terdahulu -->
        <div class="mb-4">
            <h3>Diagnosis Terdahulu</h3>
            @if ($diagnosisTerdahulu->isEmpty())
                <p>Tidak ada diagnosis terdahulu.</p>
            @else
                <ul class="list-group">
                    @foreach ($diagnosisTerdahulu as $diagnosis)
                        <li class="list-group-item">
                            <strong>Tanggal:</strong> {{ $diagnosis->tanggal }} <br>
                            <strong>Diagnosis:</strong> {{ $diagnosis->diagnosis }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="mb-4">
            <form action="{{ route('simpan.rekam.medis') }}" method="POST">
                @csrf
                <input type="hidden" name="reservasi_id" value="{{ $reservasi->id }}">
                <input type="hidden" name="pasien_id" value="{{ $pasien->id }}">
                <input type="hidden" name="dokter_id" value="{{ $dokter->id }}">

                <!-- Input Tanggal (Otomatis Hari Ini) -->
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                        value="{{ now()->toDateString() }}" readonly>
                </div>

                <!-- Input Diagnosis -->
                <div class="mb-3">
                    <label for="diagnosis" class="form-label">Diagnosis</label>
                    <textarea class="form-control" id="diagnosis" name="diagnosis" rows="3" required></textarea>
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn btn-primary">Simpan Rekam Medis</button>
            </form>
        </div>
    </div>
