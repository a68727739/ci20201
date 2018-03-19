<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新增留言</title>
</head>
<body>
<?php if(isset($error)) echo $error?>
    <?php
if (!$this->session->userdata('is_login')) {
    echo '你沒有權限，請先' . anchor('login', '登入') . '或者' . anchor('login/signup', '註冊') . '帳戶!';
    header('refresh:2;url=' . site_url('login'));
    echo '更新成功!2秒之後自動返回';
    echo anchor(site_url('login'), '立即返回');
} else {
    echo form_open_multipart('message/post');
    echo '姓名:' . form_input('name');
    echo '<br>網站:' . form_input('url');
    echo '<br>標題:' . form_input('title');
    echo '<br>內容:' . form_textarea('content');
    echo '<br>圖片:' . form_upload('pic');
    echo form_submit('submit', '提交');
    echo form_close();
}
?>
</body>
</html>