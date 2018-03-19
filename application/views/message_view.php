<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>使用CI製作簡易留言板--HenryChang張亨利</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/' ?>style.css">
</head>
<body>
    <h1>使用CI製作簡易留言板--HenryChang張亨利</h1>
    <?php
//驗證是否登入

if ($this->session->userdata('is_login')) {
    echo anchor('login/logout', '登出');
}
    echo '<p></p>';
    echo anchor('message/add', '新增文章');
    if ($query->num_rows() > 0) {
        if (!$this->session->userdata('is_login')) {
            echo $this->table->set_heading('姓名', '網址', '標題', '內容', '圖片', '發表日期');    
        }else{
            echo $this->table->set_heading('姓名', '網址', '標題', '內容', '圖片', '發表日期', '留言處理');
        }
        
        // 遍歷輸出
        foreach ($query->result() as $row) {
            // 給網址加上超鏈結
            // $row->url='<a href="' .$row->url .'">' .$row-url. '</a>';
            $edit = anchor('message/edit/' . $row->id, '編輯');
            $delete = anchor('message/delete/' . $row->id, '刪除', array('onclick' => "return confirm('確認刪除此筆資料?')"));
            // $action=array($edit,$delete);
            // 每次便利輸出一行
            //$this->table->add_row($row->name,$row->url,$row->title,$row->content,$row->date,$edit,$delete);
            // if (!$this->session->userdata('is_login')) {
            //     $this->table->add_row($row->name, $row->url, $row->title, $row->content, $row->pic, $row->date);    
            // }else{
            //     $this->table->add_row($row->name, $row->url, $row->title, $row->content, $row->pic, $row->date, $edit, $delete);
            // }
            if (!$this->session->userdata('is_login')) {
                $this->table->add_row($row->name, $row->url, $row->title, $row->content, '<img class="msgListImg" src="'.base_url().'assets/uploads/'.$row->pic.'">', $row->date);    
            }else{
                $this->table->add_row($row->name, $row->url, $row->title, $row->content, '<img class="msgListImg" src="'.base_url().'assets/uploads/'.$row->pic.'">', $row->date, $edit, $delete);
            }
        }
        echo $this->table->generate(); //輸出一個表格
        //輸出分頁
        echo $pagination;
        /*-----------分頁類的使用------------------ */

    }


?>



<?php
  echo form_open('message/search_keyword');
  echo '搜尋關鍵字:' . form_input('keyword');
  echo form_submit('submit', '提交');
  echo form_close();
?>

</body>
</html>