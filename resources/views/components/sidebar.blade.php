<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            {{-- <a href="#">Skripsi POS-DG</a> --}}
            <a href="{{ route('home') }}">Skripsi POS-DG</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                {{-- <a href="#" class="nav-link"><i class="fas fa-th-large"></i><span>Dashboard</span></a> --}}
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-th-large"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Data</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Pengguna</span></a>
                <ul class="dropdown-menu">
                    <li>
                        {{-- <a class="nav-link" href="#">Bidan</a> --}}
                        <a class="nav-link" href="{{ route('bidan.index') }}">Bidan</a>
                    </li>
                    <li>
                        {{-- <a class="nav-link" href="#">Orang Tua</a> --}}
                        <a class="nav-link" href="{{ route('orangtua.index') }}">Orang Tua</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-file-alt"></i><span>Lain-lain</span></a>
                <ul class="dropdown-menu">
                    <li>
                        {{-- <a class="nav-link" href="#">Posyandu</a> --}}
                        <a class="nav-link" href="{{ route('posyandu.index') }}">Posyandu</a>
                    </li>
                    <li>
                        {{-- <a class="nav-link" href="#">Jadwal Pemeriksaan</a> --}}
                        <a class="nav-link" href="{{ route('balita.index') }}">Balita</a>
                    </li>
                    <li>
                        <a class="nav-link" href={{ route('jadwal.index') }}>Jadwal Pemeriksaan</a>
                        {{-- <a class="nav-link" href="{{ route('orangtua.index') }}">Orang Tua</a> --}}
                    </li>
                </ul>
            </li>
        </ul>
        </li>
        </ul>
    </aside>
</div>
