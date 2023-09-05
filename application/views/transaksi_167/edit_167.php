<div class="container">
    <div class="card">
        <div class="card-header">Edit Transaksi</div>
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
            <form method="post" action="<?php echo base_url(); ?>Transaksi_167/update">
                <input type="hidden" name="kd_transaksi" id="kd_transaksi" value="<?php echo $transaksi->kd_transaksi; ?>" />
                <div class="form-group">
                <div class="form-group">
                    <label for="text-input">Kode Pelanggan</label>
                    <select name="kd_pelanggan" class="form-control" id="kd_pelanggan" onchange="pilih_pelanggan()">
                        <option><?php echo $transaksi->kd_pelanggan;?></option>
                        <?php
                        //                        $list = $this->db->query("SELECT * FROM pelanggan");
                        foreach ($pelanggan as $row): ?>
                            <option value="<?php echo $row->kd_pelanggan ?>">
                                <?php echo $row->kd_pelanggan ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <!-- Buatlah view dropdown dari tabel pelanggan ambil kode pelanggan dan nama pelanggan tapi isiiannya otomatis narik dari tabel transaksi yang kode pelanggannya tersimpan lalu diikuti opsi pelanggan lainnya dari tabel pelanggan -->
                    <!-- propoerti value formnya diisi kode pelanggan -->
                </div>
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" value="<?php echo $transaksi->nama_pelanggan?>" readonly>
                </div>

                <div class="form-group">
                    <label for="text-input">Kode Barang</label>
                    <select name="kd_barang" class="form-control" id="kd_barang" onchange="pilih_barang()">
                        <option><?php echo $transaksi->kd_barang?></option>
                        <?php foreach ($barang as $key): ?>
                            <option value="<?php echo $key->kd_barang ?>">
                                <?php echo $key->kd_barang?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <!-- Buatlah view dropdown dari tabel barang ambil kode barang dan nama barang tapi isiiannya otomatis narik dari tabel transaksi yang kode barangnya tersimpan lalu diikuti opsi barang lainnya dari tabel barang -->
                    <!-- propoerti value formnya diisi kode barang -->
                </div>

                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?php echo $transaksi->nama_barang?>"  readonly>
                </div>
                
                <div class="form-group">
                    <label for="qty_keluar">Qty</label>
                    <input type="text" class="form-control" name="qty_keluar" id="qty_keluar" value="<?php echo $transaksi->qty_keluar?>">
                </div>
                <div class="form-group">
                    <label for="text-input">Status</label>
                    <select class="form-control selectlive" name="status" required>
                    <option value="<?php echo $transaksi->status; ?>" selected><?php echo $transaksi->status; ?></option>
                            <?php if($transaksi->status == 1 ){ ?>
                                <option value="0">0</option>
                                <?php
                            } else{ ?>
                                <option value="1">1</option>
                                <?php
                            }?>
                    </select>
                    
                <p>Note : </p>
                <p>1. Confirmation</p>
                <p>0. Unconfirmation</p>
                    <!-- Buatlah view dropdown dari tabel barang ambil kode barang dan nama barang tapi isiiannya otomatis narik dari tabel pelanggan ymember barangnya tersimpan lalu diikuti opsi barang lainnya dari tabel barang -->
                    <!-- propoerti value formnya diisi kode barang -->
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function pilih_pelanggan() {
        var kd_pelanggan = $("#kd_pelanggan").val();
        $.ajax({
            url: "<?php echo base_url() ?>index.php/transaksi_167/menampilkan_pelanggan",
            data: "kd_pelanggan=" + kd_pelanggan,
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $("#nama_pelanggan").val(data.nama_pelanggan);

            }
        });
    }
    function pilih_barang() {
        var kd_barang = $("#kd_barang").val();
        $.ajax({
            url: "<?php echo base_url() ?>index.php/transaksi_167/menampilkan_barang",
            data: "kd_barang=" + kd_barang,
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $("#nama_barang").val(data.nama_barang);
                $("#harga").val(data.harga);

            }
        });
    }

    $(function () {
        $(document).ready(function () {
            $('#kd_pelanggan').select2()
            $('#kd_barang').select2()
        });
    });
</script>