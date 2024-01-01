<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <button class="btn btn-primary mb-1 tambah"><i class="fas fa-plus"></i> Tambah Tempat</button>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-tempat" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tempat</th>
                            <th>Keterangan</th>
                            <th>QR</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($tempat as $t) : ?>
                            <?php $url = base_url('meja') . '/' . base64_encode(random_int(100000, 999999) . '.' .  $t['id']) . '/menu' ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $t['tempat'] ?></td>
                                <td><?= $t['keterangan'] ?></td>
                                <td>
                                    <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&choe=UTF-8&chld=H|1&chl=<?= urlencode($url) ?>" width="100px">
                                </td>
                                <td>
                                    <a href="<?= $url ?>" target="_blank" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                    <button class="btn btn-success btn-sm mr-1 edit" data-id="<?= $t['id'] ?>" data-tempat="<?= $t['tempat'] ?>" data-keterangan="<?= $t['keterangan'] ?>"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm hapus" data-id="<?= $t['id'] ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open(); ?>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="tempat" class="col-sm-3 col-form-label">Nama Tempat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Nama tempat">
                            <small class="invalid-feedback"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                            <small class="invalid-feedback"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" id="" class="btn btn-primary">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    $(document).ready(function() {
        // tombol tambah 
        $(".tambah").on("click", function() {
            $("#formModal").modal("show")
            $(".modal-title").text("Tambah Data")
            $("button[type=submit]").attr("id", "tambah")
        });
        // Table Tempat
        let table = $("#table-tempat").DataTable({
            // processing: true,
            // serverSide: true,
            // ajax: {
            //     url: `${BASE_URL}/tempat/ajax`
            // },
            // columns: [{
            //         render: function(data, type, row, meta) {
            //             return meta.row + meta.settings._iDisplayStart + 1;
            //         }
            //     },
            //     {
            //         data: 'tempat',
            //         name: 'tempat'
            //     },
            //     {
            //         data: 'keterangan',
            //         name: 'keterangan'
            //     },
            //     {
            //         // show image qrcode
            //         data: function(row) {
            //             var urlMenu = "<?= base_url('tempat') ?>/" + "<?= random_int(100000, 999999) . '.' . base64_encode("+row.id+") ?>" + "/menu";
            //             urlMenu = encodeURIComponent(urlMenu);

            //             return '<img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&choe=UTF-8&chld=H|1&chl=' + urlMenu + '" width="100px">';
            //         }
            //     },
            //     {
            //         data: function(row) {
            //             let button = '<button class="btn btn-success btn-sm mr-1 edit" data-id="' + row.id + '" data-tempat="' + row.tempat + '" data-keterangan="' + row.keterangan + '"><i class="fas fa-edit"></i></button>';
            //             button += '<button class="btn btn-danger btn-sm hapus" data-id="' + row.id + '"><i class="fas fa-trash"></i></button>';
            //             return button;
            //         }
            //     }
            // ]
        })
        // tombol simpan di modal
        $('.content').on('click', '#tambah', function(e) {
            e.preventDefault();
            $.ajax({
                type: $("form").attr("method"),
                url: `${BASE_URL}/tempat/tambah`,
                dataType: "json",
                data: $("form").serialize(),
                success: function(response) {
                    responValidasi(['tambah'], ['tempat', 'keterangan'], response);
                    if (response.sukses) {
                        $('#formModal').modal('hide');
                        window.location.reload();
                    }
                }
            })
        })
        // tombol edit
        $('.content').on('click', '.edit', function(e) {
            e.preventDefault();
            $('#formModal').modal('show');
            $('.modal-title').text('Edit Data');
            $('button[type=submit]').attr('id', 'ubah')

            $('#tempat').val($(this).data('tempat'));
            $('#keterangan').val($(this).data('keterangan'));
            $('.modal-footer').append('<input type="hidden" name="id" value="' + $(this).data('id') + '">');
        })
        $('.content').on('click', '#ubah', function(e) {
            e.preventDefault()
            $.ajax({
                type: $("form").attr("method"),
                url: `${BASE_URL}/tempat/ubah`,
                dataType: "json",
                data: $("form").serialize(),
                success: function(response) {
                    responValidasi(['ubah'], ['tempat', 'keterangan'], response);
                    if (response.sukses) {
                        $('#formModal').modal('hide');
                        window.location.reload();
                    }
                }
            })
        })
        // tombol hapus 
        $('.content').on('click', '.hapus', function(e) {
            e.preventDefault()
            Swal.fire({
                title: 'Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Konfirmasi!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `${BASE_URL}/tempat/hapus`,
                        data: {
                            id: $(this).data('id')
                        },
                        success: function(response) {
                            window.location.reload();
                            if (response.status) {
                                toastr.success(response.pesan, 'Sukses')
                            } else {
                                toastr.error(response.pesan, 'Gagal')
                            }
                        }
                    })
                }
            })
        })
        // form modal hide
        $('#formModal').on('hidden.bs.modal', function() {
            $('form')[0].reset();
            $('input').removeClass('is-invalid');
            $('textarea').removeClass('is-invalid');
            $('input[name=id]').remove();
        })
    });
</script>
<?= $this->endSection(); ?>