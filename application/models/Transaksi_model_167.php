<?php defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi_model_167 extends CI_Model
{
    private $table = "transaksi";

    //Cek kode barang
    public function cekkd()
    {
        $query = $this->db->query("SELECT MAX(kd_transaksi) as kd_transaksi from transaksi");
        $hasil = $query->row();
        return $hasil->kd_transaksi;
    }
    public function getAll()
    {
        // Tarik harga barang dari tabel barang
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.kd_pelanggan = pelanggan.kd_pelanggan');
        $this->db->join('barang', 'transaksi.kd_barang = barang.kd_barang');
        $query = $this->db->get();
        return $query->result(); 
    }

    public function cancelconfir(){
        return $this->db->query("UPDATE transaksi SET status = '0' where kd_transaksi");
    }
    public function get_total(){
        $sql = $this->db->query("SELECT qty_keluar * harga from transaksi");
        return $sql->result();
    }
    // Function tarik data dari pelanggan 
    public function getpelanggan()
    {
        $p = $this->db->query("Select kd_pelanggan,nama_pelanggan FROM pelanggan Order BY kd_pelanggan ASC");
        return $p->result();
    }

    // Function tarik data dari barang
    public function getbarang()
    {
        $b = $this->db->query("Select kd_barang,nama_barang,harga FROM barang Order BY kd_barang ASC");
        return $b->result();
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["kd_transaksi" => $id])->row();
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('kd_transaksi' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("kd_transaksi" => $id));
    }

    public function get_pelanggan()
    {
        $query = $this->db->get('pelanggan');
        return $query->result();
    }

    public function get_barang()
    {
        $query = $this->db->get('barang');
        return $query->result();
    }
}//$query  = mysqli_query($koneksi, "SELECT * FROM post WHERE post.statuspost = '1' ORDER BY id DESC"); 