<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Create Delivery</h2>
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
            <form method="post" action="<?php echo base_url(); ?>pengiriman_167/save">
                <!-- Kode transaksi ini mestinya dibuat otomatis -->
                <div class="form-group">
                    <input type="text-input" class="form-control" name="kd_pengiriman" id="kd_pengiriman" value="DEL<?php echo sprintf("%04s", $kd_pengiriman) ?>" readonly>
                </div>
                <!-- Contohnya TRAN001 sampai dengan TRAN999 -->
                <!-- Kalian bisa pakai enkripsi md5 / sha 256 -->
                
                <div class="form-group">
                    <label for="text-input">Kode Barang</label>
                    <select name="kd_transaksi" class="form-control" id="kd_transaksi" onchange="pilih_transaksi()">
                        <option>-Pilih Kode Barang-</option>
                        <?php foreach ($transaksi as $key): ?>
                            <option value="<?php echo $key->kd_transaksi ?>">
                                <?php echo $key->kd_transaksi?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <!-- Buatlah view dropdown dari tabel barang ambil kode barang dan nama barang -->
                    <!-- propoerti value formnya diisi kode barang -->
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">

    function pilih_transaksi() {
        var kd_transaksi = $("#kd_transaksi").val();
        $.ajax({
            url: "<?php echo base_url() ?>index.php/transaksi_167/menampilkan_transaksi",
            data: "kd_transaksi=" + kd_transaksi,
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $("#kd_pelanggan").val(data.kd_pelanggan);
                $("#nama_pelanggan").val(data.nama_pelanggan);
                $("#kd_barang").val(data.kd_barang);
                $("#nama_barang").val(data.nama_barang);
                $("#qty_keluar").val(data.qty_keluar);

            }
        });
    }

    $(function () {
        $(document).ready(function () {
            $('#kd_transaksi').select2()
        });
    });
</script>