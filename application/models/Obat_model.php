<?php

class Obat_model extends CI_Model
{
    public function getJenis(){
        return $this->db->get('tb_jenis_obat')->result_array();
    }
    public function addJenis(){
        $data = array(
            'nama_jenis_obat' => $this->input->post('nama_jenis_obat')
    );
    
    $this->db->insert('tb_jenis_obat', $data);
    }
    public function hapusJenis($id)
    {
        $this->db->where('id_jenis_obat',$id);
        $this->db->delete('tb_jenis_obat');
    }
    public function getDataJenisId($id)
    {
        return $this->db->get_where('tb_jenis_obat',['id_jenis_obat'=>$id])->row_array();
    }
    public function editJenis(){
        $data = array(
            'nama_jenis_obat' => $this->input->post('nama_jenis_obat')
    );
    $this->db->where('id_jenis_obat',$this->input->post('id'));
    $this->db->update('tb_jenis_obat', $data);
    }
    public function addObat(){
        $data = array(
            'id_jenis_obat' => $this->input->post('id_jenis_obat'),
            'nama_obat' => $this->input->post('nama_obat'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'tanggal_expired' => $this->input->post('tanggal_expired'),
    );
    
    $this->db->insert('tb_obat', $data);
    }
    public function getObat(){
        $this->db->join('tb_jenis_obat', 'tb_obat.id_jenis_obat = tb_jenis_obat.id_jenis_obat');
        $this->db->select('tb_obat.id_obat, tb_jenis_obat.nama_jenis_obat, tb_obat.nama_obat, tb_obat.satuan, tb_obat.harga, tb_obat.stok, tb_obat.tanggal_expired');
        return $this->db->get('tb_obat')->result_array();
    }
    public function hapusObat($id)
    {
        $this->db->where('id_obat',$id);
        $this->db->delete('tb_obat');
    }
    public function DataObatId($id)
    {
        return $this->db->get_where('tb_obat',['id_obat'=>$id])->row_array();
    }
    public function editObat(){
        $data = array(
            'id_jenis_obat' => $this->input->post('id_jenis_obat'),
            'nama_obat' => $this->input->post('nama_obat'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'tanggal_expired' => $this->input->post('tanggal_expired'),
    );
    $this->db->where('id_obat',$this->input->post('id'));
    $this->db->update('tb_obat', $data);
    }
    public function addUser(){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'fullname' => $this->input->post('fullname'),
            'is_active' => $this->input->post('is_active'),
    );
    
    $this->db->insert('tb_user', $data);
    }
    public function getUser(){
        return $this->db->get('tb_user')->result_array();
    }
    public function hapusUser($id){
        $this->db->where('id_user',$id);
        $this->db->delete('tb_user');
    }
    public function DataUserId($id)
    {
        return $this->db->get_where('tb_user',['id_user'=>$id])->row_array();
    }
    public function editUser(){
        $data = array(
            'username' => $this->input->post('username'),
            'fullname' => $this->input->post('fullname'),
            'is_active' => $this->input->post('is_active'),
    );
    $this->db->where('id_user',$this->input->post('id'));
    $this->db->update('tb_user', $data);
    }
}