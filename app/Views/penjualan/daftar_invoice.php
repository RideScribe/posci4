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
                            <th>kasir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalBayar" tabindex="-1" aria-labelledby="modalBayarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="formBayar">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBayarLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-0 m-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="tabel-keranjang" width="100%">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th style="width: 137px;">Diskon item (%)</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="px-3">
                            <input type="hidden" name="id_penjualan">
                            <input type="hidden" name="no_invoice">
                            <div class="form-group row">
                                <label for="pelanggan" class="col-sm-4 col-form-label">Pesanan Atas</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control text-right" name="pelanggan" id="pelanggan" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="total_akhir" class="col-sm-4 col-form-label">Total Akhir</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control text-right" name="total_akhir" id="total_akhir" value="0" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tunai" class="col-sm-4 col-form-label">Tunai</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control text-right" name="tunai" id="tunai" value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kembalian" class="col-sm-4 col-form-label">Kembalian</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control text-right" name="kembalian" id="kembalian" value="0" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Selesaikan Pembayaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="<?= base_url('plugins/autoNumeric.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        let auto_numeric = new AutoNumeric('#tunai', {
            decimalCharacter: ",",
            decimalPlaces: 0,
            digitGroupSeparator: ".",
        });

        // tuni on keyup calculate kembalian
        $('#tunai').on('keyup', function(e) {
            let total_akhir = $('#total_akhir').val();
            let tunai = $(this).val();
            tunai = tunai.replace(/\./g, '');
            let kembalian = tunai - total_akhir;
            $('#kembalian').val(kembalian);
        });

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
                        console.log(row)
                        if (row.tunai && row.tunai != 0) {
                            return `<span class="badge badge-success">Lunas</span>`;
                        } else {
                            return `<span class="badge badge-warning">Belum Lunas</span>`;
                        }
                    }
                },
                {
                    render: function(data, type, row) {
                        if (row.tunai && row.tunai != 0) {
                            return row.kasir;
                        } else {
                            return '-';
                        }
                    }
                },
                {
                    render: function(data, type, row) {
                        if (row.tunai && row.tunai != 0) {
                            let html = `<button class="btn btn-success btn-sm print" data-id='${row.id}'><i class="fas fa-print"></i></button>`;
                            return html;
                        } else {
                            let html = `<button type="button" id="btnBayar" data-id="${row.id}" data-invoice="${row.invoice}" data-toggle="modal" data-target="#modalBayar" class="btn btn-primary btn-sm"><i class="fas fa-money-bill-wave"></i></button>`;
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

        // formBayar onSubmit
        $('#formBayar').on('submit', function(e) {
            e.preventDefault();

            // get pelanggan, total akhir, tunai, kembalian
            let pelanggan = $('#pelanggan').val();
            let total_akhir = $('#total_akhir').val();
            let tunai = $('#tunai').val();
            let kembalian = $('#kembalian').val();
            let kasir = $('#id_user').val();

            if (pelanggan == '') {
                toastr.error('Pelanggan tidak boleh kosong')
                return false;
            }

            if (tunai == '' || tunai == 0) {
                toastr.error('Tunai tidak boleh kosong')
                return false;
            }

            if (kembalian < 0) {
                toastr.error('Tunai kurang')
                return false;
            }

            if (total_akhir == 0) {
                toastr.error('Tidak ada item yang dibayar')
                return false;
            }

            let data = $(this).serialize();
            $.ajax({
                url: `${BASE_URL}/penjualan/bayar_invoice`,
                type: "post",
                data: data,
                dataType: "json",
                success: function(data) {
                    if (data.status) {
                        toastr.success(data.pesan + ' <br> Invoice: ' + data.no_invoice)
                        $('#modalBayar').modal('hide');
                        table.ajax.reload();
                    } else {
                        toastr.error(data.pesan + ' <br> Invoice: ' + data.no_invoice)
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastr.error(xhr.responseText)
                }
            });
        });

        // tbody btnBayar click
        $(document).on('click', '#btnBayar', function(e) {
            $('#tabel-keranjang tbody').html('');
            $('#pelanggan').val('');
            $('#total_akhir').val('0');
            $('#tunai').val('0');
            $('#kembalian').val('0');

            // id penjualan & no invoice
            $('input[name="id_penjualan"]').val('');
            $('input[name="no_invoice"]').val('');

            var id = $(this).data('id');
            var invoice = $(this).data('invoice');

            // ajax get data
            $.ajax({
                url: `${BASE_URL}/penjualan/invoice_detail/${$(this).data('id')}`,
                type: "get",
                dataType: "json",
                success: function(data) {
                    console.log(data)
                    // if data status false 
                    if (!data.status) {
                        toastr.error('Data tidak ditemukan')
                        return false;
                    }

                    // id penjualan
                    $('input[name="id_penjualan"]').val(id);
                    // no invoice
                    $('input[name="no_invoice"]').val(invoice);

                    // set data pelanggan
                    $('#pelanggan').val(data.data[0].pelanggan)
                    // total akhir
                    $('#total_akhir').val(data.data[0].total_akhir)

                    let html = '';
                    $.each(data.data, function(i, v) {
                        html += `<tr>
                                    <td>${v.item}</td>
                                    <td>${v.harga}</td>
                                    <td>${v.jumlah}</td>
                                    <td>${v.diskon_item}</td>
                                    <td>${v.subtotal}</td>
                                </tr>`;
                    });
                    $('#tabel-keranjang tbody').html(html);
                },
            });

            $('#modalBayarLabel').html(`<code>${$(this).data('invoice')}</code>`)
        });
    });
</script>

<?php $this->endSection(); ?>