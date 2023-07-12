<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="pesan" data-pesan="<?= session('pesan') ?>"></div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="tabel-invoice" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    $(document).ready(function() {
        let pesan = $(".pesan").data('pesan')
        if (pesan != '') {
            toastr.error(pesan)
        }
        const table = $("#tabel-invoice").DataTable({
            proseccing: true,
            serverSide: true,
            order: [
                [1, "desc"]
            ],
            ajax: {
                url: `${BASE_URL}/penjualan/invoice`
            },
            //optional
            "lengthMenu": [
                [5, 10],
                [5, 10]
            ],
            "columns": [{
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'invoice'
                },
                {
                    data: 'pelanggan'
                },
                {
                    data: 'tanggal'
                },
                {
                    render: function(data, type, row) {
                        if (row.tunai) {
                            return `<span class="badge badge-success">Lunas</span>`;
                        } else {
                            return `<span class="badge badge-warning">Belum Lunas</span>`;
                        }
                    }
                },
                {
                    render: function(data, type, row) {
                        if (row.tunai) {
                            let html = `<button class="btn btn-success btn-sm print" data-id='${row.id}'><i class="fas fa-print"></i></button>`;
                            return html;
                        } else {
                            // belum bayar tunai
                            let html = `<a href="<?= base_url('penjualan/bayar/') ?>${row.id}" class="btn btn-primary btn-sm"><i class="fas fa-money-bill-wave"></i></a>`;
                            return html;
                        }
                    }
                }
            ],
            columnDefs: [{
                    targets: 0,
                    width: "5%"
                },
                {
                    targets: [0, 3],
                    className: "text-center"
                },
                {
                    targets: [0, 3],
                    orderable: false
                },
                {
                    targets: [0, 2, 3],
                    searchable: false
                }
            ]
        });
        $(document).on('click', '.print', function(e) {
            window.open(`${BASE_URL}/penjualan/cetak/` + $(this).data('id'))
        });
    });
</script>

<?php $this->endSection(); ?>