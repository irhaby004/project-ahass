<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-secondary">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">PEMASARAN IKAN</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <?php if ($_SESSION["status"] == 'Admin') { ?>
                            <a class="<?php if ($page == "dashboard") {
                                            echo 'active';
                                        } ?> nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Master Data</div>
                            <a class="<?php if ($page == "alternatif") {
                                            echo 'active';
                                        } ?> nav-link" href="alternatif.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                Alternatif
                            </a>
                            <a class="<?php if ($page == "kriteria") {
                                            echo 'active';
                                        } ?> nav-link" href="kriteria.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-pie"></i></div>
                                Kriteria
                            </a>
                            <a class="<?php if ($page == "subkriteria") {
                                            echo 'active';
                                        } ?> nav-link" href="subkriteria.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-palette"></i></div>
                                Sub Kriteria
                            </a>
                            <a class="<?php if ($page == "penilaian") {
                                            echo 'active';
                                        } ?> nav-link" href="penilaian.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-signature"></i></div>
                                Penilaian
                            </a>
                            <a class="<?php if ($page == "perhitungan") {
                                            echo 'active';
                                        } ?> nav-link" href="perhitungan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i></div>
                                Perhitungan
                            </a>
                            <a class="<?php if ($page == "hasil") {
                                            echo 'active';
                                        } ?> nav-link" href="hasil.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Hasil
                            </a>
                            <div class="sb-sidenav-menu-heading">Data Users</div>
                            <a class="<?php if ($page == "users") {
                                            echo 'active';
                                        } ?> nav-link" href="users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Users
                            </a>
                        <?php } else { ?>
                            <a class="<?php if ($page == "penilaian") {
                                            echo 'active';
                                        } ?> nav-link" href="penilaian.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-signature"></i></div>
                                Penilaian
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </div>