<?php $this->extend('layout/template'); ?>
<?php $this->section('content'); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="pesan" data-pesan="<?= session('pesan') ?>"></div>

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

            <div class="table-responsive">
                <table class="table" id="tabel-invoice" width="100%">
                    <thead>
                        <tr>
                            <!-- <th class="<?= empty($data) ? '' : 'd-' ?>">#</th> -->
                            <th class="<?= empty($data) ? '' : 'd-none' ?>">Tanggal</th>
                            <th class="<?= empty($data) ? '' : 'd-none' ?>">Invoice</th>
                            <th class="<?= empty($data) ? '' : 'd-none' ?>">Pelanggan</th>
                            <!-- <th class="<?= empty($data) ? '' : 'd-none' ?>">Tunai</th>
                            <th class="<?= empty($data) ? '' : 'd-none' ?>">Diskon</th>
                            <th class="<?= empty($data) ? '' : 'd-none' ?>">Kembalian</th> -->
                            <th class="<?= empty($data) ? '' : 'd-none' ?>">Status</th>
                            <th class="<?= empty($data) ? '' : 'd-none' ?>">kasir</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (empty($data)) : ?>
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data penjulalan hari ini</td>
                            </tr>
                        <?php endif ?>

                        <?php $no = 1; ?>
                        <?php foreach ($data as $item) : ?>
                            <!-- light gray -->
                            <tr style="background-color: #dfdfdf;">
                                <!-- <td><?= $no++ ?></td> -->
                                <td><strong>Tanggal :</strong> <?= date('D, d M Y H:i:s', strtotime($item['tanggal'])) ?></td>
                                <td><strong>No. Invoice :</strong> <?= $item['invoice'] ?></td>
                                <td><strong>Pelanggan :</strong> <?= $item['pelanggan'] ?></td>
                                <!-- <td><strong>Tunai :</strong> Rp. <?= rupiah($item['tunai'] ?  $item['tunai'] : 0) ?></td>
                                <td><strong>Diskon: </strong> <?= $item['diskon'] ?></td>
                                <td><strong>Kembalian :</strong> Rp. <?= rupiah($item['kembalian'] ?  $item['kembalian'] : 0) ?></td> -->
                                <td><strong>Status :</strong> <?= $item['tunai'] && $item['tunai'] != 0 ? '<span class="badge badge-success">Lunas</span>' : '<span class="badge badge-warning">Belum Lunas</span>' ?></td>
                                <td><strong>Kasir :</strong> <?= $item['kasir'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="8" class="p-0 m-0">
                                    <table class="table table-bordered table-striped table-compact table-sm" width="100%">
                                        <thead style="background-color: #dfdfdf;">
                                            <tr>
                                                <th>No.</th>
                                                <th style="width: 380px;">Nama Item</th>
                                                <th class="text-nowrap">Harga Item</th>
                                                <th class="text-nowrap">Diskon Item</th>
                                                <th class="text-nowrap">Jml Item</th>
                                                <th style="width: 380px;;">Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $noItem = 1; ?>
                                            <?php foreach ($transaksi[$item['id']] as $t) : ?>
                                                <tr>
                                                    <td><?= $noItem++ ?></td>
                                                    <td><?= $t['nama_item'] ?></td>
                                                    <td class="text-nowrap">Rp. <?= rupiah($t['harga_item']) ?></td>
                                                    <td><?= $t['diskon_item'] ?>%</td>
                                                    <td><?= $t['jumlah_item'] ?></td>
                                                    <td>Rp. <?= rupiah($t['subtotal']) ?></td>
                                                </tr>
                                            <?php endforeach ?>

                                            <tr>
                                                <td colspan="5" class="text-right"><strong>Diskon</strong></td>
                                                <td><strong><?= $item['diskon'] ?> %</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right"><strong>Total</strong></td>
                                                <td>
                                                    <?php if ($item['diskon'] && $item['diskon'] != 0) : ?>
                                                        <s><strong>Rp. <?= rupiah($item['total_harga']) ?></strong></s>
                                                        <strong class="ml-2">Rp. <?= rupiah($item['total_akhir']) ?></strong>
                                                    <?php else : ?>
                                                        <strong>Rp. <?= rupiah($item['total_harga']) ?></strong>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right"><strong>Kembalian</strong></td>
                                                <td><strong>Rp. <?= rupiah($item['kembalian'] ? $item['kembalian'] : 0) ?></strong></td>
                                            </tr>

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