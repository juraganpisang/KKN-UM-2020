<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
    </div>

    <div class="row">
        <div class="col">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                <h3>Hi, <?= $this->session->username; ?><BR>Semoga hari mu menyenangkan!</h3>
                </div>
            </div>
        </div>
    </div>
</div>