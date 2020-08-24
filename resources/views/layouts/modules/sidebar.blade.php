<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    @role('admin')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
    @elserole('kepalasekolah')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('kepalasekolah.home') }}">
    @elserole('kurikulum')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('kurikulum.home') }}">
    @elserole('guru')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('guru.home') }}">
    @elserole('supervisor')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('supervisor.home') }}">
    @endrole
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Supervise<sup>WK</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('active-dashboard')">
        @role('admin')
            <a class="nav-link" href="{{ route('admin.home') }}">
        
        @elserole('kepalasekolah')
            <a class="nav-link" href="{{ route('kepalasekolah.home') }}">
        
        @elserole('kurikulum')
            <a class="nav-link" href="{{ route('kurikulum.home') }}">
        
        @elserole('guru')
            <a class="nav-link" href="{{ route('guru.home') }}">
        
        @elserole('supervisor')
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
    <li class="nav-item @yield('active-admin-rpp')">
        <a class="nav-link" href="{{ route('admin.rpp.index') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>RPP</span>
        </a>
    </li>
    <li class="nav-item @yield('active-admin-supervisor')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#adminSupervisor" aria-expanded="true" aria-controls="adminSupervisor">
            <i class="fas fa-fw fa-user"></i>
            <span>Supervisor</span>
        </a>
        <div id="adminSupervisor" class="collapse @yield('show-admin-supervisor')" aria-labelledby="headingSupervisor" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Memilih & terpilih:</h6>
                <a class="collapse-item @yield('active-admin-nambah')" href="{{ route('admin.supervisor.index') }}">Calon Supervisor</a>
                <a class="collapse-item @yield('active-admin-terpilih')" href="{{ route('admin.supervisor.terpilih') }}">Terpilih</a>
            </div>
        </div>
    </li>

    @elserole('kepalasekolah')
    <li class="nav-item @yield('active-kepsek-lihat')">
        <a class="nav-link" href="{{ route('kepalasekolah.rpp.index') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Lihat RPP</span>
        </a>
    </li>

    @elserole('kurikulum')
    <li class="nav-item @yield('active-kurikulum-persetujuan')">
        <a class="nav-link" href="{{ route('kurikulum.persetujuan.index') }}">
            <i class="fas fa-fw fa-check-circle"></i>
            <span>Persetujuan</span>
        </a>
    </li>
    <li class="nav-item @yield('active-kurikulum-pilih')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pilihSupervisor" aria-expanded="true" aria-controls="pilihSupervisor">
            <i class="fas fa-fw fa-user"></i>
            <span>Supervisor</span>
        </a>
        <div id="pilihSupervisor" class="collapse @yield('show-kurikulum-pilih')" aria-labelledby="headingSupervisor" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Memilih & terpilih:</h6>
                <a class="collapse-item @yield('active-kurikulum-milih')" href="{{ route('kurikulum.pilih.index') }}">Memilih</a>
                <a class="collapse-item @yield('active-kurikulum-terpilih')" href="{{ route('kurikulum.pilih.terpilih') }}">Terpilih</a>
                <a class="collapse-item @yield('active-kurikulum-jadwal')" href="{{ route('kurikulum.jadwal.index') }}">Jadwal Supervisor</a>
            </div>
        </div>
    </li>
    
    @elserole('guru')
    <div class="sidebar-heading">
        File
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item @yield('active-guru-upload')">
        <a class="nav-link" href="{{ route('guru.rpp.index') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Upload RPP</span>
        </a>
    </li>

    @elserole('supervisor')

    <!-- Nav Item - Charts -->
    <li class="nav-item @yield('active-supervisor-jadwal')">
        <a class="nav-link" href="{{ route('supervisor.jadwal.index') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Jadwal</span>
        </a>
    </li>
    <li class="nav-item @yield('active-supervisor-menilai')">
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
