<ul class="navbar-nav tema-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fab fa-neos"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ngekos.id</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-home"></i>
            <span>Home</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-user-cog"></i>
            <span>Admin</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user') }}">
            <i class="fas fa-users"></i>
            <span>User</i></span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('pemilik') }}">
            <i class="fas fa-user-plus"></i>
            <span>Pemilik</i></span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('role') }}">
            <i class="fas fa-cogs"></i>
            <span>Role</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('alternatif_kos') }}">
            <i class="fas fa-bed"></i>
            <span>Alternatif Kos</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('kriteria') }}">
            <i class="fas fa-tag"></i>
            <span>Kriteria</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('sub_kriteria') }}">
            <i class="fas fa-tags"></i>
            <span>Sub Kriteria</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('penilaian') }}">
            <i class="fas fa-chart-pie"></i>
            <span>Penilaian</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('hasil') }}">
            <i class="fas fa-chart-line"></i>
            <span>Hasil Perhitungan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
</ul>