<main role="main" class="container">
    <center>
        <h3> MASTER DATA BARANG</h3>
    </center>

    <?php
    if ($this->session->flashdata('sukses')) {
        ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('sukses'); ?>
        </div>
        </div>
        <?php
    } else if($this->session->flashdata('delete')){ ?>
    <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('delete'); ?>
        </div>
<?php
    }
    ?>
    <div class="card">
        <div class="card-body">
            <a href="<?php echo base_url(); ?>barang_167/create" class="btn btn-success">Create</a>
            <br />
            <br />
            <table class="table table-bordered">
                <tr>
                    <th width="5%">No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no = 1;
                foreach ($barang as $row) {
                    ?>
                    <tr>
                        <td widtd="5%">
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $row->kd_barang; ?>
                        </td>
                        <td>
                            <?php echo $row->nama_barang; ?>
                        </td>
                        <td>
                            <?php echo $row->harga; ?>
                        </td>
                        <td align="center">
                            <a href="<?php echo base_url(); ?>barang_167/edit/<?php echo $row->kd_barang; ?>"
                                class="btn btn-warning">Edit</a>
                            <a href="<?php echo base_url(); ?>barang_167/delete/<?php echo $row->kd_barang; ?>"
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