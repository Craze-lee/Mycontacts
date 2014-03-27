<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata("is_logined")==FALSE){
            redirect("login");
        }
    }
    public function index(){
        //获得所有联系人信息并传到home view
        $uid = $this->session->userdata("uid");
        $contacts = $this->contact_model->get_all_contacts($uid);
        $this->load->view("home",array("contacts"=>$contacts));
    }
    public function add(){
        $this->load->view("add");
    }
    public function add_contact(){
        //验证表单信息
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name","Name","trim|required|xss_clean");
        $this->form_validation->set_rules("email","Email","trim|required|valid_email");
        $this->form_validation->set_rules("phone","Phone","trim|required|min_length[6]|max_length[16]");
        $this->form_validation->set_rules("address","Address","trim|max_length[50]|xss_clean");
        if($this->form_validation->run() == FALSE){
            echo validation_errors();
        }else{
            $contact = array('name'=>$_POST['name'],'email'=>$_POST['email'],
                'phone'=>$_POST['phone'],  'address'=>$_POST['address']);
            $is_inserted = $this->contact_model->add($contact);
            if($is_inserted == 1){
                echo "Add Succeed";
                redirect('home/index');
            }else{
                echo "Add Faild";
                redirect('home/add');
            }
        }
    }

    /**
     * 退出系统
     */
    public function logout(){
        //销毁session
        $this->session->set_userdata(array('is_logined'=>FALSE));
        $this->session->sess_destroy();
        redirect('login');
    }
}
