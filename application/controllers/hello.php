<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hello extends CI_Controller{
    public function index(){
        // echo '成功了';
        // $data['header']='header';
        // $data['body']='body';
        $data=array(
            'header'=>'頭部',
            'body'=>'身體',
            'data'=>'哈囉世界!'
        );
        $this->load->view('hello_view',$data);
    }
}