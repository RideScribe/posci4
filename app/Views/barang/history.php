<?php $this->extend('layout/template'); ?>
<?php $this->section('content'); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-striped" id="table-unit" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipe</th>
                            <th style="max-width:160px;">Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Oleh</th>
                            <th class="text-right">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($history as $k => $h) : ?>
                            <tr>
                                <td><?= $k + 1 ?></td>
                                <td>
                                    <?php if (strtolower($h->tipe) == 'masuk') : ?>
                                        <span class="badge badge-success">Masuk</span>
                                    <?php else : ?>
                                        <span class="badge badge-danger">Keluar</span>
                                    <?php endif ?>
                                </td>
                                <td><?= $h->barang ?></td>
                                <td><?= $h->jumlah ?? '-' ?></td>
                                <td>Rp. <?= rupiah($h->harga) ?></td>
                                <td>Rp. <?= rupiah($h->total) ?></td>
                                <td><?= $h->nama ?></td>
                                <td class="text-right">
                                    <?= shortdate_day_indo(date('Y-m-d', strtotime($h->created_at))) ?> <br>
                                    <small><?= date('H:i:s', strtotime($h->created_at)) ?></small>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    $(document).ready(function() {
        $('#table-unit').DataTable();
    });
</script>
<?php $this->endSection(); ?>