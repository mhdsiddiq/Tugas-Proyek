{{-- @extends('layouts.main')

@section('title', 'Dashboard')

@section('content') --}}

<!-- Small boxes (Stat box) -->
{{-- <div class="card-header">
    <h3 class="card-title">{{ $title }}</h3>
</div> --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row m-0">
            <div class="col-sm-0">
                <h4 class="m-0">{{ $title }}</h4>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @if ($pasien->isEmpty())
                <p>Tidak Ada Pasien</p>
            @else
                @foreach ($pasien as $item)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>Antrian : {{ $loop->iteration }}</h3>
                                <h5>Nama : {{ $item->pasien->name }}</h5>
                                <h5>Jenis Kelamin :
                                    {{ $item->pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </h5>
                            </div>
                            {{-- <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div> --}}
                            <a href="{{ route('input.rekam.medis', ['id' => $item->id]) }}" class="small-box-footer">CEK
                                PASIEN <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
