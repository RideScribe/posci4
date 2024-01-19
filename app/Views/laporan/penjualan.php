<?php $this->extend('layout/template'); ?>
<?php $this->section('content'); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="pesan" data-pesan="<?= session('pesan') ?>"></div>

            <div class="row">
                <div class="col-12 col-md-11">
                    <!-- Filter -->
                    <form action="" method="get" class="mb-3 d-flex flex-column flex-md-row justify-content-center align-items-center" style="gap: 5px;">
                        <input type="month" name="tanggal" id="tanggal" class="form-control" value="<?= isset($filter['tanggal']) ? $filter['tanggal'] : '' ?>">
                        <select name="status" id="status" class="form-control custom-select" value="<?= isset($filter['tanggal']) ? $filter['status'] : '' ?>">
                            <option value="">-- Status --</option>
                            <option <?= (isset($filter['status']) ? $filter['status'] : '') == 1 ? 'selected' : '' ?> value="1">Lunas</option>
                            <option <?= (isset($filter['status']) ? $filter['status'] : '') == 0 ? 'selected' : '' ?> value="0">Belum Lunas</option>
                        </select>

                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="col-12 col-md-1">
                    <!-- button print -->
                    <a href="<?= base_url('laporan/penjualan/print') . '?' . $_SERVER['QUERY_STRING'] ?>" target="_blank" class="btn btn-primary btn-block"><i class="fas fa-print"></i> Print</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table" id="tabel-invoice" width="100%">
                    <thead>
                        <tr style="background-color: #dfdfdf;">
                            <!-- <th class="<?= empty($data) ? '' : 'd-none' ?>">#</th> -->
                            <th class="<?= empty($data) ? '' : 'd-' ?>">Tanggal</th>
                            <th class="<?= empty($data) ? '' : 'd-' ?>">Invoice</th>
                            <th class="<?= empty($data) ? '' : 'd-' ?>">Pelanggan</th>
                            <!-- <th class="<?= empty($data) ? '' : 'd-none' ?>">Tunai</th> -->
                            <!-- <th class="<?= empty($data) ? '' : 'd-none' ?>">Diskon</th> -->
                            <!-- <th class="<?= empty($data) ? '' : 'd-none' ?>">Kembalian</th> -->
                            <!-- <th class="<?= empty($data) ? '' : 'd-none' ?>">Status</th> -->
                            <!-- <th class="<?= empty($data) ? '' : 'd-none' ?>">kasir</th> -->
                            <th class="<?= empty($data) ? '' : 'd-' ?>">Data Pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($data)) : ?>
                            <tr>
                                <td colspan="3" class="text-center">Belum ada data penjulalan hari ini</td>
                            </tr>
                        <?php endif ?>

                        <?php $no = 1;
                        $totalPendapatan = 0 ?>
                        <?php foreach ($data as $item) : ?>
                            <!-- light gray -->
                            <tr>
                                <!-- <td><?= $no++ ?></td> -->
                                <td style=""><?= date('D, d M Y', strtotime($item['tanggal'])) ?></td>
                                <td style=""><?= $item['invoice'] ?></td>
                                <td style=""><?= $item['pelanggan'] ?></td>
                                <!-- <td><strong>Tunai :</strong> Rp. <?= rupiah($item['tunai'] ?  $item['tunai'] : 0) ?></td> -->
                                <!-- <td><strong>Diskon: </strong> <?= $item['diskon'] ?></td> -->
                                <!-- <td><strong>Kembalian :</strong> Rp. <?= rupiah($item['kembalian'] ?  $item['kembalian'] : 0) ?></td> -->
                                <!-- <td><strong>Status :</strong> <?= $item['tunai'] && $item['tunai'] != 0 ? '<span class="badge badge-success">Lunas</span>' : '<span class="badge badge-warning">Belum Lunas</span>' ?></td> -->
                                <!-- <td><strong>Kasir :</strong> <?= $item['kasir'] ?></td> -->
                                <td class="p-0 m-0">
                                    <table class="table table-bordered table-striped table-compact table-sm" width="100%">
                                        <thead>
                                            <tr style="background-color: #dfdfdf;">
                                                <th>No.</th>
                                                <!-- <th>Tgl</th> -->
                                                <!-- <th>No.Inv</th> -->
                                                <!-- <th>Pelanggan</th> -->
                                                <th style="width: 380px;">Nama Item</th>
                                                <th class="text-nowrap">Harga Item</th>
                                                <th class="text-nowrap">Diskon Item</th>
                                                <th class="text-nowrap">Jml Item</th>
                                                <th style="width: 200px;;">Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $noItem = 1; ?>
                                            <?php if ($item['tunai'] && $item['tunai'] != 0) : ?>
                                                <?php $totalPendapatan += $item['total_akhir'] ?>
                                            <?php endif ?>

                                            <?php foreach ($transaksi[$item['id']] as $t) : ?>
                                                <tr>
                                                    <td><?= $noItem++ ?></td>
                                                    <!-- <td><?= date('d M Y', strtotime($item['tanggal'])) ?></td> -->
                                                    <!-- <td><?= $item['invoice'] ?></td> -->
                                                    <!-- <td><?= $item['pelanggan'] ?></td> -->
                                                    <td><?= $t['nama_item'] ?></td>
                                                    <td class="text-nowrap">Rp. <?= rupiah($t['harga_item']) ?></td>
                                                    <td><?= $t['diskon_item'] ?>%</td>
                                                    <td><?= $t['jumlah_item'] ?></td>
                                                    <td>Rp. <?= rupiah($t['subtotal']) ?></td>
                                                </tr>
                                            <?php endforeach ?>

                                            <!-- <tr>
                                                <td colspan="6" class="text-right"><strong>Diskon</strong></td>
                                                <td><strong><?= $item['diskon'] ?> %</strong></td>
                                            </tr> -->
                                            <tr>
                                                <td colspan="5" class="text-right"><strong>Total</strong></td>
                                                <td>
                                                    <?php if ($item['diskon'] && $item['diskon'] != 0) : ?>
                                                        <s><strong>Rp. <?= rupiah($item['total_harga']) ?></strong></s>
                                                        <strong class="ml-2">Rp. <?= rupiah($item['total_akhir']) ?></strong>
                                                    <?php else : ?>
                                                        <strong>Rp. <?= rupiah($item['total_akhir']) ?></strong>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td colspan="5" class="text-right"><strong>Kembalian</strong></td>
                                                <td><strong>Rp. <?= rupiah($item['kembalian'] ? $item['kembalian'] : 0) ?></strong></td>
                                            </tr> -->

                                            <!-- <tr>
                                                <td colspan="5" class="text-right"><strong>Diskon</strong></td>
                                                <td><strong><?= $item['diskon'] ?> %</strong></td>
                                            </tr>
                                            <?php if ($item['diskon'] && $item['diskon'] != 0) : ?>
                                                <tr>
                                                    <td colspan="5" class="text-right"><strong>Total akhir</strong></td>
                                                    <td><strong>Rp. <?= rupiah($item['total_akhir']) ?></strong></td>
                                                </tr>
                                            <?php endif ?>
                                            <tr>
                                                <td colspan="5" class="text-right"><strong>Tunai</strong></td>
                                                <td><strong>Rp. <?= rupiah($item['tunai'] ? $item['tunai'] : 0) ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right"><strong>Kembalian</strong></td>
                                                <td><strong>Rp. <?= rupiah($item['kembalian'] ? $item['kembalian'] : 0) ?></strong></td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>

                    <tfoot class="bg-success">
                        <tr>
                            <td colspan="4" class="text-center">
                                <strong>Total Pendapatan</strong>
                                <strong>: Rp. <?= rupiah($totalPendapatan) ?></strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js'); ?>
<script>
    $(document).ready(function() {

    })
</script>
<?php $this->endsection(); ?>

<?php $this->endsection(); ?>