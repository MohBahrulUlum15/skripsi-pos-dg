@extends('layouts.app')

@section('title', 'Edit posyandu')

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
                <h1>Edit Data posyandu</h1>
                {{-- <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Users</div>
                </div> --}}
            </div>

            <div class="section-body">
                <div class="card">
                    {{-- <form action="{{ route('posyandu.store') }}" method="POST"> --}}
                    <form action="{{ route('posyandu.update', $posyandu) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $posyandu->name }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger lowercase text-sm">&nbsp;*
                                        {{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <label>NIP</label>
                                <input type="number" class="form-control" name="nip" value="{{ $posyandu->nip }}">
                                @if ($errors->has('nip'))
                                    <span class="text-danger lowercase text-sm">&nbsp;*
                                        {{ $errors->first('nip') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control"name="tanggal_lahir"
                                    value="{{ $posyandu->tanggal_lahir }}">
                                @if ($errors->has('tanggal_lahir'))
                                    <span class="text-danger lowercase text-sm">&nbsp;*
                                        {{ $errors->first('tanggal_lahir') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" readonly name="email"
                                    value="{{ $posyandu->user->email }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger lowercase text-sm">&nbsp;*
                                        {{ $errors->first('email') }}</span>
                                @endif
                            </div> --}}
                            {{-- <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger lowercase text-sm">&nbsp;*
                                        {{ $errors->first('password') }}</span>
                                @endif
                            </div> --}}
                            {{-- <div class="form-group">
                                <label>No. HP</label>
                                <input type="number" class="form-control" name="phone"
                                    value="{{ $posyandu->user->phone }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger lowercase text-sm">&nbsp;*
                                        {{ $errors->first('phone') }}</span>
                                @endif
                            </div> --}}

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ $posyandu->alamat }}">
                                @if ($errors->has('alamat'))
                                    <span class="text-danger lowercase text-sm">&nbsp;*
                                        {{ $errors->first('alamat') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Bidan</label>
                                <select class="form-control select2" multiple="multiple" id="bidan_id" name="bidan_id[]">
                                    @foreach ($bidans as $bidan)
                                        <option value="{{ $bidan->id }}"
                                            {{ in_array($bidan->id, $selectedBidans) ? 'selected' : '' }}>
                                            {{ $bidan->user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label class="form-label">Roles</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="ADMIN" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Admin</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="posyandu" class="selectgroup-input">
                                        <span class="selectgroup-button">posyandu</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="USER" class="selectgroup-input">
                                        <span class="selectgroup-button">User</span>
                                    </label>
                                </div>
                            </div> --}}
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
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
