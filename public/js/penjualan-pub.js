$(function () {
  plus = (id) => {
    let qty = parseInt($('.qtyinput' + id).val());
    qty += 1;
    $('.qtyinput' + id).val(qty);
  }

  min = (id) => {
    let qty = parseInt($('.qtyinput' + id).val());
    if (qty > 1) {
      qty -= 1;
      $('.qtyinput' + id).val(qty);
    }
  }

  add_to_cart = (id, nama, harga, stok) => {
    let qty = parseInt($('.qtyinput' + id).val());
    $.ajax({
      url: `${BASE_URL}/penjualan/tambah`,
      method: 'post',
      data: {
        [$('#token').attr('name')]: $('#token').val(),
        iditem: id,
        barcode: "",
        nama: nama,
        harga: harga,
        jumlah: qty,
        stok: stok,
      },
      success: function (response) {
        if (response.status) {
          detailKeranjang();
          toastr.success(response.pesan, 'Sukses', {
            timeOut: 3000
          })
        } else {
          toastr.error(response.pesan)
        }
      },
    })
  }

  function detailKeranjang() {
    let keranjang = ''
    $.ajax({
      url: `${BASE_URL}/penjualan/keranjang`,
      dataType: 'json',
      success: function (response) {
        // $('#tampilkan_total').text(rupiah(response.sub_total)) // menampilkan total harga
        // $('#total_akhir').val(response.sub_total) // isi value total_akhir

        $('#sub_total').val(response.sub_total) // isi value sub_total
        $('#jml_item_keranjang').text(response.keranjang.length) // isi value sub_total

        // menampilkan detail keranjang
        if (response.keranjang.length === 0) {
          keranjang = `<tr><td colspan="7" class="text-center">Keranjang masih kosong</td></tr>`
          $('#pelanggan').prop('readonly', true)
          $('#catatan').prop('readonly', true)
        } else {
          $('#pelanggan').prop('readonly', false)
          $('#catatan').prop('readonly', false)

          var jml_all = 0

          $.each(response.keranjang, function (i, data) {
            jml_all += parseInt(data.jumlah)

            keranjang += `<tr>
                <td>${data.nama}</td>
                <td>${data.harga}</td>
                <td>${data.jumlah}</td>
                <td>${data.total}</td>
                <td>
                    <button type="button" class="btn btn-success btn-sm" id="edit-item" data-toggle="modal" data-target="#modal-item-edit" data-id="${data.id}" data-barcode="${data.barcode}" data-item="${data.nama}" data-harga="${data.harga}" data-jumlah="${data.jumlah}" data-diskon="${data.diskon}" data-subtotal="${data.total}" data-stok="${data.stok}"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" id="hapus-item" data-id="${data.id}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>`
          })

        }

        $('tbody').html(keranjang)

        if (response.keranjang.length > 0) {
          $('#tabel-keranjang').DataTable({
            retrieve: true,
            destroy: true,
            lengthChange: false,
            searching: false,
            ordering: false,
            info: false,
            pageLength: 5,
            paging: true,
            pagingType: "simple",
          });
        }
      },
    });
  }

  detailKeranjang();

  $('.modal-body').on('click', '#hapus-item', function () {
    Swal.fire({
      title: 'Yakin ingin menghapus item ini?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Konfirmasi!',
      cancelButtonText: 'Batal',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: `${BASE_URL}/penjualan/hapus`,
          type: 'post',
          data: {
            [$('#token').attr('name')]: $('#token').val(),
            iditem: $(this).data('id'),
          },
          success: function (response) {
            if (response.status) {
              detailKeranjang()
              toastr.success(response.pesan, 'Sukses', {
                timeOut: 3000
              })
            } else {
              toastr.error(response.pesan, 'Error', {
                timeOut: 3000
              })
            }
          },
        })
      }
    })
  })

  // modal-item-edit on click
  $('.modal-body').on('click', '#edit-item', function () {
    // mengambil data dari tombol select, input ke tiap-tiap elemet
    $('#item_id').val($(this).data('id'))
    $('#item_nama').val($(this).data('item'))
    $('#item_harga').val($(this).data('harga'))
    $('#item_jumlah')
      .val($(this).data('jumlah'))
      .prop('max', $(this).data('stok'))
    $('#item_stok').val($(this).data('stok'))
    $('#modal-stok').text('Stok produk ' + $(this).data('stok'))
    $('#harga_setelah_diskon').val($(this).data('subtotal'))
  })

  // jika kolom jumlah dan diskon di edit update isi total otomatis
  $('.modal-body').on('keyup mouseup', '#item_jumlah', function () {
    modal_edit_item()
  })

  function modal_edit_item() {
    let jumlah = $('#item_jumlah').val()
    let harga = $('#item_harga').val()
    let stok = $('#item_stok').val()

    if (parseInt(jumlah) > parseInt(stok)) {
      toastr.error('Jumlah melebihi stok, maksimal ' + stok, '', {
        timeOut: 3000,
      })
      $('#item_jumlah').val(1)
    } else if (jumlah == '' || jumlah < 1) {
      toastr.error('Jumlah minimal 1', '', { timeOut: 3000 })
      $('#item_jumlah').val(1)
    }

    let harga_sebelum_diskon = jumlah * harga
    $('#harga_setelah_diskon').val(harga_sebelum_diskon)
  }

  // #modal-item-edit #edit-keranjang on click
  $('#edit-keranjang').click(function () {
    $.ajax({
      url: `${BASE_URL}/penjualan/ubah`,
      type: 'post',
      dataType: 'json',
      data: $('form').serialize(),
      success: function (response) {
        $('#modal-item-edit').modal('hide')
        detailKeranjang()
        toastr.success(response.pesan, 'Sukses', { timeOut: 3000 })
      },
    })
  })

  $('#bayar').on('click', function () {
    let pelanggan = $('#pelanggan').val()
    let subtotal = $('#sub_total').val()
    let catatan = $('#catatan').val()
    let tanggal = $('#tanggal').val()

    if (pelanggan == "") {
      toastr.error('Nama pelanggan belum diinput', '', { timeOut: 3000 })
      $('#pelanggan').focus()
      return false;
    }

    Swal.fire({
      title: 'Yakin proses transaksi sudah benar?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Konfirmasi!',
      cancelButtonText: 'Batal',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: `${BASE_URL}/penjualan/bayar`,
          type: 'post',
          dataType: 'json',
          data: {
            [$('#token').attr('name')]: $('#token').val(),
            pelanggan: pelanggan,
            subtotal: subtotal,
            diskon: 0,
            total_akhir: subtotal,
            tunai: 0,
            kembalian: 0,
            catatan: catatan,
            tanggal: tanggal,
          },
          success: function (response) {
            console.log(response);
            if (response.status) {
              // close modal
              $('#modalKeranjang').modal('hide')

              Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                timer: 0,
                showConfirmButton: true,
                html: `<p>${response.pesan}, nomor invoice anda <b>${response.no_invoice}</b> <br /> <code>harap simpan nomor invoice, sebagai tanda bukti pesanan anda</code></p>`,
                willClose: () => {
                  window.location.reload()
                }
              })
            } else {
              toastr.error(response.pesan)
            }
          },
          error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
          },
        })
      }
    })
  })
})