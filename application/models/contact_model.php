<?php if( !defined("BASEPATH") ) exit("No script to access");

class Contact_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    /**
     * get_all_contacts 以数组形式获得所有联系人的信息
     * @param $uid 
     * return array
     */
    public function get_all_contacts($uid){
        $contacts = $this->db->get_where("contacts",array("uid"=>$uid))->result_array();
        return $contacts;
    }
    /**
     * add 插入数据
     * @access public 
     * @param $contact 数组
     * return boolean 成功返回1，否则返回0
     */
    public function add($contact){
        $query = $this->db->get_where("contacts",
            array("uid"=>$this->session->userdata['uid'],
                  "name"=>$contact['name'],
            )
        );
        if($query->num_rows == 1){
            return FALSE;
        }else{
            $data = array( 'uid' => $this->session->userdata['uid'],
                'name' => $contact['name'],
                'email' => $contact['email'],
                'phone' => $contact['phone'],
                'address' => $contact['address']
            );
            $this->db->insert('contacts',$data);
            return TRUE;
        }

    }
}
