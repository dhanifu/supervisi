<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    @role('admin')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
    @endrole
    @role('kepalasekolah')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('kepalasekolah.home') }}">
    @endrole
    @role('kurikulum')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('kurikulum.home') }}">>
    @endrole
    @role('guru')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('guru.home') }}">>
    @endrole
    @role('supervisor')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('supervisor.home') }}">>
    @endrole
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Supervise<sup>WK</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        @role('admin')
            <a class="nav-link" href="{{ route('admin.home') }}">
        @endrole
        @role('kepalasekolah')
            <a class="nav-link" href="{{ route('kepalasekolah.home') }}">
        @endrole
        @role('kurikulum')
            <a class="nav-link" href="{{ route('kurikulum.home') }}">
        @endrole
        @role('guru')
            <a class="nav-link" href="{{ route('guru.home') }}">
        @endrole
        @role('supervisor')
            <a class="nav-link" href="{{ route('supervisor.home') }}">
        @endrole
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    @role('admin')
    saya admin

    @elserole('kepalasekolah')
    saya kepalasekolah

    @elserool('kurikulum')
    Saya kurikulum
    
    @elserole('guru')
    <div class="sidebar-heading">
        File
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('guru.rpp.index') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Upload RPP</span>
        </a>
    </li>

    @elserole('supervisor')
    <div class="sidebar-heading">
        File RPP Guru
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('supervisor.rpp.menilai') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Penilaian RPP</span>
        </a>
    </li>
    @endrole

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
