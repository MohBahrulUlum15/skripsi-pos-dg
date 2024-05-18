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
                <h1>Tambah Data Jadwal</h1>
                {{-- <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Users</div>
                </div> --}}
            </div>

            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ Session::get('error') }}
                    </div>
                </div>
            @endif

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('jadwal.store') }}" method="POST">
                        {{-- <form action="#" method="POST"> --}}
                        @csrf
                        <div class="card-body">
                            {{-- posyandu --}}
                            <div class="form-group">
                                <label class="form-label">Posyandu</label>
                                <select class="form-control selectric @error('posyandu_id') is-invalid @enderror"
                                    name="posyandu_id">
                                    <option value="" disabled selected id="psydtest">-- Pilih Posyandu --</option>
                                    @foreach ($posyandus as $posyandu)
                                        <option value="{{ $posyandu->id }}"
                                            {{ old('posyandu_id') == $posyandu->id ? 'selected' : '' }}>
                                            {{ $posyandu->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('posyandu_id'))
                                    <span class="text-danger lowercase text-sm">&nbsp;*
                                        {{ $errors->first('posyandu_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control"name="tanggal" value="{{ old('tanggal') }}">
                                @if ($errors->has('tanggal'))
                                    <span class="text-danger lowercase text-sm">&nbsp;*
                                        {{ $errors->first('tanggal') }}</span>
                                @endif
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
