<?= $this->extend('layouts/template.php') ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <!-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol> -->
    <br>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Data Core Ship</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Data Core Ship
                </div>
                <div class="card-body"><canvas id="myBarChart" width="200%" height="100"></canvas></div>
                <script src="/public/assets/assets/demo/chart-bar-demo.js"></script>
            </div>
        </div>
    </div>
</div>



<!-- ============================ -->
<!--    BARCHART UNTUK DEPTH -->
<!-- ============================ -->

<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");


var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["0 - 2200", "2201 - 4400", "4401 - 6600", "6601 - 8800", "8801 - 11100"],
    datasets: [{
      label: "Jumlah",
      backgroundColor: "rgba(255, 165, 0)",
      borderColor: "rgba(2,117,216,1)",
      data: [
            <?= $depth['kurang2200']->jumlah ?>,
            <?= $depth['kurang4400']->jumlah ?>,
            <?= $depth['kurang6600']->jumlah ?>,
            <?= $depth['kurang8800']->jumlah ?>,
            <?= $depth['kurang11100']->jumlah ?>,
      ],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        type: 'category',
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 12000, 
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
    
</script>
<?= $this->endSection() ?>