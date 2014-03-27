<?php if(!defined('BASEPATH')) exit("No direct script access allowed");

class User_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    /**
     * is_registered() 判断用户是否已注册
     * @access public
     * @param $email
     * return boolean 已注册返回1，否则返回0
     */
    public function is_registered($email){
        $query = $this->db->get_where('users',array('email'=>$email));
        if($query->num_rows==1){
            return 1;
        }else{
            return 0;
        }
    }
    /**
     * is_user 判断是否存在该用户
     * @access public
     * @param $email $password
     * @return boolean 是返回1，否则返回0
     */
    public function is_user($email,$password){
        $query = $this->db->get_where('users',array('email'=>$email,'password'=>sha1("$password")));
        if($query->num_rows==1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    /**
     * get_uid 获取登陆者的uid
     * @access public 
     * @param $email
     * @return uid
     */
    public function get_uid($email){
        $row = $this->db->get_where('users',array('email'=>$email))->row();
        return $row->uid; 
    }
    /**
     * add_user 注册用户
     * @access public
     * @param $email $password
     * return boolean 注册成功返回1
     */
    public function add_user($email,$password){
        $query = $this->db->get_where("users",array('email'=>$email));
        if($query->num_rows == 1){
            return FALSE;
        }else{
            $data = array('email'=>$email,'password'=>sha1($password));
            $this->db->insert('users',$data);        
            return TRUE;
        }
    }
}
