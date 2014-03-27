<?php if( !defined('BASEPATH') ) exit('No direct srcipt access allowed');

class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->view('login');
    }
    public function match(){
        //表单验证
        $this->load->library("form_validation");
        $this->form_validation->set_rules("email","Email", "required|valid_email");
        $this->form_validation->set_rules("pswd","Password","required");
        if($this->form_validation->run() == FALSE){
            echo validation_errors();
        }else{
            //验证表单成功后
            $email = $_POST['email'];
            $pswd = $_POST['pswd'];
            $is_user = $this->user_model->is_user($email, $pswd);
            $uid = $this->user_model->get_uid($email); 
            if($is_user){
                $userinfo = array("email"=>$email,"uid"=>$uid, "is_logined"=>TRUE);
                $this->session->set_userdata($userinfo);
                redirect('home');
            }else{
                echo "邮箱或密码不正确";
            }
        }
    }
}
