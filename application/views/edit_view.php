<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>使用CI製作簡易留言板--HenryChang張亨利</title>
</head>
<body>
    <h1>使用CI製作簡易留言板--HenryChang張亨利</h1>
    <?php 
    
    $row=$query->row();//row()返回結果集的第一行
    // 將查詢到的結果放入要修改的位置上
    echo form_open('message/update/'.$this->uri->segment(3));
    echo '姓名:'.form_input('name',$row->name);
    echo '<br>網站:'.form_input('url',$row->url);
    echo '<br>標題:'.form_input('title',$row->title);
    echo '<br>內容:'.form_textarea('content',$row->content);
    echo '<br>圖片:'.'<img src="'.base_url().'assets/uploads/'.$row->pic.'">';
    echo '<br>'.form_submit('submit','提交');
    echo form_close();
    ?>
</body>
</html>