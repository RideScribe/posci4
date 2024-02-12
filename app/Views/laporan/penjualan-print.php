<?php $this->extend('layout/print'); ?>
<?php $this->section('content'); ?>

<?php
$strKondisi = "";
if ($persenUntung >= 0) {
    $strKondisi = "naik";
} else {
    $strKondisi = "turun";
}

$start = date('Y-m-d', strtotime(str_replace('/', '-', trim(explode('-', $filter['tanggal'])[0]))));
$end = date('Y-m-d', strtotime(str_replace('/', '-', trim(explode('-', $filter['tanggal'])[1]))));
?>

<div class="p-2" style="font-size:13px !important;">

    <h5 class="text-center pb-0 mb-0">Laporan Penjualan</h5>
    <h4 class="text-center pb-0 mb-0"><u>RESTORAN LEGITA</u></h4>
    <h6 class="text-center"><?=  $start == $end ? "Tanggal" : "Periode" ?> <?= $start == $end ? longdate_indo_without_day_name($start) : longdate_indo_without_day_name($start) . " - " . longdate_indo_without_day_name($end) ?></h6>

    <!-- justify and make margin on first line -->
    <div class="my-3 mt-4" style="text-align: justify; text-justify: inter-word;">
        <span>Berdasarkan hasil penjualan <?= $isLunas && $isLunas == 0 ? '<b>Belum Lunas</b>' : ($isLunas == 1 ? '<b>Lunas</b>' : '<b>Lunas</b>') ?> pada <span class="mr-1"><?=  $start == $end ? "Tanggal" : "Periode" ?></span> <strong><?= $start == $end ? longdate_indo_without_day_name($start) : longdate_indo_without_day_name($start) . " - " . longdate_indo_without_day_name($end) ?></strong>, Berikut adalah rincian pendapatannya :</span>
    </div>

    <table class="table" id="tabel-invoice" width="100%">
        <thead>
            <tr style="background-color: #dfdfdf;">
                <th>No.</th>
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
                    <td><?= $no++ ?></td>
                    <td><span><?= mediumdate_indo(date('Y-m-d', strtotime($item['tanggal']))) ?></span></td>
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
                                    <th style="text-align:left;" style="width:80px;">Menu</th>
                                    <th style="text-align:left;">Harga</th>
                                    <th style="text-align:left;">Disc</th>
                                    <th style="text-align:left;">Jml</th>
                                    <th style="text-align:left;" style="width:100px;">Sub Total</th>
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
                                        <!-- <td><?= mediumdate_indo(date('Y-m-d', strtotime($item['tanggal']))) ?></td> -->
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
                                            <s><strong>Rp. <?= rupiah($item['total_harga']) ?></strong></s> <br><strong>(<?= $item['diskon'] ?>%)</strong> <br />
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

            <tr class="bg-success p-0 m-0">
                <td colspan="4" class="p-0 m-0"></td>
                <td class="p-0 m-0">
                    <table class="table table-borderless table-compact table-sm mb-0 pb-0">
                        <tbody>
                            <tr style="color:#fff;">
                                <td colspan="5" class="text-right" style="border-right: .5px solid #efefef">
                                    <strong>Total Pendapatan</strong>
                                </td>
                                <td style="width: 27%;" class=""><strong>Rp. <?= rupiah($totalPendapatan) ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>

        <!-- <tfoot class="bg-success">
            <tr>
                <td style="color:#fff;" colspan="4" class="text-center">
                    <strong>Total Pendapatan</strong>
                    <strong>: Rp. <?= rupiah($totalPendapatan) ?></strong>
                </td>
            </tr>
        </tfoot> -->
    </table>

    <!-- <span style="font-size: 10px !important;">
        * Dokumen ini digenerate secara otomatis oleh sistem pada tanggal <?= date('d M Y') ?>. <br />
    </span> -->
    <div class="my-3 mt-4" style="text-align: right; text-justify: inter-word;">
        <table class="table table-borderless" width="100%">
            <tr></tr>
            <tr></tr>
            <tr>
                <td width="50%" class="text-center">
                    <p>
                        dibuat oleh
                    </p>
                    <br />
                    <br />
                    <br />
                    <br />
                    <p>
                        (........................................)
                        <br>
                        Kasir
                    </p>
                </td>
                <td width="50%" class="text-center">
                    <span style="font-size: 13px !important; font-weight:bolder;">
                        Pemalang, <?= date_indo($filter['tanggal'] ? date('Y-m-t', strtotime($filter['tanggal'])) : date('Y-m-t')) ?>
                    </span>
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