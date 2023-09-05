<main role="main" class="container">
    <center>
        <h3> MASTER DATA Transaksi</h3>
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
    <?php
    if ($this->session->flashdata('delete')) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('delete'); ?>
        </div>
        </div>
        <?php
    }
    ?>
    <div class="card">
        <div class="card-body">
            <a href="<?php echo base_url(); ?>transaksi_167/create" class="btn btn-success">Create</a>
            <br />
            <br />
            <table class="table table-bordered">
                <tr>
                    <th width="5%">No</th>
                    <th>Kode Transaksi</th>
                    <th>Kode Pelanggan</th>
                    <th>Kode Barang</th>
                    <th>Harga Satuan</th>
                    <th>Qty Awal</th>
                    <th>Qty Sisa</th>
                    <th>Harga Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no = 1;
                foreach ($transaksi as $row) {
                    ?>
                    <tr>
                        <td widtd="5%">
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?= $row->kd_transaksi; ?>
                        </td>
                        <td>
                            <?= $row->kd_pelanggan; ?>
                        </td>
                        <td>
                            <?= $row->kd_barang; ?>
                        </td>
                        <td>
                            <?= $row->harga; ?>
                        </td>
                        <td>
                            <?= $row->qty_masuk; ?>
                        </td>
                        <td>
                            <?= $row->qty_barang; ?>
                        </td>
                        <td>
                            <?= $row->qty_keluar * $row->harga; ?>
                        </td>
                        <!---- <td>
                            <?php
                            if ($row->status == 1) {
                                echo '<button type="button" class="btn btn-info">Cancel Confirm</button>';
                            }
                            ?></td> ---->
                        <td>
                            <?php if ($row->status == 1) {
                                echo '<button type="button" class="btn btn-success">Confirm</button>';
                            } else {
                                echo '<button type="button" class="btn btn-danger">Not Confirm</button>';
                            }
                            ?>
                        </td>
                        <td align="center">
                            <a href="<?php echo base_url(); ?>Transaksi_167/edit/<?php echo $row->kd_transaksi; ?>"
                                class="btn btn-warning">Edit</a><P></P>
                            <a href="<?php echo base_url(); ?>Transaksi_167/delete/<?php echo $row->kd_transaksi; ?>"
                                class="btn btn-danger mb-10">Hapus</a>
                                <p></p>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</main>