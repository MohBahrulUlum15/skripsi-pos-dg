@extends('layouts.app')

@section('title', 'Posyandu')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Posyandu</h1>
                <div class="section-header-button">
                    <a href="{{ route('posyandu.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Posyandu</a></div>
                    <div class="breadcrumb-item">Data Posyandu</div>
                </div>
            </div>

            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible show fade">
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
                            {{-- <div class="card-header">
                                <h4>Data posyandu</h4>
                            </div> --}}
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('posyandu.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($posyandus as $posyandu)
                                            <tr>
                                                <th scope="row">{{ $count++ }}</th>
                                                <td>
                                                    {{ $posyandu->name }}
                                                </td>
                                                <td>
                                                    {{ $posyandu->alamat }}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content">

                                                        {{-- <a href="{{ route('posyandu.show', $posyandu->id) }}"
                                                            class="btn btn-sm btn-primary btn-icon">
                                                            <i class="fas fa-eye"></i>
                                                            Show
                                                        </a> --}}

                                                        <a href='{{ route('posyandu.edit', $posyandu->id) }}'
                                                            class="btn btn-sm btn-info btn-icon ml-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        {{-- <a href='{{ route('posyandu.edit', $posyandu->id) }}'
                                                            class="btn btn-sm btn-info btn-icon ml-2">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a> --}}

                                                        <form action="{{ route('posyandu.destroy', $posyandu->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
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
                                    {{ $posyandus->withQueryString()->links() }}
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
