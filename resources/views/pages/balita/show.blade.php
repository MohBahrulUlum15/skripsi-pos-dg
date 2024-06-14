@extends('layouts.app')

@section('title', 'Detail Balita')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Balita</h1>
                {{-- <div class="section-header-button">
                    <a href="{{ route('balita.create') }}" class="btn btn-primary">Add New</a>
                </div> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Balita</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Balita</a></div>
                    <div class="breadcrumb-item">Detail Balita</div>
                </div>
            </div>

            @if (Session::has('message'))
                <div class="alert alert-light alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ Session::get('message') }}
                    </div>
                </div>
            @endif
            <div class="section-body">

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-left">
                                    <h5 class="text-primary">Data Pemeriksaan Balita : {{ $balita->name }}</h5>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Usia</th>
                                            <th>Berat Badan</th>
                                            <th>Tinggi Badan</th>
                                            <th>BB/U</th>
                                            <th>TB/U</th>
                                            <th>BB/TB</th>
                                            <th>Status Periksa</th>
                                        </tr>
                                        @foreach ($pemeriksaans as $pemeriksaan)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    {{ $pemeriksaan->usia }}
                                                </td>
                                                <td>
                                                    {{ $pemeriksaan->berat_badan }}
                                                </td>
                                                <td>
                                                    {{ $pemeriksaan->tinggi_badan }}
                                                </td>
                                                <td>
                                                    {{ $pemeriksaan->hasilFuzzy->status_gizi_bb_tb ?? '-' }}
                                                    ({{ $pemeriksaan->hasilFuzzy->deff_val_bb_u ?? '-' }})
                                                </td>
                                                <td>
                                                    {{ $pemeriksaan->hasilFuzzy->status_gizi_tb_u ?? '-' }}
                                                    ({{ $pemeriksaan->hasilFuzzy->deff_val_tb_u ?? '-' }})
                                                </td>
                                                <td>
                                                    {{ $pemeriksaan->hasilFuzzy->status_gizi_bb_tb ?? '-' }}
                                                    ({{ $pemeriksaan->hasilFuzzy->deff_val_bb_tb ?? '-' }})
                                                </td>
                                                <td>
                                                    @if ($pemeriksaan->status == 'belum')
                                                        <span class="badge badge-sm badge-warning">Belum</span>
                                                    @else
                                                        <span class="badge badge-sm badge-success">Sudah</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                            </div>

                            <div class="float-right">
                                {{-- {{ $balitas->withQueryString()->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
