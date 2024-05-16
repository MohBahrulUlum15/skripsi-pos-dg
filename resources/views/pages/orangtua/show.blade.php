@extends('layouts.app')

@section('title', 'Detail Orang Tua')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Orang Tua</h1>
                {{-- <div class="section-header-button">
                    <a href="{{ route('orangtua.create') }}" class="btn btn-primary">Add New</a>
                </div> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Orang Tua</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Orang Tua</a></div>
                    <div class="breadcrumb-item">Detail Orang Tua</div>
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
                                    <h5 class="text-primary">Data Balita | Orang Tua: {{ $orangtua->user->name }}</h5>
                                </div>
                                <div class="float-right">
                                    {{-- <form method="GET" action="{{ route('orangtua.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form> --}}

                                    <div class="section-header-button">
                                        <a href="{{ route('catatan-kelahiran.create', $orangtua->id) }}"
                                            class="btn btn-primary">Tambah
                                            Balita</a>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix mb-0"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>BB Lahir</th>
                                        <th>TB Lahir</th>
                                        <th>Nama Posyandu</th>
                                        <th>Aksi</th>
                                    </tr>
                                    @foreach ($balitas as $balita)
                                        <tr>
                                            <th scope="row">{{ $count++ }}</th>
                                            <td>
                                                {{ $balita->name }}
                                            </td>
                                            <td>
                                                {{ $balita->tanggal_lahir }}
                                            </td>
                                            <td>
                                                {{ $balita->jenis_kelamin }}
                                            </td>
                                            <td>
                                                {{ $balita->bb_lahir }}
                                            </td>
                                            <td>
                                                {{ $balita->tb_lahir }}
                                            </td>
                                            <td>
                                                {{ $balita->posyandu->name }}
                                            </td>
                                            {{-- <td>
                                                {{ $balita->bt_p }}
                                            </td>
                                            <td>
                                                {{ $balita->ba_p }}
                                            </td> --}}
                                            <td>
                                                <div class="d-flex justify-content">
                                                    <a href='{{ route('balita.edit', $balita->id) }}'
                                                        class="btn btn-sm btn-info btn-icon">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('balita.destroy', $balita->id) }}"
                                                        method="POST" class="ml-2">
                                                        <input type="hidden" name="_method" value="DELETE" />
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                        <button class="btn btn-sm btn-danger btn-icon confirm-delete"
                                                            onclick="return confirm('Hapus data?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                </table>
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
