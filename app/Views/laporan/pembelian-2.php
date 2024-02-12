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
                        <input type="text" class="form-control float-right" name="tanggal" id="tanggal" value="<?= isset($filter['tanggal']) ? $filter['tanggal'] : '' ?>">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="col-12 col-md-2">
                    <!-- button print -->
                    <a href="<?= base_url('laporan/pembelian/print') . '?' . $_SERVER['QUERY_STRING'] ?>" target="_blank" class="btn btn-primary btn-block"><i class="fas fa-print"></i> Print</a>
                </div>
            </div>

            <div class="table-responsive">
                <?php $totalItem = 0;
                $totalUang = 0 ?>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>No. Inv</th>
                            <th>Barang</th>
                            <th>Jumlah Beli</th>
                            <th>Harga Satuan</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($pembelianBulanan as $item) : ?>
                            <?php $totalItem += $item->jml_beli ?>
                            <?php $totalUang += $item->total ?>
                            <!-- <tr style="background-color: #f3f3f3;">
                                <td colspan="2">
                                    <strong>No. Faktur : </strong> <code><?= $item->kode ?></code>
                                </td>
                                <td colspan='3'>
                                    <strong>Oleh :</strong> <?= $item->kasir ?>
                                </td>
                            </tr> -->
                            <!-- <tr style="background-color: #f3f3f3;">
                                <td style="width:190px;">Tanggal</td>
                                <td style="width:350px;">Barang</td>
                                <td>Harga Satuan</td>
                                <td style="width:150px;">Jumlah Beli</td>
                                <td style="width:150px;">Total</td>
                            </tr> -->
                            <tr class="">
                                <td><?= $no++ ?></td>
                                <td><?= mediumdate_indo(date('Y-m-d', strtotime($item->created_at))) ?></td>
                                <td><code><?= $item->kode ?></code></td>
                                <td><?= $item->barang ?></td>
                                <td><?= $item->jml_beli ?></td>
                                <td>Rp. <?= rupiah($item->harga) ?></td>
                                <td>Rp. <?= rupiah($item->total) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot class="bg-warning">
                        <tr>
                            <td colspan="4" class="text-right">
                                <strong>Total Pembelian : </strong>
                            </td>
                            <td>
                                <strong><?= $totalItem ?> Item</strong>
                            </td>
                            <td colspan='' class="text-right">
                                <strong>Total : </strong>
                            </td>
                            <td>
                                <strong>Rp. <?= rupiah($totalUang) ?></strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <!-- <table class="table table-bordered">
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
                </table> -->
            </div>
        </div>
    </div>
</div>

<?php $this->endsection(); ?>

<?= $this->section('header'); ?>
<link rel="stylesheet" href="<?= base_url('/plugins/daterangepicker/daterangepicker.css') ?>">
<?= $this->endSection(); ?>


<?= $this->section('js'); ?>
<script src="<?= base_url('/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#tanggal').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY'
            }
        })
    })
</script>
<?php $this->endsection(); ?>