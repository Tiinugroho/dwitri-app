<?php
include("koneksi.php");

// Menghitung total ruang
$queryTotalRuang = "SELECT COUNT(*) as totalRuang FROM dataruang";
$resultTotalRuang = mysqli_query($koneksi, $queryTotalRuang);
$totalRuangData = mysqli_fetch_assoc($resultTotalRuang);
$totalRuang = $totalRuangData['totalRuang'];

// Menghitung total pimpinan
$queryTotalPimpinan = "SELECT COUNT(DISTINCT nama_pimpinan) as totalPimpinan FROM agenda_pimpinan";
$resultTotalPimpinan = mysqli_query($koneksi, $queryTotalPimpinan);
$totalPimpinanData = mysqli_fetch_assoc($resultTotalPimpinan);
$totalPimpinan = $totalPimpinanData['totalPimpinan'];

// Menghitung total data
$queryTotalData = "SELECT COUNT(*) as totalData FROM dataruang";
$resultTotalData = mysqli_query($koneksi, $queryTotalData);
$totalDataData = mysqli_fetch_assoc($resultTotalData);
$totalData = $totalDataData['totalData'];

// Menghitung total Umum
$queryTotalUmum = "SELECT COUNT(DISTINCT nama_umum) as totalUmum FROM agenda_umum";
$resultTotalUmum = mysqli_query($koneksi, $queryTotalUmum);
$totalUmumData = mysqli_fetch_assoc($resultTotalUmum);
$totalUmum = $totalUmumData['totalUmum'];
?>

<!-- HTML untuk menampilkan total ruang -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Ruang
                    </div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalRuang; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-home fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- HTML untuk menampilkan total data -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Total Data</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalData; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-folder fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- HTML untuk menampilkan total pimpinan -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pimpinan
                    </div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalPimpinan; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- HTML untuk menampilkan total Umum -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Umum</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalUmum; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
