<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <span class="btn bg-primary btn-icon-split" style="cursor: default">
        <span class="text text-white shadow-sm"> Jumlah RPP</span>
        <span class="icon text-white-50">
            {{ $total }}
        </span>
    </span>
</div>


<div class="row">

    <!-- Total Data Disetujui -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <a href="{{ route('kepalasekolah.rpp.disetujui') }}" style="text-decoration: none">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Disetujui <span
                                    class="text-primary"> &rarr;</span></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $disetujui }}</div>
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
                <a href="{{ route('kepalasekolah.rpp.tidakdisetujui') }}" style="text-decoration: none">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Tidak Disetujui <span
                                    class="text-primary"> &rarr;</span></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tak_disetujui }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Total data yang belum disetujui -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <a href="{{ route('kepalasekolah.rpp.belum-disetujui') }}" style="text-decoration: none">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Belum Disetujui</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $belum_disetujui }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-minus-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Total data yang belum dinilai & disetujui -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <a href="{{ route('kepalasekolah.rpp.belumdinilai') }}" style="text-decoration: none">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Belum Dinilai <span
                                    class="text-primary"> &rarr;</span></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $belum_dinilai }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-minus-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Disetujui
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Tidak Disetujui
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i> Belum Disetujui
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Belum Dinilai
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Hallo, {{ Auth::user()->name }}
                </h6>
            </div>
            <div class="card-body">
                &nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa voluptatem eveniet commodi a fugit
                molestiae facere nostrum, quaerat assumenda ullam maxime atque dolore animi quibusdam quo. Impedit ex
                veniam molestias.
                Nesciunt amet quae ea aperiam architecto! Magni ullam dolores dolorum, quibusdam sit aliquam. Vitae,
                autem quo? Distinctio deserunt impedit laborum exercitationem quas?
                Numquam explicabo consectetur maiores. Magni, quibusdam harum cum at provident dolorem ullam quas et?
                Qui, architecto. Tempore mollitia dolor veniam atque sunt?
                Debitis odio vero aperiam, ullam atque itaque natus quas enim harum? Nam rem id distinctio eaque
                consectetur quasi, tempore reiciendis sapiente vel.
                Autem, quidem. Dolore facere maiores enim eveniet illum ullam. Itaque quod, magni beatae, est voluptates
                perferendis repellendus tempore eveniet suscipit similique iure.
            </div>
        </div>
    </div>

</div>

@section('js')
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito',
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Disetujui", "Tidak Disetujui", "Belum Disetujui", 'Belum Dinilai'],
            datasets: [{
                data: [{{$disetujui}}, {{$tak_disetujui}}, {{$belum_disetujui}}, {{$belum_dinilai}}],
                backgroundColor: ['#1cc88a', '#e74a3b', '#f6c23e', '#36b9cc'],
                hoverBackgroundColor: ['#17a673', '#e02d1b', '#f4b619', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {display: false},
            cutoutPercentage: 80,
        },
    });

</script>
@endsection
