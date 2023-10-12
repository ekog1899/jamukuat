<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Perkara Eksekusi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_perkara_eksekusi; ?> Perkara</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-balance-scale fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-5 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Selesai / Pencabutan Permohonan Eksekusi
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $perkara_eksekusi_selesai; ?> Perkara</div>
                                </div>
                                <!-- <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Dalam Proses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    $dalam_proses=$count_perkara_eksekusi-$perkara_eksekusi_selesai-$perkara_eksekusi_menggantung;
                                echo $dalam_proses
                                ?> Perkara
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <!--
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pengadilan Agama</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_satker; ?> Satker</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-university fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Perkara Eksekusi HT</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_perkara_eksekusi_ht; ?> Perkara</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-balance-scale fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-5 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Selesai / Pencabutan Permohonan Eksekusi
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $perkara_eksekusi_ht_selesai; ?> Perkara</div>
                                </div>
                                <!-- <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                DALAM PROSES</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    $dalam_proses=$count_perkara_eksekusi_ht-$perkara_eksekusi_ht_selesai-$perkara_eksekusi_ht_menggantung;
                                echo $dalam_proses
                                ?> Perkara
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Integrasi Data SIPP - Jamu Kuat</h6>
                    <div class="dropdown no-arrow">
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row mb-3">
                        <button class="btn btn-primary btn-sm"  onclick="<?php echo $singkron_all?>"><i class="fas fa-sync-alt"></i> Singkron Semua Data</button>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <thead><tr><th>No</th><th>Jenis Data</th><th>Singkronisasi Terakhir</th><th>Aksi</th></tr></thead>
                            <tbody>
                                <tr><td>1</td><td>Perkara Eksekusi</td><td>-</td><td><button class="btn btn-primary btn-sm"  onclick="<?php echo $singkron_eksekusi?>"><i class="fas fa-sync-alt"></i> Singkron</button></td></tr>
                                <tr><td>2</td><td>Perkara Eksekusi HT</td><td>-</td><td><button class="btn btn-primary btn-sm" onclick="<?php echo $singkron_eksekusi_ht?>"><i class="fas fa-sync-alt"></i> Singkron</button></td></tr>
                                <tr><td>3</td><td>Pihak</td><td>-</td><td><button class="btn btn-primary btn-sm"  onclick="<?php echo $singkron_pihak?>"><i class="fas fa-sync-alt"></i> Singkron</button></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Perkara Eksekusi Pengadilan Agama Se-Jateng</h6>
                    <div class="dropdown no-arrow">
                        <!-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a> -->
                        <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div> -->
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 
<!-- .modal -->
    <div class="modal fade" id="Mymodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Silahkan Tunggu</h4>                                                             
                </div> 
                <div class="modal-body">
                    Proses sedang dilakukan
                </div>   
                <div class="modal-footer">
                </div>
            </div>                                                                       
        </div>                                          
    </div>
    <!-- .modal -->
<!-- Page level custom scripts -->
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php echo $tahun; ?>],
    datasets: [{
      label: "Perkara Eksekusi",
      backgroundColor: "#13a10e",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#13a10e",
      borderWidth: 2,
      data: [<?php echo $val; ?>],
      
    }],
  },
  options: {
    title: {
        display: true,
        text: 'PERKARA EKSEKUSI PENGADILAN AGAMA SE-JAWA TENGAH',
    },
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: "Tahun"
      },
        time: {
          unit: 'Tahun'
        },
        gridLines: {
          display: true,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: "Jumlah Perkara"
      },
        ticks: {
          min: 0,
        //   max: 15000,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: true,
      position: 'bottom'
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});


</script>
<script type="text/javascript">
    function singkron_eksekusi_ht(){
        $("#Mymodal").modal("show");
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url('singkron/eksekusi_ht')?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
          if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
            $("#Mymodal").modal("hide");
          }
        }
        xhr.send();
    }
    function singkron_eksekusi(){
        $("#Mymodal").modal("show");
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url('singkron/eksekusi')?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
          if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
            $("#Mymodal").modal("hide");
          }
        }
        xhr.send();
    }
    function singkron_pihak(){
        $("#Mymodal").modal("show");
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url('singkron/pihak')?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
          if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
            $("#Mymodal").modal("hide");
          }
        }
        xhr.send();
    }
    function singkron_all(){
        $("#Mymodal").modal("show");
        var xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo base_url('singkron/singkron_all')?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
          if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
            $("#Mymodal").modal("hide");
          }
        }
        xhr.send();
    } 
</script>