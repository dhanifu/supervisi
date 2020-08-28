<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <span class="btn bg-primary btn-icon-split" style="cursor: default">
        <span class="text text-white shadow-sm"> RPP yang telah anda upload</span>
        <span class="icon text-white-50">
            {{ $total_guru }}
        </span>
    </span>
</div>


<div class="row">
    
    <!-- Total data yang belum dinilai & disetujui -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <a href="{{ route('guru.rpp.belum-dinilai') }}" style="text-decoration: none">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Belum Dinilai <span
                                    class="text-primary"> &rarr;</span></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $belum_dinilai_guru }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-minus-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Total data yang belum disetujui -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <a href="{{ route('guru.rpp.belum-disetujui') }}" style="text-decoration: none">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Belum Disetujui <span
                                class="text-primary"> &rarr;</span></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $belum_disetujui_guru }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-minus-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Total Data Disetujui -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <a href="{{ route('guru.rpp.disetujui') }}" style="text-decoration: none">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Disetujui <span
                                    class="text-primary"> &rarr;</span></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $disetujui_guru }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Total data yang tidak disetujui -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <a href="{{ route('guru.rpp.tidak-disetujui') }}" style="text-decoration: none">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Tidak Disetujui <span
                                    class="text-primary"> &rarr;</span></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tak_disetujui_guru }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>



</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Hallo, {{ Auth::user()->name }}
                </h6>
            </div>
            <div class="card-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa voluptatem eveniet commodi a fugit
                molestiae facere nostrum, quaerat assumenda ullam maxime atque dolore animi quibusdam quo. Impedit ex
                veniam molestias.
                Nesciunt amet quae ea aperiam architecto! Magni ullam dolores dolorum, quibusdam sit aliquam. Vitae,
                autem quo? Distinctio deserunt impedit laborum exercitationem quas?
                Numquam explicabo consectetur maiores. Magni, quibusdam harum cum at provident dolorem ullam quas et?
                Qui, architecto. Tempore mollitia dolor veniam atque sunt?
                Debitis odio vero aperiam, ullam atque itaque natus quas enim harum? Nam rem id distinctio eaque
                consectetur quasi, tempore reiciendis sapiente vel.
                Autem, quidem. Dolore facere maiores enim eveniet illum ullam. Itaque quod, magni beatae, est voluptates
                perferendis repellendus tempore eveniet suscipit similique iure.</p>
            </div>
        </div>
    </div>
</div>