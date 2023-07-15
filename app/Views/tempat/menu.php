<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title); ?> | <?= get_pengaturan('nama_toko'); ?></title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('plugins/sweetalert2/bootstrap-4.min.css') ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('plugins/toastr/toastr.min.css') ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/jquery-ui/jquery-ui.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <style>
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #6610f2 !important;
        }

        .dataTables_info {
            padding: .75rem 1rem;
        }

        #tabel-keranjang_paginate {
            padding: .75rem 1rem;
        }
    </style>
</head>

<body>
    <div id="base-url" data-url="<?= $base_url ?>"></div>
    <nav class="navbar navbar-expand-lg bg-indigo navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><strong><?= get_pengaturan('nama_toko'); ?></strong></a>
            <div class="mr-auto"></div>
            <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalKeranjang">
                <i class="fa fa-shopping-cart"></i>
                <span class="ml-2"><strong id="jml_item_keranjang">0</strong></span>
            </button>
        </div>
    </nav>

    <div class="container my-3">
        <ul class="nav nav-pills mb-3 d-flex border" id="pills-tab" role="tablist">
            <?php foreach ($menus as $key => $val) : ?>
                <li class="nav-item text-center border" style="flex:1;" role="presentation">
                    <a class="nav-link rounded-0 <?= $key == array_keys($menus)[0] ? 'active' : '' ?>" id="pills-<?= $key ?>-tab" data-toggle="pill" data-target="#pills-<?= $key ?>" type="button" role="tab" aria-controls="pills-<?= $key ?>" aria-selected="true"><strong><?= $key ?></strong></a>
                </li>
            <?php endforeach ?>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <?php foreach ($menus as $key => $val) : ?>
                <div class="tab-pane fade <?= $key == array_keys($menus)[0] ? 'show active' : '' ?>" id="pills-<?= $key ?>" role="tabpanel" aria-labelledby="pills-<?= $key ?>-tab">
                    <?php if ($val === 0 || empty($val)) : ?>
                        <!-- TRUE -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-outline card-warning mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="card-body">
                                            <div class="d-flex flex-column justify-content-between p-3 h-100 w-100">
                                                <div class="">
                                                    <h4>Menu Kosong</h4>
                                                    <h5>Silahkan tambahkan menu terlebih dahulu</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end TRUE -->
                    <?php else : ?>
                        <!-- FALSE -->
                        <div class="row">
                            <?php foreach ($val as $item) : ?>
                                <div class="col-12 col-md-6">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row no-gutters">
                                            <div class="col-4">
                                                <img src="<?= base_url('uploads/produk/' . $item->gambar) ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="<?= $item->item ?>">
                                            </div>
                                            <div class="card-body col-8 p-0 m-0">
                                                <div class="d-flex flex-column justify-content-between p-3 h-100 w-100">
                                                    <div class="">
                                                        <h4><?= $item->item ?></h4>
                                                        <h5>Rp. <?= number_format($item->harga, 0, ',', '.') ?> / <?= $item->unit ?></h5>
                                                    </div>
                                                    <div class="mt-3 d-flex justify-content-between">
                                                        <div class="w-75 w-md-50">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <button class="btn btn-outline-secondary btn-min" type="button" id="btnmin" onclick="min(<?= $item->id ?>)">-</button>
                                                                </div>
                                                                <input type="number" class="form-control text-center qtyinput qtyinput<?= $item->id ?>" name="jumlah" id="jumlah" value="1" min="1" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary btn-plus" id="tambah" type="button" id="btnplus" onclick="plus(<?= $item->id ?>)">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end input number quantity -->
                                                        <div>
                                                            <button class="btn bg-indigo btn-block" onclick="add_to_cart('<?= $item->id ?>', '<?= $item->item ?>', '<?= $item->harga ?>', '<?= $item->stok ?>')">
                                                                <i class="fa fa-cart-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal Keranjang -->
    <div class="modal fade" id="modalKeranjang" tabindex="-1" aria-labelledby="modalKeranjangLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form action="" id="form-keranjang">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalKeranjangLabel">Keranjang Anda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-0 m-0">
                        <div class="px-3">
                            <div class="row d-block d-sm-block d-md-none">
                                <label for="diskon" class="col-sm-4 col-form-label">Daftar Pesanan Anda</label>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="tabel-keranjang" width="100%" style="width: 100% !important;">
                                <thead class="w-100">
                                    <tr>
                                        <th>Menu</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="px-3 pt-3">
                            <div class="form-group row d-none">
                                <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control text-right" name="tanggal" id="tanggal" value="<?= date('Y-m-d') ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sub_total" class="col-sm-4 col-form-label">Total Akhir</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control text-right" name="sub_total" id="sub_total" value="0" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pelanggan" class="col-sm-4 col-form-label">Pesanan Atas</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control text-right" name="pelanggan" id="pelanggan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="catatan" class="col-sm-4 col-form-label">Catatan</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control text-right" name="catatan" id="catatan" readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="bayar" class="btn bg-indigo">Proses Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Keranjang -->

    <!-- modal edit item produk -->
    <div class="modal fade" id="modal-item-edit" aria-modal="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <?= form_open('', ['csrf_id' => 'token']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="item_id" name="item_id">
                    <input type="hidden" id="item_stok" name="item_stok">
                    <input type="hidden" name="barcode" value="">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Item Produk</label>
                            <input type="text" id="item_nama" name="item_nama" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="item_harga">Harga</label>
                            <input type="text" id="item_harga" name="item_harga" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="item_jumlah">Jumlah <small id="modal-stok" class="text-muted"></small></label>
                            <input type="number" id="item_jumlah" name="item_jumlah" class="form-control" min="1">
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="harga_setelah_diskon">Total</label>
                        <input type="text" id="harga_setelah_diskon" name="harga_setelah_diskon" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <div class="float-right mr-3">
                        <button type="button" class="btn btn-success" id="edit-keranjang"><i class="fa fa-paper-plane"></i> Simpan</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
            <?= form_close(); ?>
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <!-- Toastr -->
    <script src="<?= base_url('plugins/toastr/toastr.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>
    <script src="<?= base_url('js/script.js') ?>"></script>
    <!-- Penjualan Pub  -->
    <script src="<?= base_url('js/penjualan-pub.js') ?>"></script>
</body>

</html>