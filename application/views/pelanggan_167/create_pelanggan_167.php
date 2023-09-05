<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Create Pelanggan</h2>
        </div>
        <div class="card-body">
            <?php
            if (validation_errors() != false) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
                <?php
            }
            ?>
            <form method="post" action="<?php echo base_url(); ?>pelanggan_167/save">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="kd_pelanggan" id="kd_pelanggan" value="PLG<?php echo sprintf("%04s", $kd_pelanggan) ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="nama_depan">Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama_pelanggan">
                </div>
                <div class="form-group">
                    <label for="member">Member</label>
                    <select class="form-control selectlive" name="member" required>
                        <option value="" selected disabled>- pilih -</option>
                        <option value="VVVIP">VVIP</option>
                        <option value="VVIP">VVIP</option>
                        <option value="VIP">VIP</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>