<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Create Transaksi</h2>
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
            <form method="post" action="<?php echo base_url(); ?>Transaksi_167/save">
                <!-- Kode transaksi ini mestinya dibuat otomatis -->
                <div class="form-group">
                    <label>Kode Transaksi</label>
                    <input type="text-input" class="form-control" name="kd_transaksi" id="kd_transaksi" value="TRX<?php echo sprintf("%04s", $kd_transaksi) ?>" readonly>
                </div>
                <!-- Contohnya TRAN001 sampai dengan TRAN999 -->
                <!-- Kalian bisa pakai enkripsi md5 / sha 256 -->
                <div class="form-group">
                    <label for="text-input">Kode Pelanggan</label>
                    <select name="kd_pelanggan" class="form-control" id="kd_pelanggan" onchange="pilih_pelanggan()">
                        <option>-Pilih Kode Pelanggan-</option>
                        <?php
                        //                        $list = $this->db->query("SELECT * FROM pelanggan");
                        foreach ($pelanggan as $row): ?>
                            <option value="<?php echo $row->kd_pelanggan ?>">
                                <?php echo $row->kd_pelanggan ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <!-- Buatlah view dropdown dari tabel pelanggan ambil kode pelanggan dan nama pelanggan -->
                    <!-- propoerti value formnya diisi kode pelanggan -->
                </div>
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" readonly>
                </div>
                <div class="form-group">
                    <label for="text-input">Kode Barang</label>
                    <select name="kd_barang" class="form-control" id="kd_barang" onchange="pilih_barang()">
                        <option>-Pilih Kode Barang-</option>
                        <?php foreach ($barang as $key): ?>
                            <option value="<?php echo $key->kd_barang ?>">
                                <?php echo $key->kd_barang?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <!-- Buatlah view dropdown dari tabel barang ambil kode barang dan nama barang -->
                    <!-- propoerti value formnya diisi kode barang -->
                </div>

                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" readonly>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Satuan</label>
                    <input type="text" class="form-control" name="harga" id="harga" readonly>
                </div>
                </div>
                <div class="form-group">
                    <label for="qty_keluar">Qty</label>
                    <input type="text" class="form-control" name="qty_keluar" id="qty_keluar">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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