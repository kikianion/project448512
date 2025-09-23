<?php $this->load->view('_appshell/1head2'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Dashboard Pemantauan <small>Simela Generasi 2.0</small></h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <h5 class="col-sm-4 card-title m-0 text-bold">Pantauan Performa Perangat Daerah</h5>
                <select class="col-sm-8 form-control">
                  <option selected>Pilih OPD</option>
                  <option>OPD 1</option>
                  <option>OPD 2</option>
                  <option>OPD 3</option>
                  <option>dst...</option>
                </select>
              </div>
            </div>
            <div class="card-body">
              pada tampilan awal sebelum dipilih OPD maka yang tampil adalah data seluruh kabupaten
              <div class="row">
                <div class="col-lg-4 text-center">
                  <input type="text" class="knob" value="35" data-thickness="0.25" data-skin="tron" data-width="250" data-height="250" data-fgColor="#fb6f92">
                  <div class="knob-label text-bold">Serapan Anggaran</div>
                </div>
                <div class="col-lg-4 text-center">
                  <input type="text" class="knob" value="35" data-thickness="0.25" data-skin="tron" data-width="250" data-height="250" data-fgColor="#f48c06">
                  <div class="knob-label text-bold">Rerata Capaian Indikator</div>
                </div>
                <div class="col-lg-4 text-center">
                  <input type="text" class="knob" value="35" data-thickness="0.25" data-skin="tron" data-width="250" data-height="250" data-fgColor="#e63946">
                  <div class="knob-label text-bold">Indikator dengan Capaian Terendah</div>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <h5 class="col-sm-4 card-title m-0 text-bold">Pantauan Kriteria Perangkat Daerah</h5>
                <select class="form-control col-sm-8">
                  <option selected>Pilih Kategori</option>
                  <option>Anggaran</option>
                  <option>Rata-Rata Kinerja</option>
                  <option>Kinerja Terendah</option>
                </select>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>

          </div>

        </div>
        <!-- /.col-md-6 -->
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<?php $this->load->view('_appshell/6foot'); ?>

</div>
<div class="modal fade" id="notifikasi">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pengumuman</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="text-bold">Judul Pengumuman 1</h5>
        <h6 class="text-monospace">Tanggal : 25 Mei 2025</h>
          <p></p>
          <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang ditampilkan.</p>
          <hr class="hr">
          </hr>
          <h5 class="text-bold">Judul Pengumuman 2</h5>
          <h6 class="text-monospace">Tanggal : 24 Mei 2025</h>
            <p></p>
            <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang ditampilkan.</p>
            <hr class="hr">
            </hr>
            <h5 class="text-bold">Judul Pengumuman 3</h5>
            <h6 class="text-monospace">Tanggal : 23 Mei 2025</h>
              <p></p>
              <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang ditampilkan.</p>
              <hr class="hr">
              </hr>
              <h5 class="text-bold">Judul Pengumuman 4</h5>
              <h6 class="text-monospace">Tanggal : 22 Mei 2025</h>
                <p></p>
                <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang ditampilkan.</p>
                <hr class="hr">
                </hr>
                <h5 class="text-bold">Judul Pengumuman 5</h5>
                <h6 class="text-monospace">Tanggal : 21 Mei 2025</h>
                  <p></p>
                  <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang ditampilkan.</p>
      </div>
      <div class="modal-footer pull-right">
        <button type="button" class="btn btn-info">Oke</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="reset-password">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Reset Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group"><input type="password" class="form-control" id="password-baru" placeholder="Masukan password baru Anda"></div>
        <div class="form-group"><input type="password" class="form-control" id="password-baru2" placeholder="Ulangi password baru Anda"></div>
        <div class="modal-footer pull-right">
          <button type="button" class="btn btn-warning">Terapkan Password Baru</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="assets/AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/AdminLTE-3.1.0/dist/js/adminlte.min.js"></script>
  <!-- ChartJS -->
  <!-- <script src="assets/plugins/chart.js/chart.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
  <!-- AdminLTE for demo purposes -->
  <script src="assets/AdminLTE-3.1.0/plugins/jquery-knob/jquery.knob.min.js"></script>
  <script>
    $(function() {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //--------------
      //- AREA CHART -
      //--------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

      var areaChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Digital Goods',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [28, 48, 40, 19, 86, 27, 90]
          },
          {
            label: 'Electronics',
            backgroundColor: 'rgba(210, 214, 222, 1)',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [65, 59, 80, 81, 56, 55, 40]
          },
        ]
      }

      var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
            }
          }],
          yAxes: [{
            gridLines: {
              display: false,
            }
          }]
        }
      }

      // This will get the first returned node in the jQuery collection.
      new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
      })

      //-------------
      //- LINE CHART -
      //--------------
      var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
      var lineChartOptions = $.extend(true, {}, areaChartOptions)
      var lineChartData = $.extend(true, {}, areaChartData)
      lineChartData.datasets[0].fill = false;
      lineChartData.datasets[1].fill = false;
      lineChartOptions.datasetFill = false

      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
      })

      //-------------
      //- DONUT CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData = {
        labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
        ],
        datasets: [{
          data: [700, 500, 400, 600, 300, 100],
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }]
      }
      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })

      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData = donutData;
      var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0

      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }

      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })

      //---------------------
      //- STACKED BAR CHART -
      //---------------------
      var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
      var stackedBarChartData = $.extend(true, {}, barChartData)

      var stackedBarChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          xAxes: [{
            stacked: true,
          }],
          yAxes: [{
            stacked: true
          }]
        }
      }

      new Chart(stackedBarChartCanvas, {
        type: 'bar',
        data: stackedBarChartData,
        options: stackedBarChartOptions
      })
    })
  </script>

  <script>
    $(function() {
      /* jQueryKnob */

      $('.knob').knob({
        /*change : function (value) {
         //console.log("change : " + value);
         },
         release : function (value) {
         console.log("release : " + value);
         },
         cancel : function () {
         console.log("cancel : " + this.value);
         },*/
        draw: function() {

          // "tron" case
          if (this.$.data('skin') == 'tron') {

            var a = this.angle(this.cv) // Angle
              ,
              sa = this.startAngle // Previous start angle
              ,
              sat = this.startAngle // Start angle
              ,
              ea // Previous end angle
              ,
              eat = sat + a // End angle
              ,
              r = true

            this.g.lineWidth = this.lineWidth

            this.o.cursor &&
              (sat = eat - 0.3) &&
              (eat = eat + 0.3)

            if (this.o.displayPrevious) {
              ea = this.startAngle + this.angle(this.value)
              this.o.cursor &&
                (sa = ea - 0.3) &&
                (ea = ea + 0.3)
              this.g.beginPath()
              this.g.strokeStyle = this.previousColor
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
              this.g.stroke()
            }

            this.g.beginPath()
            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
            this.g.stroke()

            this.g.lineWidth = 2
            this.g.beginPath()
            this.g.strokeStyle = this.o.fgColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
            this.g.stroke()

            return false
          }
        }
      })
      /* END JQUERY KNOB */

      //INITIALIZE SPARKLINE CHARTS
      var sparkline1 = new Sparkline($('#sparkline-1')[0], {
        width: 240,
        height: 70,
        lineColor: '#92c1dc',
        endColor: '#92c1dc'
      })
      var sparkline2 = new Sparkline($('#sparkline-2')[0], {
        width: 240,
        height: 70,
        lineColor: '#f56954',
        endColor: '#f56954'
      })
      var sparkline3 = new Sparkline($('#sparkline-3')[0], {
        width: 240,
        height: 70,
        lineColor: '#3af221',
        endColor: '#3af221'
      })

      sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
      sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
      sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])

    })
  </script>

  <?php $this->load->view('_appshell/9foot'); ?>