<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
// 安全 http://codeigniter.org,cn/user_guide/general/security.html
/*
html refresh
<meta http-equiv="refresh" content="2;url=http://itbdw.tk">
* */

class Message extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // 設置全局編碼
        header('Content-Type:text/html;charset=utf-8');
        // 這些內容也可以在autoload文件中加載,但為了演示方便放在這裡
        $this->load->helper(array('form', 'url'));
        $this->load->model('Message_model');
        $this->load->database();
        $this->load->library(array('table','pagination'));
        date_default_timezone_set('PRC');//設置默認時區
        // echo anchor(site_url(),'首頁').'<br>';
        echo anchor('','首頁').'<br>';
        /*-----------------分頁類的使用-----------------*/    
//載入分頁類
//$this->load->library('pagination');
    }


    // 默認方法載入message_view視圖
    // 方法的$offset的值取自URI的第三段
    // 可以參考http://codeigniter.com/user_guide/general/controllers.html#passinguri
    function index($offset='')
    {
        // 分頁類的使用
        $limit=2;
        $config['base_url']=site_url('message/index');
        $config['total_rows']=$this->Message_model->count_table();//count_table()有默認參數
        $config['per_page']=$limit;
        // 這幾行為可選設置
        $config['first_link']='首頁';
        $config['last_link']='尾頁';
        $config['num_links']=2;//放在你當前頁碼的前面和後面的"數字"連結的數量ˊ
        $this->pagination->initialize($config);
        // 放到數組中,傳給視圖
        // $data['limit']=$limit;
        // $data['offset']=$offset;
        $data['pagination']=$this->pagination->create_links();
        $data['query']=$this->Message_model->show($limit,$offset);//對模型的調用應該寫在控制器
        $this->load->view('message_view',$data);
/*----------------分頁類使用--------------------*/        
    }
    // 發布留言
    function post()
    {
       
/*----------加入判斷-------------- */
        header('refresh:3;url='.site_url('message'));
        // $this->Message_model->insert('message',$data);
        // $this->Message_model->insert($data);
        // redirect(site_url('message'));
        if($this->Message_model->insert()){
            echo '留言發表成功!3秒之後自動返回';
        }else{
            echo '發表失敗，請重新填寫!';
        }
        echo anchor(site_url('message'),'立即返回');
    }
    //載入編輯視圖
    function edit($id){
        // $data['query']=$this->Message_model->show_where($this->uri->segment(3));
        $data['query']=$this->Message_model->show_where($id);
        $this->load->view('edit_view',$data);
    }
    
    //更新留言
    function update($id){
       /*----------加入判斷-------------- */
       // $this->Message_model->insert('message',$data);
       // $this->Message_model->insert($data);
       // redirect(site_url('message'));
    //    if($this->Message_model->update($this->uri->segment(3))){
        if($this->Message_model->update($id)){
        header('refresh:3;url='.site_url('message'));
           echo '更新成功!3秒之後自動返回';
           echo anchor(site_url('message'),'立即返回');
       }else{
        // header('refresh:5;url='.site_url('message/edit'.$this->uri->segment(3)));
        header('refresh:3;url='.site_url('message/edit'.$id));
           echo '更新失敗，請重試!(3秒之後自動返回)';
           echo anchor('message/edit'.$id,'立即編輯');
       }
      
        // $this->Message_model->update($this->uri->segment(3));
        // redirect(site_url('message'));
    }
    // 刪除特定的紀錄
    function delete($id){
        // $this->Message_model->delete($this->uri->segment(3));
        // redirect(site_url('message'));
        /*----------加入判斷-------------- */
        header('refresh:3;url='.site_url('message'));
        if($this->Message_model->delete($id)){
            echo '刪除成功!3秒之後自動返回';
        }else{
            echo '刪除失敗(3秒之後自動返回)';
        }
        echo anchor('message','立即返回');
    }
    // 新增文章
    function add(){
        $this->load->view('add_view');
    }
    //搜尋文章
    function search_keyword()
    {
        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->Message_model->search($keyword);
        $this->load->view('search_result_view',$data);
    }
}
