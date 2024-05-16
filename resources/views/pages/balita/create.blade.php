@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data Balita</h1>
                {{-- <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Users</div>
                </div> --}}
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('balita.store') }}" method="POST">
                    {{-- <form action="#" method="POST"> --}}
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Nama Orang Tua</label>
                                {{-- <select class="form-control selectric @error('variabel_id') is-invalid @enderror"
                                    name="variabel_id">
                                    <option value="">-- Pilih Variabel --</option>
                                    @foreach ($variabels as $variabel)
                                        <option value="{{ $variabel->id }}"
                                            {{ old('variabel_id') == $variabel->id ? 'selected' : '' }}>
                                            {{ $variabel->name }}</option>
                                    @endforeach
                                </select> --}}
                                <input type="hidden" value="{{$orangtua->id}}" name="orang_tua_id">
                                <input type="text" value="{{$orangtua->user->name}}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name">
                                @if ($errors->has('name'))
                                    <span class="text-danger lowercase text-sm">&nbsp;*
                                        {{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control"name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') }}">
                                @if ($errors->has('tanggal_lahir'))
                                    <span class="text-danger lowercase text-sm">&nbsp;*
                                        {{ $errors->first('tanggal_lahir') }}</span>
                                @endif
                            </div>

                            {{-- jenis kelamin --}}
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control selectric @error('jenis_kelamin') is-invalid @enderror"
                                    name="jenis_kelamin">
                                    <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            {{-- bb & pb --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Berat Badan Lahir (Kg)</label>
                                        <input type="number|decimal" class="form-control @error('bb_lahir') is-invalid @enderror"
                                            name="bb_lahir">
                                        @if ($errors->has('bb_lahir'))
                                            <span class="text-danger lowercase text-sm">&nbsp;*
                                                {{ $errors->first('bb_lahir') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tinggi Badan Lahir (Cm)</label>
                                        <input type="number|decimal" class="form-control @error('tb_lahir') is-invalid @enderror"
                                            name="tb_lahir">
                                        @if ($errors->has('tb_lahir'))
                                            <span class="text-danger lowercase text-sm">&nbsp;*
                                                {{ $errors->first('tb_lahir') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- posyandu --}}
                            <div class="form-group">
                                <label class="form-label">Posyandu</label>
                                <select class="form-control selectric @error('posyandu_id') is-invalid @enderror"
                                    name="posyandu_id">
                                    <option value="" disabled selected id="psydtest">-- Pilih Posyandu --</option>
                                    @forelse ($posyandu as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @empty
                                        <option value="">~ belum ada data posyandu ~</option>
                                        <script>
                                            document.getElementById('psydtest').remove();
                                        </script>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endpush
