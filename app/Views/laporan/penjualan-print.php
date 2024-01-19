<?php $this->extend('layout/print'); ?>
<?php $this->section('content'); ?>

<?php
$strKondisi = "";
if ($persenUntung >= 0) {
    $strKondisi = "naik";
} else {
    $strKondisi = "turun";
}
?>

<div class="p-2" style="font-size:13px !important;">

    <h5 class="text-center pb-0 mb-0">Laporan Penjualan</h5>
    <h4 class="text-center pb-0 mb-0"><u>RESTORAN LEGITA</u></h4>
    <h6 class="text-center">Bulan <?= $filter['tanggal'] ? date('F Y', strtotime($filter['tanggal'])) : date('M Y') ?></h6>

    <!-- justify and make margin on first line -->
    <div class="my-3 mt-4" style="text-align: justify; text-justify: inter-word;">
        <span class="ml-5">Berdasarkan hasil penjualan pada bulan <strong><?= $filter['tanggal'] ? date('F Y', strtotime($filter['tanggal'])) : date('M Y') ?></strong>, diperoleh pendapatan sebesar <strong>Rp. <?= rupiah($totalPendapatan) ?></strong> dari <?= $totalItemTerjual ?> menu terjual. <strong><?= $strKondisi ?> <?= number_format($persenUntung, 2, '.', '.') ?>%</strong> dari bulan sebelumnya, yang mana jumlah pendapatan bulan sebelumnya (<?= date('F Y', strtotime('-1 month', strtotime($filter['tanggal'] ? $filter['tanggal'] : date('Y-m-d')))) ?>) sebesar Rp. <?= rupiah($totalPendapatanBulanLalu) ?>.
    </div>

    <div class="my-2">
        Berikut adalah rincian pendapatan pada bulan <?= $filter['tanggal'] ? date('F Y', strtotime($filter['tanggal'])) : date('M Y') ?> :</span>
    </div>

    <table class="table" id="tabel-invoice" width="100%">
        <thead>
            <tr style="background-color: #dfdfdf;">
                <th>Tgl</th>
                <th>Inv</th>
                <th>Pelanggan</th>
                <!-- <th>Pembayaran</th> -->
                <!-- <th>Diskon</th> -->
                <!-- <th>Kembalian</th> -->
                <!-- <th>Status</th> -->
                <!-- <th>Kasir</th> -->
                <th>Data Pembelian</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            $totalPendapatan = 0 ?>
            <?php foreach ($data as $item) : ?>
                <!-- light gray -->
                <tr>
                    <!-- <td><?= $no++ ?></td> -->
                    <td>
                        <?= date('d M Y', strtotime($item['updated_at'])) ?>
                    </td>
                    <td><?= $item['invoice'] ?></td>
                    <td><?= $item['pelanggan'] ?></td>
                    <!-- <td><strong>Tunai : <br /></strong> Rp. <?= rupiah($item['tunai'] ?  $item['tunai'] : 0) ?></td> -->
                    <!-- <td><strong>Diskon: </strong> <?= $item['diskon'] ?></td> -->
                    <!-- <td><strong>Kembalian : <br/></strong> Rp. <?= rupiah($item['kembalian'] ?  $item['kembalian'] : 0) ?></td> -->
                    <!-- <td><strong>Status : <br /></strong> <?= $item['tunai'] && $item['tunai'] != 0 ? '<span class="badge badge-success">Lunas</span>' : '<span class="badge badge-warning">Belum Lunas</span>' ?></td> -->
                    <!-- <td><strong>Kasir : <br /></strong> <?= $item['kasir'] ?></td> -->
                    <td class="m-0 p-0">
                        <table class="table table-bordered table-striped table-compact table-sm" width="100%">
                            <thead style="background-color: #dfdfdf;">
                                <tr>
                                    <th style="text-align:left;">No.</th>
                                    <!-- <th style="text-align:left;">Tgl</th> -->
                                    <!-- <th style="text-align:left;">No.Inv</th> -->
                                    <!-- <th style="text-align:left;">Pelanggan</th> -->
                                    <th style="text-align:left;" style="width:120px;">Menu</th>
                                    <th style="text-align:left;">Harga</th>
                                    <th style="text-align:left;">Disc</th>
                                    <th style="text-align:left;">Jml</th>
                                    <th style="text-align:left;" style="width:90px;">Sub Total</th>
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
                                        <!-- <td><span><?= $item['invoice'] ?></span></td> -->
                                        <!-- <td><?= $item['pelanggan'] ?></td> -->
                                        <td><?= $t['nama_item'] ?></td>
                                        <td class="text-nowrap">Rp. <?= rupiah($t['harga_item']) ?></td>
                                        <td><?= $t['diskon_item'] ?>%</td>
                                        <td><?= $t['jumlah_item'] ?></td>
                                        <td>Rp. <?= rupiah($t['subtotal']) ?></td>
                                    </tr>
                                <?php endforeach ?>

                                <!-- <tr>
                                    <td colspan="5" class="text-right"><strong>Diskon</strong></td>
                                    <td><strong><?= $item['diskon'] ?> %</strong></td>
                                </tr> -->
                                <tr>
                                    <td colspan="5" class="text-right"><strong>Total</strong></td>
                                    <td>
                                        <?php if ($item['diskon'] && $item['diskon'] != 0) : ?>
                                            <s><strong>Rp. <?= rupiah($item['total_harga']) ?></strong></s> <strong class="ml-2">( <?= $item['diskon'] ?> % )</strong> <br />
                                            <strong>Rp. <?= rupiah($item['total_akhir']) ?></strong>
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
                <td style="color:#fff;" colspan="4" class="text-center">
                    <strong>Total Pendapatan</strong>
                    <strong>: Rp. <?= rupiah($totalPendapatan) ?></strong>
                </td>
            </tr>
        </tfoot>
    </table>

    <div class="my-3 mt-4" style="text-align: right; text-justify: inter-word;">
        <span style="font-size: 11px !important;">
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

<?= $this->section('js'); ?>
<script>
    $(document).ready(function() {

    })
</script>
<?php $this->endsection(); ?>

<?php $this->endsection(); ?>