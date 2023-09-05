<div class="container">
    <div class="card">
        <div class="card-header">Edit Barang</div>
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
            <form method="post" action="<?php echo base_url(); ?>barang_167/update">
                <input type="hidden" name="kd_barang" id="kd_barang" value="<?php echo $barang->kd_barang; ?>" />
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" value="<?php echo $barang->nama_barang; ?>" class="form-control"
                        name="nama_barang">
                </div>
                <div class="form-group">
                    <label for="no_telp">Harga</label>
                    <input type="text" class="form-control" value="<?php echo $barang->harga; ?>" name="harga">
                </div>
                <div class="form-group">
                    <label for="qty_masuk">Qty</label>
                    <input type="text" class="form-control" value="<?php echo $barang->qty_masuk; ?>" name="qty_masuk">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>