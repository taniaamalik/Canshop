<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index(){
        $data['product'] = $this->modelsData->getProduct();
        $this->load->view('header');
        $this->load->view('view_home',$data);
        $this->load->view('footer');
    }

    public function katalog(){
        $data['product'] = $this->modelsData->getProduct();
        $this->load->view('header');
        $this->load->view('katalog',$data);
        $this->load->view('footer');
    }

    public function about(){
        $this->load->view('header');
        $this->load->view('about');
        $this->load->view('footer');
    }

    public function contact() {
        $this->load->view('header');
        $this->load->view('contact');
        $this->load->view('footer');
    }

    public function testimoni() {
        $this->load->view('header');
        $this->load->view('testimoni');
        $this->load->view('footer');
    }

    public function cart($id) {
        //$data['cart'] = $this->modelsData->getCart($id);
        $data['product'] = $this->modelsData->getProductCart($id);
        $this->load->view('header');
        $this->load->view('cart',$data);
        $this->load->view('footer');
    }

    public function detail($id){
        $data['product'] = $this->modelsData->getDetailProduct($id);
        $this->load->view('header');
        $this->load->view('detail',$data);
        $this->load->view('footer');   
    }

    public function profile($id){
        $data['profile'] = $this->modelsData->getProfile($id);
        $this->load->view('header');
        $this->load->view('profile',$data);
        $this->load->view('footer');   
    }

    public function updateProfile(){
        $id = $this->uri->segment(3);
        $datap['profile'] = $this->modelsData->getProfile($id);

        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 2048;

        $this->load->library('upload',$config);
  
        if(!$this->upload->do_upload('pic')){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            $this->load->view('header');
            $this->load->view('profile',$datap);
            $this->load->view('footer');
        } else {
            $result=$this->upload->data();
            $uploaded=array('picture'=>$result);
            $password = $this->input->post('password');
            $repassword = $this->input->post('repassword');
            if($password!=$repassword){
                 echo "<script>
                        window.location.href='".base_url("home/profile/$id")."';  
                        alert('Password Mismatch!');
                        </script>";
            } else {
        $data=array(
            'namaCust'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'password'=>$this->input->post('password'),
            'noHP'=>$this->input->post('phone'),
            'alamatCust'=>$this->input->post('alamat'),
            'bankCust'=>$this->input->post('bank'),
            'password'=>$this->input->post('password'),
            'rekening'=>$this->input->post('rekening'),
            'foto'=>$uploaded['picture']['file_name']
        );
        $query = $this->modelsData->update_profile($id,$data);
        if($query){
            echo "<script>  
                alert('Update Failed!');
             </script>";
        } else {
            echo "<script> 
                window.location.href='".base_url("home/profile/$id")."'; 
                alert('Update Success!');
             </script>";
            }
        }
    }
}
       public function addToCart(){
            $id = $this->uri->segment(3);
            $id_user = $this->session->userdata("id");
            $data=array(
                'id_cust'=>$id_user,
                'id_product'=>$id,
                'tanggalPesan'=>date('Y-m-d H:i:s'),
                'jumlah'=>$this->input->post('num-product'),
                'stat'=>0
            );
            $this->modelsData->tambah_data($data);
            redirect(base_url("home/cart/$id_user"));
        }

        public function updateqty($id){
            $qty=$this->input->post('num');
            $id_user=$this->session->userdata("id");
            $data=array(
               'jumlah' => $qty  
            );

            $this->modelsData->updateJumlah($id,$data);
            redirect(base_url("home/cart/$id_user"));
        }

        public function checkout(){
            $id = $this->session->userdata("id");
            $tambahHarga = $this->input->post('select');
            if($tambahHarga == "DKI Jakarta"){
                $tambahan = 20000;
            } elseif ($tambahHarga == "Jawa Timur") {
                $tambahan = 10000;
            } elseif ($tambahHarga == "Jawa Barat") {
                $tambahan = 15000;
            }
            $data = array(
                'total_pembayaran' => ($this->input->post('total') + $tambahan),
                'provinsi' => $tambahHarga,
                'kota' => $this->input->post('kota'),
                'alamat' => $this->input->post('alamat'),
                'kode_pos' => $this->input->post('postcode'),
                'id_customer'=> $id,
                'status_pembayaran' => 0
            );
            $this->modelsData->tambahPembayaran($data);
            redirect(base_url("home/pembayaran/$id"));
        }

        public function pembayaran($id){
            $data['pembayaran'] = $this->modelsData->getDataPembayaran($id);
            $this->load->view('pembayaran',$data);
            //$this->load->view('footer');
        }

        public function berhasil(){
            $this->load->view('berhasil');
        }

        public function addMetode($id){
            $data=array(
                'metode_pembayaran'=>$this->input->post('atm_card')
            );
            $this->modelsData->tambahMetode($id,$data);
            redirect(base_url('home/berhasil'));
        }

        public function historyPembelian(){
            $id = $this->session->userdata("id");
            $data['history'] = $this->modelsData->getProductCart($id);
            $data['pembayaran'] = $this->modelsData->getPembayaranHistory($id);
            $this->load->view('history',$data);
        }
}