<div class="container">
    <div class="card">
        <div class="card-header">Edit Pelanggan</div>
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
            <form method="post" action="<?php echo base_url(); ?>pelanggan_167/update">
                <input type="hidden" name="kd_pelanggan" id="kd_pelanggan" value="<?php echo $pelanggan->kd_pelanggan; ?>" />
                <div class="form-group">
                    <label for="nama">Nama Depan Pelanggan</label>
                    <input type="text" value="<?php echo $pelanggan->nama_pelanggan; ?>" class="form-control"
                        name="nama_pelanggan">
                </div>
                <div class="form-group">
                    <label for="text-input">Member</label>
                    <select class="form-control selectlive" name="member" required>
                            <option value="<?php echo $pelanggan->member; ?>" selected><?php echo $pelanggan->member; ?></option>
                            <?php if($pelanggan->member == 'VVVIP'){ ?>
                                <option value="VVIP">VVVIP</option>
                                <option value="VIP">VIP</option>
                                <?php
                            } else if($pelanggan->member == 'VVIP'){
                                ?>
                                <option value="VVVIP">VVVIP</option>
                                <option value="VIP">VIP</option>
                                <?php
                            } else{ ?>
                                <option value="VVVIP">VVVIP</option>
                                <option value="VVIP">VVIP</option>
                                <?php
                            }?>
                    </select>
                    <!-- Buatlah view dropdown dari tabel barang ambil kode barang dan nama barang tapi isiiannya otomatis narik dari tabel pelanggan ymember barangnya tersimpan lalu diikuti opsi barang lainnya dari tabel barang -->
                    <!-- propoerti value formnya diisi kode barang -->
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>