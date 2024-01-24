<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid" id="tahun-bulan" data-tahun-bulan="<?= $tahun ?? date('Y-m') ?>">
    <div id="pesan" data-pesan="<?= session()->getFlashdata('pesan') ?>"></div>

    <form action="" method="get" class="my-2">
        <!-- inpu tahun and tombol submit -->
        <div class="row">
            <div class="col-md-3">
                <input type="month" name="tahun" class="form-control" value="<?= $tahun ?? date('Y-m') ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Tampilkan</button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-lg-4 col-12">
            <!-- small card -->
            <div class="small-box bg-gradient-blue">
                <div class="inner">
                    <h3><?= esc($produk) ?></h3>
                    <p>Item Produk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cube"></i>
                </div>
                <a href="<?= base_url('item') ?>" class="small-box-footer">
                    Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <!-- <div class="col-lg-4 col-12">
            <div class="small-box bg-gradient-green">
                <div class="inner">
                    <h3><?= '' // esc($pemasok) 
                        ?></h3>
                    <p>Pemasok</p>
                </div>
                <div class="icon">
                    <i class="fas fa-truck"></i>
                </div>
                <a href="<?= '' //base_url('pemasok') 
                            ?>" class="small-box-footer">
                    Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div> -->
        <!-- ./col -->
        <div class="col-lg-4 col-12">
            <!-- small card -->
            <div class="small-box bg-gradient-purple">
                <div class="inner">
                    <h3><?= esc($pengguna) ?></h3>
                    <p>Pengguna</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="<?= base_url('user') ?>" class="small-box-footer">
                    Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-12">
            <div class="small-box bg-gradient-green">
                <div class="inner">
                    <h3><?= esc($invoice_hari_ini) ?></h3>
                    <p>Invoice Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-invoice"></i>
                </div>
                <a href="<?= base_url('penjualan/invoice') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="small-box bg-gradient-red">
                <div class="inner">
                    <h3>Rp. <?= number_format(esc($harian) ?? 0, 0, ',', '.') ?>,-</h3>
                    <p>Pendapatan Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="small-box bg-gradient-yellow">
                <div class="inner">
                    <h3>Rp. <?= number_format(esc($bulanan) ?? 0, 0, ',', '.') ?>,-</h3>
                    <p>Pendapatan <?= $tahun ? date('F Y', strtotime($tahun)) : date('F Y') ?></p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- /.row -->
    <div class="row">
        <!-- <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Total Pengunjung</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="position-relative mb-4">
                        <canvas id="laporan-pengunjung" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-12 col-md-12">
            <!-- Total pendapatan -->
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Total Pendapatan</h3>
                        <a href="/laporan/pendapatan">Lihat Detail Laporan Pendapatan</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="position-relative mb-4">
                        <canvas id="laporan-pendapatan" height="300"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div><!-- /.container-fluid -->
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="<?= base_url('plugins/chart.js/Chart.min.js') ?>"></script>
<script src="<?= base_url('js/dashboard.js') ?>"></script>
<?= $this->endSection(); ?>