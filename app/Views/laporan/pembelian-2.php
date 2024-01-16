<?php $this->extend('layout/template'); ?>
<?php $this->section('content'); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="pesan" data-pesan="<?= session('pesan') ?>"></div>

            <div class="row">
                <div class="col-12 col-md-10">
                    <!-- Filter -->
                    <form action="" method="get" class="mb-3 d-flex flex-column flex-md-row justify-content-center align-items-center" style="gap: 5px;">
                        <input type="month" name="tanggal" id="tanggal" class="form-control" value="<?= isset($filter['tanggal']) ? $filter['tanggal'] : '' ?>">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="col-12 col-md-2">
                    <!-- button print -->
                    <a href="<?= base_url('laporan/pembelian/print') . '?' . $_SERVER['QUERY_STRING'] ?>" target="_blank" class="btn btn-primary btn-block"><i class="fas fa-print"></i> Print</a>
                </div>
            </div>

            <div class="table-responsive">
                <?php $totalItem = 0; $totalUang = 0 ?>
                <?php foreach ($pembelianBulanan as $item) : ?>
                    <?php $totalItem += $item->jml_beli ?>
                    <?php $totalUang += $item->total ?>
                    <table class="table table-bordered table-sm">
                        <tbody>
                            <tr style="background-color: #f3f3f3;">
                                <td colspan="2">
                                    <strong>No. Faktur : </strong> <code><?= $item->kode ?></code>
                                </td>
                                <td colspan='3'>
                                    <strong>Oleh :</strong> <?= $item->kasir ?>
                                </td>
                            </tr>
                            <tr style="background-color: #f3f3f3;">
                                <td style="width:200px;">Tanggal</td>
                                <td style="width:330px;">Barang</td>
                                <td>Harga Satuan</td>
                                <td style="width:80px;">Jumlah Beli</td>
                                <td>Total</td>
                            </tr>

                            <tr class="">
                                <td><?= date('d M Y H:i:s', strtotime($item->updated_at)) ?></td>
                                <td><?= $item->barang ?></td>
                                <td>Rp. <?= rupiah($item->harga) ?></td>
                                <td><?= $item->jml_beli ?></td>
                                <td>Rp. <?= rupiah($item->total) ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php endforeach ?>

                <table class="table table-bordered">
                    <tbody class="bg-warning">
                        <tr>
                            <td colspan="2">
                                <strong>Total Pembelian : </strong> <?= $totalItem ?> Item
                            </td>
                            <td colspan='3'>
                                <strong>Total : </strong> Rp. <?= rupiah($totalUang) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->endsection(); ?>