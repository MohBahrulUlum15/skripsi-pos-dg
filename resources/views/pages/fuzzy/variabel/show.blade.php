@extends('layouts.app')

@section('title', 'Detail Variabel')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Variabel</h1>
                {{-- <div class="section-header-button">
                    <a href="{{ route('variabel.create') }}" class="btn btn-primary">Add New</a>
                </div> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Variabel</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Variabel</a></div>
                    <div class="breadcrumb-item">Detail Variabel</div>
                </div>
            </div>
            <div class="section-body">

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-left">
                                    <h5 class="text-primary">Keanggotaan / Membership | Variabel {{ $variabel->name }}</h5>
                                </div>

                                <div class="float-right">
                                    <h6><b>*Catatan :</b></h6>
                                    <p>BB = Batas Bawah, BT = Batas Tengah, BA = Batas Atas</p>
                                </div>
                            </div>

                            <div class="clearfix mb-0"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama Keanggotaan</th>
                                        <th>Fungsi</th>
                                        <th>BB (L)</th>
                                        <th>BT (L)</th>
                                        <th>BA (L)</th>
                                        <th>BB (P)</th>
                                        <th>BT (P)</th>
                                        <th>BA (P)</th>
                                        {{-- <th>Aksi</th> --}}
                                    </tr>
                                    @foreach ($keanggotaans as $keanggotaan)
                                        <tr>
                                            <th scope="row">{{ $count++ }}</th>
                                            <td>
                                                {{ $keanggotaan->nama_keanggotaan }}
                                            </td>
                                            <td>
                                                {{ $keanggotaan->nama_fungsi }}
                                            </td>
                                            <td>
                                                {{ $keanggotaan->bb_l }}
                                            </td>
                                            <td>
                                                {{ $keanggotaan->bt_l }}
                                            </td>
                                            <td>
                                                {{ $keanggotaan->ba_l }}
                                            </td>
                                            <td>
                                                {{ $keanggotaan->bb_p }}
                                            </td>
                                            <td>
                                                {{ $keanggotaan->bt_p }}
                                            </td>
                                            <td>
                                                {{ $keanggotaan->ba_p }}
                                            </td>
                                            {{-- <td>
                                                <div class="d-flex justify-content">
                                                    <a href='{{ route('keanggotaan.edit', $keanggotaan->id) }}'
                                                        class="btn btn-sm btn-info btn-icon">
                                                        <i class="fas fa-edit"></i>
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('keanggotaan.destroy', $keanggotaan->id) }}"
                                                        method="POST" class="ml-2">
                                                        <input type="hidden" name="_method" value="DELETE" />
                                                        <input type="hidden" name="_token"
                                                            value="{{ csrf_token() }}" />
                                                        <button class="btn btn-sm btn-danger btn-icon confirm-delete"
                                                            onclick="return confirm('Hapus data?')">
                                                            <i class="fas fa-times"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endforeach


                                </table>
                            </div>

                            <div class="float-right">
                                {{-- {{ $keanggotaans->withQueryString()->links() }} --}}
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
