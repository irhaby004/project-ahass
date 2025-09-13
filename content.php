<style>
    .icon {
        transition: all .3s linear;
        position: absolute;
        top: -10px;
        right: 10px;
        z-index: 0;
        font-size: 90px;
        color: rgba(0, 0, 0, 0.15);
    }
</style>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
        <p>
                <div class="alert alert-primary" role="alert" style="width:100%;">
                <h3> Selamat Datang </h3><h6><br>Di Sistem Pemasaran Ikan menggunakan Metode AHP & Promethee</h6>
                </div>
              </p>
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
               
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <h3><?=$a[0]?> <br>&ensp;</h3>
                            <p style="font-size: 18px">Data Alternatif</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-building"></i>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="alternatif.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <h3><?=$b[0]?> <br>&ensp;</h3>
                            <p style="font-size: 18px">Nilai Tertinggi</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-chart-pie"></i>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="hasil.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <h3><?=$c[0]?> <br>&ensp;</h3>
                            <p style="font-size: 18px">Nilai Terendah</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-palette"></i>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="hasil.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <h3>Kode Boat <br><?=$d['kode']?></h3>
                            <p style="font-size: 18px">Rangking Teratas</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-signature"></i>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="hasil.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>