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
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Pemasok</th>
                            <th>Total</th>
                            <th>Oleh</th>
                            <th class="text-right">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($history as $k => $h) : ?>
                            <tr>
                                <td><?= $k + 1 ?></td>
                                <td><?= $h->tipe ?></td>
                                <td><?= $h->barang ?></td>
                                <td><?= $h->jumlah ?></td>
                                <td>Rp. <?= rupiah($h->harga) ?></td>
                                <td><?= $h->nama_pemasok ?></td>
                                <td>Rp. <?= rupiah($h->total) ?></td>
                                <td><?= $h->nama ?></td>
                                <td class="text-right">
                                    <?= date('D, d M Y', strtotime($h->created_at)) ?> <br>
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
        $('#table-unit').DataTable({
            "order": [
                [8, "desc"]
            ]
        });
    });
</script>
<?php $this->endSection(); ?>