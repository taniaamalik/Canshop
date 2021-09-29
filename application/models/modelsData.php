<?php
class ModelsData extends CI_Model{
    public function getProduct(){
        $query = $this->db->get('product');
        return $query->result_array();
    }

    public function getDetailProduct($id){
        $query = $this->db->get_where('product', array('id_product'=>$id))->result_array();
        return $query;
    }

    public function getProfile($id){
        $query = $this->db->get_where('customer', array('id'=>$id))->result_array();
        return $query;
    }

    public function update_profile($id,$data){
        $this->db->where('id',$id);
        $this->db->update('customer',$data);
    }

    public function getIdCustomer($email){
        $query = $this->db->get_where('customer', array('email'=>$email))->result_array();
        foreach ($query as $row)
        {
            $id = $row['id'];
        }
        return $id;
    }

    public function getCustomer($email,$password){
        $param = array('email'=> $email, 'password' => $password);
        $row = $this->db->select('*')->from('customer')->where($param);
        $hasil =  $this->db->get();
            if($hasil->num_rows()==1){
                return true;
            } else {
                return false;
            }
    }

    public function getProductCart($id){
        $query = "SELECT * from cart as c join product as p WHERE c.id_product = p.id_product AND c.id_cust = ? AND c.stat = 0";
        $result = $this->db->query($query, array($id))->result_array();
        return $result;
    }

    public function register($data){
        $this->db->insert('customer',$data);
    }

    public function tambah_data($data){
        $this->db->insert('cart',$data);
    }

    public function updateJumlah($id,$data){
        $this->db->where('id',$id);
        $this->db->update('cart',$data);
    }
    public function tambahPembayaran($data){
        $this->db->insert('pembayaran',$data);
    }
    public function getDataPembayaran($id){
        return $this->db->get_where('pembayaran', array('id_customer'=>$id,'status_pembayaran'=>0))->result_array();
    }

    public function getIdPembayaran(){
        $query = "SELECT id_pembayaran from pembayaran order by id_pembayaran desc LIMIT 1";
        return $this->db->query($query)->result_array();
    }
    public function tambahMetode($id,$data){
        $this->db->where('id_pembayaran',$id);
        $this->db->update('pembayaran',$data);
    }

    public function getPembayaranHistory($id){
        $query = "SELECT * from cart as c join pembayaran as p WHERE c.id_pembayaran = p.id_pembayaran AND c.id_cust = ?";
        $result = $this->db->query($query, array($id))->result_array();
        return $result;
    }
}
?>