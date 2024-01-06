<?php $this->extend('layout/template'); ?>
<?php $this->section('content'); ?>
<div class="container-fluid">

  <form action="" method="get" class="d-flex mb-3">
    <input type="month" name="bulan" id="bulan" class="form-control" value="<?= $filter['bulan'] ?>">
    <button type="submit" class="btn btn-primary ml-2">Filter</button>
  </form>

  <div class="row">
    <div class="col-12 col-md-4">
      <div class="small-box bg-gradient-green">
        <div class="inner">
          <h3>Rp. <?= rupiah($pendapatanTahunan['total_akhir'] ? $pendapatanTahunan['total_akhir'] : 0) ?>,-</h3>
          <p>Pendapatan Tahun <?= date('Y', strtotime($filter['bulan'])) ?></p>
        </div>
        <div class="icon">
          <i class="fas fa-dollar-sign"></i>
        </div>
      </div>

      <div class="card shadow mb-4 card-body">
        <table>
          <tbody>
            <tr>
              <th>MIN</th>
              <td>Rp. <?= rupiah($minTahunan ? $minTahunan : 0) ?></td>
            </tr>
            <tr>
              <th>MAX</th>
              <td>Rp. <?= rupiah($maxTahunan ? $maxTahunan : 0) ?></td>
            </tr>
            <tr>
              <th>AVG</th>
              <td>Rp. <?= rupiah($averageTahunan ? $averageTahunan : 0) ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card shadow mb-4">
        <div class="card-header">
          <h6 class="m-0 font-weight-bold text-primary">Detail Pendapatan Tahunan</h6>
        </div>
        <div class="card-body p-1 m-1">
          <table class="table table-compact table-sm">
            <thead>
              <tr>
                <th>Bulan</th>
                <th>Pendapatan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pendapatanBulananDetail as $bulan) : ?>
                <tr>
                  <td><?= date('M, Y', strtotime($bulan['tanggal'])) ?></td>
                  <td>Rp. <?= rupiah($bulan['total'] ? $bulan['total'] : 0) ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-4">
      <div class="small-box bg-gradient-blue">
        <div class="inner">
          <h3>Rp. <?= rupiah($pendapatanBulanan['total_akhir'] ? $pendapatanBulanan['total_akhir'] : 0) ?>,-</h3>
          <p>Pendapatan <?= date('F', strtotime($filter['bulan'])) ?> <?= date('Y', strtotime($filter['bulan'])) ?></p>
        </div>
        <div class="icon">
          <i class="fas fa-dollar-sign"></i>
        </div>
      </div>

      <div class="card shadow mb-4 card-body">
        <table>
          <tbody>
            <tr>
              <th>MIN</th>
              <td>Rp. <?= rupiah($minBulanan['total_akhir'] ? $minBulanan['total_akhir'] : 0) ?></td>
            </tr>
            <tr>
              <th>MAX</th>
              <td>Rp. <?= rupiah($maxBulanan['total_akhir'] ? $maxBulanan['total_akhir'] : 0) ?></td>
            </tr>
            <tr>
              <th>AVG</th>
              <td>Rp. <?= rupiah($averageBulanan['total_akhir'] ? $averageBulanan['total_akhir'] : 0) ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card shadow mb-4">
        <div class="card-header">
          <h6 class="m-0 font-weight-bold text-primary">Pendapatan Bulanan</h6>
        </div>
        <div class="card-body p-1 m-1">
          <table class="table table-compact table-sm">
            <thead>
              <tr>
                <th>Bulan</th>
                <th>Pendapatan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pendapatanHarianDetail as $harian) : ?>
                <tr>
                  <td><?= date('d M Y', strtotime($harian['tanggal'])) ?></td>
                  <td>Rp. <?= rupiah($harian['total'] ? $harian['total'] : 0) ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-4">
      <div class="small-box bg-gradient-yellow">
        <div class="inner">
          <h3>Rp. <?= rupiah($pendapatanHariIni['total_akhir'] ? $pendapatanHariIni['total_akhir'] : 0) ?>,-</h3>
          <p>Pendapatan Hari Ini</p>
        </div>
        <div class="icon">
          <i class="fas fa-dollar-sign"></i>
        </div>
      </div>

      <div class="card shadow mb-4 card-body">
        <table>
          <tbody>
            <tr>
              <th>MIN</th>
              <td>Rp. <?= rupiah($minHariIni['total_akhir'] ? $minHariIni['total_akhir'] : 0) ?></td>
            </tr>
            <tr>
              <th>MAX</th>
              <td>Rp. <?= rupiah($maxHariIni['total_akhir'] ? $maxHariIni['total_akhir'] : 0) ?></td>
            </tr>
            <tr>
              <th>AVG</th>
              <td>Rp. <?= rupiah($averageHariIni['total_akhir'] ? $averageHariIni['total_akhir'] : 0) ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card shadow mb-4">
        <div class="card-header">
          <h6 class="m-0 font-weight-bold text-primary">Pendapatan Hari ini</h6>
        </div>
        <div class="card-body p-1 m-1">
          <table class="table table-compact table-sm">
            <thead>
              <tr>
                <th>Bulan</th>
                <th>Pendapatan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pendapatanHariIniDetail as $hariIni) : ?>
                <tr>
                  <td><?= date('d M Y', strtotime($hariIni['tanggal'])) ?></td>
                  <td>Rp. <?= rupiah($hariIni['total'] ? $hariIni['total'] : 0) ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->endsection() ?>

<?= $this->section('js') ;?>
<script>
  $(document).ready(function() {
    // table-pendapatan-bulanan datatable
    $('.table').DataTable({
      "paging": true,
      "pagingType": "simple",
      "pageLength": 12,
      "ordering": false,
      "info": false,
      "searching": false,
      "bLengthChange": false,
    });
  });
</script>
<?= $this->endSection() ;?>
