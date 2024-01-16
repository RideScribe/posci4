<?php $this->extend('layout/template'); ?>
<?php $this->section('content'); ?>

<div class="container-fluid">
    <button class="btn btn-primary mb-1 tambah"><i class="fas fa-plus"></i> Tambah Unit</button>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-unit" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <!-- <th>Pemasok</th> -->
                            <th>Terakhir Diubah</th>
                            <th class="text-right">Aksi</th>
                            <th class="text-right">Stok Opname</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($barang) == 0) : ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php endif ?>

                        <?php foreach ($barang as $k => $b) : ?>
                            <tr>
                                <td><?= $k + 1 ?></td>
                                <td>
                                    <?= $b->barang ?> <br>
                                    <div class="badge badge-secondary"><?= $b->kode ?></div>
                                </td>
                                <td><?= $b->stok ?? 0 ?></td>
                                <!-- <td><?= $b->nama_pemasok ?></td> -->
                                <td><?= $b->updated_at ?></td>
                                <td class="text-right">
                                    <button class="btn btn-sm btn-warning edit-barang" data-id="<?= $b->id ?>" data-nama-barang="<?= $b->barang ?>" data-pemasok="<?= $b->id_pemasok ?>"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger hapus-barang" data-id="<?= $b->id ?>"><i class="fas fa-trash"></i></button>
                                </td>
                                <!-- button plus and minus -->
                                <td class="text-right">
                                    <button class="btn btn-sm btn-success stok-plus" data-id="<?= $b->id ?>"><i class="fas fa-plus"></i></button>
                                    <!-- <button class="btn btn-sm btn-danger stok-minus" data-id="<?= $b->id ?>"><i class="fas fa-minus"></i></button> -->
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Data -->
<div class="modal fade" id="formModal" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <?= form_open('/barang/save', ['id' => 'form-barang']); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="faktur" class="col-sm-2 col-form-label">No Faktur</label>
                    <div class="col-sm-10">
                        <input required type="text" class="form-control" name="faktur" id="faktur" placeholder="faktur...">
                        <small class="invalid-feedback"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="barang" class="col-sm-2 col-form-label">Barang</label>
                    <div class="col-sm-10">
                        <input required type="text" class="form-control" name="barang" id="barang" placeholder="barang...">
                        <small class="invalid-feedback"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_beli" class="col-sm-2 col-form-label">Harga Beli</label>
                    <div class="col-sm-10">
                        <input required type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="harga_beli...">
                        <small>setelah disimpan tidak bisa diubah lagi mohon diisi dengan teliti</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jml_item" class="col-sm-2 col-form-label">Jlm Item</label>
                    <div class="col-sm-10">
                        <input required type="number" class="form-control" name="jml_item" id="jml_item" placeholder="jumlah_item...">
                        <small>setelah disimpan tidak bisa diubah lagi mohon diisi dengan teliti</small>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="total_harga" class="col-sm-2 col-form-label">Total Harga</label>
                    <div class="col-sm-10">
                        <input required type="number" class="form-control" name="total_harga" id="total_harga" placeholder="total_harga..." readonly>
                        <small>setelah disimpan tidak bisa diubah lagi mohon diisi dengan teliti</small>
                    </div>
                </div> -->
                <!-- <div class="form-group row">
                    <label for="pemasok" class="col-sm-2 col-form-label">Pemasok</label>
                    <div class="col-sm-10">
                        <select name="pemasok" id="pemasok" class="form-control custom-select" required>
                            <option value="">Pilih Pemasok</option>
                            <?php foreach ($pemasok as $p) : ?>
                                <option value="<?= $p['id'] ?>"><?= $p['nama_pemasok'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <small class="invalid-feedback"></small>
                    </div>
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary" id="">Simpan</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade modal-edit" id="formModalEdit" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <?= form_open('/barang/update', ['id' => 'form-barang']); ?>
        <input type="hidden" name="id_barang" class="form-control">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="barang" class="col-sm-2 col-form-label">Barang</label>
                    <div class="col-sm-10">
                        <input required type="text" class="form-control" name="barang" id="barang" placeholder="barang...">
                        <small class="invalid-feedback"></small>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="pemasok" class="col-sm-2 col-form-label">Pemasok</label>
                    <div class="col-sm-10">
                        <select name="pemasok" id="pemasok" class="form-control custom-select" required>
                            <option value="">Pilih Pemasok</option>
                            <?php foreach ($pemasok as $p) : ?>
                                <option value="<?= $p['id'] ?>"><?= $p['nama_pemasok'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <small class="invalid-feedback"></small>
                    </div>
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary" id="">Simpan</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>

<!-- modal stok plus -->
<div class="modal fade modal-edit" id="formModalStokPlus" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <?= form_open('/barang/stok_plus', ['id' => 'form-barang']); ?>
        <input type="hidden" name="id_barang" class="form-control">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="pemasok" class="col-sm-2 col-form-label">Pemasok</label>
                    <div class="col-sm-10">
                        <select name="pemasok" id="pemasok" class="form-control custom-select" required>
                            <option value="">Pilih Pemasok</option>
                            <?php foreach ($pemasok as $p) : ?>
                                <option value="<?= $p['id'] ?>"><?= $p['nama_pemasok'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <small class="invalid-feedback"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input required type="number" class="form-control" name="harga" id="harga" placeholder="harga...">
                        <small class="invalid-feedback"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jml_item" class="col-sm-2 col-form-label">Jml Item</label>
                    <div class="col-sm-10">
                        <input required type="number" class="form-control" name="jml_item" id="jml_item" placeholder="jml_item...">
                        <small class="invalid-feedback"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="total" class="col-sm-2 col-form-label">Total</label>
                    <div class="col-sm-10">
                        <input required type="number" class="form-control" name="total" id="total" placeholder="total...">
                        <small class="invalid-feedback"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea name="keterangan" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary" id="">Simpan</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    $(document).ready(function() {
        $(".tambah").on("click", function() {
            $("#formModal").modal("show");
            $(".modal-title").text("Tambah Data");
            $("button[type=submit]").attr("id", "tambah");
        });

        $(".edit-barang").on("click", function() {
            const id = $(this).data("id");
            const nama_barang = $(this).data("nama-barang");
            const pemasok = $(this).data("pemasok");

            $("#formModalEdit").modal("show");
            $(".modal-title").text("Edit Data");
            $("button[type=submit]").attr("id", "edit");
            $("input[name=id_barang]").val(id);
            $("input[name=barang]").val(nama_barang);
            $("select[name=pemasok]").val(pemasok);
        });

        // hapus-barang
        $(".hapus-barang").on("click", function() {
            const id = $(this).data("id");
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/barang/delete/" + id,
                        type: "DELETE",
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                Swal.fire({
                                    title: 'Berhasil',
                                    text: response.message,
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Gagal',
                                    text: response.message,
                                    icon: 'error',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        }
                    });
                }
            });
        });

        // stok-plus
        $(".stok-plus").on("click", function() {
            const id = $(this).data("id");
            $("#formModalStokPlus").modal("show");
            $(".modal-title").text("Stok Plus");
            $("button[type=submit]").attr("id", "stok-plus");
            $("input[name=id_barang]").val(id);
        });
    });
</script>
<?php $this->endSection(); ?>