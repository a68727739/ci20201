<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Member extends CI_Controller
{
    public function index()
    {

        if ($this->session->userdata('is_login')) {
            //$this->load->view('login_test');
            redirect(site_url('message'));
        } else {
            
            header('refresh:2;url='.site_url('login'));
            
            echo '更新成功!2秒之後自動返回';
            echo anchor(site_url('login'),'立即返回');
        }
    }
}
