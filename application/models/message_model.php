<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Message_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    // 查詢整個數據表
    function show($limit,$offset,$table='message'){
        if(!$limit){
            $query=$this->db->get($table);
        }else{
            $this->db->limit($limit,$offset);
            $query=$this->db->get($table);
        }
        // $query=$this->db->get($table);
        return $query;
    }
    // 查詢表的紀錄分頁類
    function count_table($table='message'){
        return $this->db->count_all($table);
    }
    // 向數據表插入數據$data數組或者對象
    function insert($table='message'){
        $data = array(
            'id' => '',
            'name' => $this->input->post('name'),
            'url' => $this->input->post('url'),
            'title' => $this->input->post('title'),
            //'content' => $this->input->post('content'),
            'content' => $this->input->post('content',TRUE),
            'date' => date('Y-m-d H:i:s'),
            'pic'=>$this->input->post('pic')
        );

        //file upload code 
			//set file upload settings 
			$config['upload_path']          = APPPATH. '../assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 100;
 
			$this->load->library('upload', $config);
 
			if ( ! $this->upload->do_upload('pic')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('add_view', $error);
			}else{
 
				//file is uploaded successfully
				//now get the file uploaded data 
				$upload_data = $this->upload->data();
 
				//get the uploaded file name
				$data['pic'] = $upload_data['file_name'];
 
			}

        return $this->db->insert($table,$data);
    }
    // 當id為$id
    function show_where($id,$table='message'){
        $this->db->where('id',$id);
        // 下面這條是可選的用來選出指定的字段
        // $this->db->select('name','url,'title','content');
        $query=$this->db->get($table);
        return $query;
    }
    //更新id為$id的紀錄
    function update($id, $table='message'){
        $data=array(
            'name' => $this->input->post('name'),
            'url' => $this->input->post('url'),
            'title' => $this->input->post('title'),
             //'content' => $this->input->post('content')
            'content' => $this->input->post('content',TRUE)
            
        );
        $this->db->where('id',$id);
        return $this->db->update($table,$data);
        /*上面兩行也可以換作下面一行解決,可以採用數組傳值,採用上面視為了條理清晰
        $this->db->update($table,array('id'=>$id));
        */
    }
    // 刪除id為$id的紀錄
    function delete($id, $table='message'){
        $this->db->where('id',$id);
        return $this->db->delete($table);
    }
    //搜尋文章(關鍵字)
    function search($keyword)
    {
        $this->db->like('name',$keyword);
        $query  =   $this->db->get('message');
        return $query->result();
    }
}