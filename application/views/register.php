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

                    <?php echo $this->session->flashdata('message'); ?>

                    <form class="user" method="post" action="<?php echo base_url('auth/register'); ?>">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-user" maxlength="20" id="username" placeholder="Username" value="<?php set_value('username'); ?>">
                            <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                            <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Daftar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>