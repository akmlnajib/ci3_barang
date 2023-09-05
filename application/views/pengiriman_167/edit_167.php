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
            <form method="post" action="<?php echo base_url(); ?>pengiriman_167/update">
                <input type="hidden" name="kd_pengiriman" id="kd_pengiriman" value="<?php echo $pengiriman->kd_pengiriman; ?>" />
                <div class="form-group">
                <div class="form-group">
                    <label for="text-input">Kode Transaksi</label>
                    <select name="kd_transaksi" class="form-control" id="kd_transaksi" onchange="pilih_pelanggan()">
                        <option><?php echo $pengiriman->kd_transaksi;?></option>
                        <?php
                        //                        $list = $this->db->query("SELECT * FROM pelanggan");
                        foreach ($transaksi as $row): ?>
                            <option value="<?php echo $row->kd_transaksi ?>">
                                <?php echo $row->kd_transaksi ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <!-- Buatlah view dropdown dari tabel pelanggan ambil kode pelanggan dan nama pelanggan tapi isiiannya otomatis narik dari tabel pengiriman yang kode pelanggannya tersimpan lalu diikuti opsi pelanggan lainnya dari tabel pelanggan -->
                    <!-- propoerti value formnya diisi kode pelanggan -->
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
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