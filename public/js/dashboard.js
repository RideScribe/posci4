$(function () {
  'use strict'
  let pesan = $('#pesan').data('pesan')
  if (pesan) {
    Swal.fire({
      title: pesan,
      icon: 'error',
      showConfirmButton: false,
      timer: 1500,
    })
  }

  // grafik pengunjung
  $.getJSON(`${BASE_URL}/dashboard/laporan_pengunjung`, function (data) {

    console.log(data)

    let label = []
    let total = []
    $(data).each(function (i) {
      label.push(data[i].bulan)
      total.push(data[i].total)
    })

    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold',
    }

    var mode = 'index'
    var intersect = true

    var ctx = $('#laporan-pengunjung')
    var salesChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: label,
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            data: total,
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect,
        },
        hover: {
          mode: mode,
          intersect: intersect,
        },
        legend: {
          display: false,
        },
        scales: {
          yAxes: [
            {
              gridLines: {
                display: true,
                lineWidth: '4px',
                color: 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent',
              },
              ticks: $.extend(
                {
                  beginAtZero: true,
                  callback: function (value) {
                    return value
                  },
                },
                ticksStyle,
              ),
            },
          ],
          xAxes: [
            {
              display: true,
              gridLines: {
                display: false,
              },
              ticks: ticksStyle,
            },
          ],
        },
        title: {
          display: true,
          text: 'Grafik Pengunjung',
        }
      },
    });
  })

  // grafik pendapatan
  $.getJSON(`${BASE_URL}/dashboard/laporan_pendapatan`, function (data) {

    console.log(data)

    let label = []
    let total = []
    $(data).each(function (i) {
      label.push(data[i].bulan)
      total.push(data[i].total)
    })

    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold',
    }

    var mode = 'index'
    var intersect = true

    var ctx = $('#laporan-pendapatan')
    var salesChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: label,
        datasets: [
          {
            backgroundColor: '#008080',
            borderColor: '#008080',
            data: total,
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect,
        },
        hover: {
          mode: mode,
          intersect: intersect,
        },
        legend: {
          display: false,
        },
        scales: {
          yAxes: [
            {
              gridLines: {
                display: true,
                lineWidth: '4px',
                color: 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent',
              },
              ticks: $.extend(
                {
                  beginAtZero: true,
                  callback: function (value) {
                    return value
                  },
                },
                ticksStyle,
              ),
            },
          ],
          xAxes: [
            {
              display: true,
              gridLines: {
                display: false,
              },
              ticks: ticksStyle,
            },
          ],
        },
        title: {
          display: true,
          text: 'Grafik Pendapatan',
        }
      },
    });
  })
})
