<?php $this->extend('layout/print'); ?>
<?php $this->section('content'); ?>

<div class="p-2" style="font-size:13px !important;">

    <h5 class="text-center pb-0 mb-0">Laporan Pembelian Bahan</h5>
    <h4 class="text-center pb-0 mb-0"><u>RESTORAN LEGITA</u></h4>
    <h6 class="text-center">Bulan <?= $filter['tanggal'] ? date('F Y', strtotime($filter['tanggal'])) : date('M Y') ?></h6>

    <div class="my-3 mt-4" style="text-align: justify !important; text-justify: inter-word;">
        <span class="ml-5">
            Berdasarkan history pembelian barang / bahan pada bulan <strong><?= $filter['tanggal'] ? date('F Y', strtotime($filter['tanggal'])) : date('M Y') ?></strong>, diperoleh total pembelian sebesar <strong><?= $totalItem ?> Item</strong> dengan total uang sebesar <strong>Rp. <?= rupiah($totalUang) ?></strong>. Berikut adalah rincian pembelian barang / bahan pada bulan <?= $filter['tanggal'] ? date('F Y', strtotime($filter['tanggal'])) : date('M Y') ?> :
        </span>
    </div>

    <!-- avoid break -->
    <table class="table table-bordered table-sm" style="page-break-inside: avoid;">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>No. Inv</th>
                <th>Barang</th>
                <th>Satuan</th>
                <th>Jml</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pembelianBulanan as $item) : ?>
                <!-- <tr style="background-color: #f3f3f3;">
                    <td colspan="2">
                        <strong>No. Faktur : </strong> <code><?= $item->kode ?></code>
                    </td>
                    <td colspan='3'>
                        <strong>Oleh :</strong> <?= $item->kasir ?>
                    </td>
                </tr> -->

                <tr class="">
                    <td>
                        <?= date('D, d M Y', strtotime($item->created_at)) ?> 
                        <!-- <br> <?= date('H:i:s', strtotime($item->created_at)) ?> -->
                    </td>
                    <td><code><?= $item->kode ?></code></td>
                    <td><?= $item->barang ?></td>
                    <td>Rp. <?= rupiah($item->harga) ?></td>
                    <td><?= $item->jml_beli ?></td>
                    <td>Rp. <?= rupiah($item->total) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
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

    <!-- avoid break -->
    <div class="my-3 mt-4" style="text-align: right; text-justify: inter-word; page-break-inside: avoid;">
        <span style="font-size: 11px !important;" class="pb-0 mb-0">
            * Dokumen ini dibuat secara otomatis oleh sistem pada tanggal <?= date('d M Y') ?>. <br />
        </span>
        <table class="table table-borderless" width="100%">
            <tr></tr>
            <tr></tr>
            <tr>
                <td width="50%"></td>
                <td class="text-center">
                    <p>Mengetahui</p>
                    <br />
                    <br />
                    <br />
                    <p>
                        (........................................)
                        <br>
                        <span class="text-center">
                            Pemilik Restoran Legita
                        </span>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</div>

<?php $this->endsection(); ?>