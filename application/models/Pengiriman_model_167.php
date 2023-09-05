<?php defined('BASEPATH') or exit('No direct script access allowed');
class pengiriman_model_167 extends CI_Model
{
    private $table = "pengiriman";

    //Cek kode barang
    public function cekkd()
    {
        $query = $this->db->query("SELECT MAX(kd_pengiriman) as kd_pengiriman from pengiriman");
        $hasil = $query->row();
        return $hasil->kd_pengiriman;
    }
    public function getAll()
    {
        // Tarik harga barang dari tabel barang
        $this->db->select('*');
        $this->db->from('pengiriman');
        $this->db->join('transaksi', 'pengiriman.kd_transaksi = transaksi.kd_transaksi');
        $query = $this->db->get();
        return $query->result(); 
    }
    // Function tarik data dari transaksi 
    public function gettransaksi()
    {
        $p = $this->db->query("SELECT * FROM transaksi WHERE transaksi.status = '1' ORDER BY kd_transaksi DESC");
        return $p->result();
    }

    // Function tarik data dari barang
    public function get_transaksi()
    {
        $b = $this->db->query("Select * FROM transaksi Order BY kd_transaksi ASC");
        return $b->result();
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["kd_pengiriman" => $id])->row();
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('kd_pengiriman' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("kd_pengiriman" => $id));
    }


    public function get_barang()
    {
        $query = $this->db->get('barang');
        return $query->result();
    }
}