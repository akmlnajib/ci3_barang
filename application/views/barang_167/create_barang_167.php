<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Create Barang</h2>
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
            <form method="post" action="<?php echo base_url(); ?>barang_167/save">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="kd_barang" id="kd_barang" value="BRG<?php echo sprintf("%04s", $kd_barang) ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang">
                </div>
                <div class="form-group">
                    <label for="harga">Harga Satuan</label>
                    <input type="text" class="form-control" name="harga">
                </div>
                <div class="form-group">
                    <label for="qty_masuk">QTY</label>
                    <input type="text" class="form-control" name="qty_masuk">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>