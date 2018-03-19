<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model{
    function check(){
        $this->db->where('name',$this->input->post('name'));
        $this->db->where('passwd',sha1($this->input->post('passwd')));
        $q=$this->db->get('users');
        // if($q->num_rows()>0){
        //     echo '你登入成功了';
        // }else{
        //     echo '註冊去!';
        // }
        if($q->num_rows()>0){
            return $q->row();
        }
    }
    function add(){
        $data['name']=$this->input->post('name');
        $data['passwd']=sha1($this->input->post('passwd'));
        return $this->db->insert('users',$data);
    }
}