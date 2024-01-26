<?php $this->extend('layout/print'); ?>
<?php $this->section('content'); ?>

<div class="p-2" style="font-size:13px !important;">

    <h5 class="text-center pb-0 mb-0">Laporan Pembelian Bahan</h5>
    <h4 class="text-center pb-0 mb-0"><u>RESTORAN LEGITA</u></h4>
    <h6 class="text-center">Bulan <?= $filter['tanggal'] ? date('F Y', strtotime($filter['tanggal'])) : date('M Y') ?></h6>

    <div class="my-3 mt-4" style="text-align: justify !important; text-justify: inter-word;">
        <span>
            Berdasarkan data pembelian barang / bahan pada bulan <strong><?= $filter['tanggal'] ? date('F Y', strtotime($filter['tanggal'])) : date('M Y') ?></strong>, berikut ini adalah rinciannya :
        </span>
    </div>

    <!-- avoid break -->
    <table class="table table-bordered table-sm" style="page-break-inside: avoid;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>No. Inv</th>
                <th>Barang</th>
                <th>Jml</th>
                <th>Satuan</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
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
                    <td><?= $no++ ?></td>
                    <td>
                        <span style="white-space: nowrap;"><?= date('D, d M Y', strtotime($item->created_at)) ?></span>
                    </td>
                    <td><code><?= $item->kode ?></code></td>
                    <td><?= $item->barang ?></td>
                    <td><?= $item->jml_beli ?></td>
                    <td style="white-space: nowrap;">Rp. <?= rupiah($item->harga) ?></td>
                    <td style="white-space: nowrap;">Rp. <?= rupiah($item->total) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot class="bg-warning">
            <tr>
                <td colspan="4" class="text-right">
                    <strong>Total Pembelian : </strong>
                </td>
                <td>
                    <div style="white-space: nowrap;"><?= $totalItem ?> Item</div>
                </td>
                <td colspan='' class="text-right">
                    <strong>Total : </strong>
                </td>
                <td>
                    <div style="white-space: nowrap;">Rp. <?= rupiah($totalUang) ?></div>
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

    <!-- avoid break -->
    <div class="my-3 mt-4" style="text-align: right; text-justify: inter-word; page-break-inside: avoid;">
        <!-- <span style="font-size: 11px !important;" class="pb-0 mb-0">
            * Dokumen ini dibuat secara otomatis oleh sistem pada tanggal <?= date('d M Y') ?>. <br />
        </span> -->
        <table class="table table-borderless" width="100%">
            <tr></tr>
            <tr></tr>
            <tr>
                <td class="text-center">
                    <p>dibuat oleh</p>
                    <br />
                    <br />
                    <br />
                    <br />
                    <p>
                        (........................................)
                        <!-- <br>
                        <span class="text-center">
                            <?= '' // $pembelianBulanan['0']->kasir ?>
                        </span> -->
                    </p>
                </td>
                <td class="text-center">
                    <strong>Pemalang, <?= $filter['tanggal'] ? date('t F Y', strtotime($filter['tanggal'])) : date('t F Y') ?></strong>
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