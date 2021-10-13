<div class="container-fluid">
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <div class="card mb-3">
        <div class="card-body">

            <form action="<?php echo site_url('pelanggan/index') ?>" method="post">
                <div class="form-group">
                    <label for="nama_depan">Nama Depan*</label>
                    <input class="form-control <?php echo form_error('nama_depan') ? 'is-invalid' : '' ?>" type="text" name="nama_depan" placeholder="Nama Depan" />
                    <div class="invalid-feedback">
                        <?php echo form_error('nama_depan') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama_belakang">Nama Belakang*</label>
                    <input class="form-control <?php echo form_error('nama_belakang') ? 'is-invalid' : '' ?>" type="text" name="nama_belakang" placeholder="Nama Belakang" />
                    <div class="invalid-feedback">
                        <?php echo form_error('nama_belakang') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="no_telp">No. Telephone*</label>
                    <input class="form-control <?php echo form_error('no_telp') ? 'is-invalid' : '' ?>" type="number" name="no_telp" placeholder="Nomor Telephone" />
                    <div class="invalid-feedback">
                        <?php echo form_error('no_telp') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email*</label>
                    <input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="text" name="email" placeholder="Email" />
                    <div class="invalid-feedback">
                        <?php echo form_error('email') ?>
                    </div>
                </div>

                <input class="btn btn-success" type="submit" name="btn" value="Save" />

                <!-- <div class="card-header">
                    <a href="<?php echo site_url('menu/index') ?>"><i class="fas fa-arrow-right"></i> Berikutnya</a>
                </div> -->
            </form>

        </div>

        <div class="card-footer small text-muted">
            * required fields
        </div>

    </div>
    <!-- /.container-fluid -->