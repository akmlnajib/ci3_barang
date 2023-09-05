<?php defined('BASEPATH') or exit('No direct script access allowed');
class pelanggan_model_167 extends CI_Model
{
    private $table = "pelanggan";
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["kd_pelanggan" => $id])->row();
    }
    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('kd_pelanggan' => $id));
    }
    public function delete($id)
    {
        return $this->db->delete($this->table, array("kd_pelanggan" => $id));
    }
    public function cekkd()
    {
        $query = $this->db->query("SELECT MAX(kd_pelanggan) as kd_pelanggan from pelanggan");
        $hasil = $query->row();
        return $hasil->kd_pelanggan;
    }
}