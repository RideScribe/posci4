<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12 col-md-6">
        <form action="" method="get" class="d-flex mb-3">
            <input type="month" name="bulan" id="bulan" class="form-control" value="<?= $filter['bulan'] ?>">
            <button type="submit" class="btn btn-primary ml-2">Filter</button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="small-box bg-gradient-green">
            <div class="inner">
                <h3>Rp. <?= rupiah($pembelianBulanan->total ? $pembelianBulanan->total : 0) ?>,-</h3>
                <p><strong><u>Bulan Ini</u></strong> <br> <small>Terakhir Diupdate <strong><?= $pembelianBulanan->updated_at? date('D, d M Y H:i:s', strtotime($pembelianBulanan->updated_at)) : '-' ?></strong></small></p>
            </div>
            <div class="icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <?php foreach ($pembelianBulananGrouped as $k => $pbg) : ?>
                    <!-- border bottom only -->
                    <div class="p-1 mb-2" style="border: 2px solid #ddd;">
                        <a class="px-2 bg-success font-weight-bolder" data-toggle="collapse" href="#<?= date("DYmd", strtotime($pbg->created_at)) ?>" role="button" aria-expanded="false" aria-controls="<?= date("DYmd", strtotime($pbg->created_at)) ?>">
                            <?= date('d M Y', strtotime($pbg->created_at)) ?>
                        </a>
                        <div class="collapse mt-1" id="<?= date("DYmd", strtotime($pbg->created_at)) ?>">
                            <div class="card-body p-2">
                                <?php $br = $transaksiBarang->pembelianBulananDetail(date("Y-m-d", strtotime($pbg->created_at)))->findAll() ?>
                                <?php foreach ($br as $b) : ?>
                                    <table class="table table-sm table-bordered mb-3">
                                        <tr>
                                            <th style="width:150px;">Nama barang</th>
                                            <td>: <?= $b->barang ?></td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah</th>
                                            <td>: <?= $b->jumlah ?> <code>( <?= $b->nama_pemasok ?> )</code></td>
                                        </tr>
                                        <tr>
                                            <th>Harga</th>
                                            <td>: Rp. <?= rupiah($b->harga) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td>: Rp. <?= rupiah($b->total) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Olehh</th>
                                            <td>: <?= $b->nama ?></td>
                                        </tr>
                                    </table>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="small-box bg-gradient-yellow">
            <div class="inner">
                <h3>Rp. <?= rupiah($pembelianTahunan->total ? $pembelianTahunan->total : 0) ?>,-</h3>
                <p><strong><u>Tahun Ini</u></strong> <br> <small class="text-dark">Terakhir Diupdate <strong><?= $pembelianTahunan->updated_at? date('D, d M Y H:i:s', strtotime($pembelianTahunan->updated_at)) : '-' ?></strong></small></p>
            </div>
            <div class="icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <?php foreach ($pembelianTahunanGrouped as $k => $pbg) : ?>
                    <!-- border bottom only -->
                    <div class="p-1 mb-2" style="border: 2px solid #ddd;">
                        <a class="px-2 bg-yellow font-weight-bolder" data-toggle="collapse" href="#<?= date("MYmd", strtotime($pbg->created_at)) ?>" role="button" aria-expanded="false" aria-controls="<?= date("MYmd", strtotime($pbg->created_at)) ?>">
                            <?= date('M Y', strtotime($pbg->created_at)) ?>
                        </a>
                        <div class="collapse mt-1" id="<?= date("MYmd", strtotime($pbg->created_at)) ?>">
                            <div class="card-body p-2">
                                <?php foreach ($pembelianTahunanDetail as $b) : ?>
                                    <table class="table table-sm table-bordered mb-3">
                                        <tr>
                                            <th style="width:150px;">Nama barang</th>
                                            <td>: <?= $b->barang ?></td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah</th>
                                            <td>: <?= $b->jumlah ?> <code>( <?= $b->nama_pemasok ?> )</code></td>
                                        </tr>
                                        <tr>
                                            <th>Harga</th>
                                            <td>: Rp. <?= rupiah($b->harga) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td>: Rp. <?= rupiah($b->total) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Olehh</th>
                                            <td>: <?= $b->nama ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal</th>
                                            <td>: <?= date('d M Y H:i', strtotime($b->created_at)) ?></td>
                                        </tr>
                                    </table>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>