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

<script src="/public/assets/assets/demo/chart-bar-demo.js"></script>
<?= $this->endSection() ?>