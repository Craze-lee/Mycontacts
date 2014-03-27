<?php if(!defined("BASEPATH")) exit('No script to access');
 
class Register extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->view("register");
    }
    public function reg(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('pswd','Password','required|matches[rpswd]');
        $this->form_validation->set_rules('rpswd','Confer passwod','required');
        if($this->form_validation->run()==FALSE){
            echo validation_errors();
        }else{
            $email = $_POST['email'];
            $pswd = $_POST['pswd'];
            if($this->user_model->add_user($email,$pswd)){
                $this->load->view('login');
            }else{
                echo "Register faild!";
            }
        }
    }
    public function check_is_user(){
        header("Content-Type:text/xml;charset=utf-8");
        header("Cache-Control:no-cache");

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        if($this->form_validation->run()==FALSE){
            $info = "<res><mes>请输入正确格式</mes></res>";
        }else{
            $is_registered = $this->user_model->is_registered($_POST['email']);
            if($is_registered == 1){
                $info = "<res><mes>该邮箱已注册</mes></res>";
            }else{
                $info = "<res><mes>邮箱可注册</mes></res>";
            }
        }
        echo $info;
    }
}
