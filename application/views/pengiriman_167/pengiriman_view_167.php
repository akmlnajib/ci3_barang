<main role="main" class="container">
    <center>
        <h3> MASTER DATA PENGIRIMAN</h3>
    </center>
    <?php
    if ($this->session->flashdata('sukses')) {
	?>
    <div class="alert alert-success" role="alert">
  <?php echo $this->session->flashdata('sukses'); ?>
</div>
    </div>
        <?php
}
?>
    <div class="card">
        <div class="card-body">
            <a href="<?php echo base_url(); ?>pengiriman_167/create" class="btn btn-success">Create</a>
            <br />
            <br />
            <table class="table table-bordered">
                <tr>
                    <th width="5%">No</th>
                    <th>Kode Delivery</th>
                    <th>Kode Transaksi</th>
                    <th>Pelanggan</th>
                    <th>Barang</th>
                    <th>Qty</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no = 1;
                foreach ($pengiriman as $row) {
                    ?>
                    <tr>
                        <td widtd="5%">
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $row->kd_pengiriman;?>
                        </td>
                        <td>
                            <?php echo $row->kd_transaksi;?>
                        </td>
                        <td>
                            <?php echo $row->kd_pelanggan . "-" . $row->nama_pelanggan;?>
                        </td>
                        <td>
                            <?php echo $row->kd_barang . "-" . $row->nama_barang;?>
                        </td>
                        <td>
                            <?php echo $row->qty_keluar; ?>
                        </td>
                        <td align="center">
                            <a href="<?php echo base_url(); ?>pengiriman_167/edit/<?php echo $row->kd_pengiriman; ?>"
                                class="btn btn-warning">Edit</a>
                            <a href="<?php echo base_url(); ?>pengiriman_167/delete/<?php echo $row->kd_pengiriman; ?>"
                                class="btn btn-danger">Hapus</a>

                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</main>