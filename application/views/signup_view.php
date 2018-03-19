<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>
<body>
<h2><?php echo $title ?></h2>
    <?php if(isset($error)) echo $error?>
   
    <p><?php echo form_open('login/sign') ?></p>
    <p>用戶名:<?php echo form_input('name',set_value('name')) ?><?php echo form_error('name'); ?></p>
    <p>密碼:<?php echo form_password('passwd',set_value('passwd')) ?><?php echo form_error('passwd'); ?></p>
    <p>確認密碼:<?php echo form_password('passwd2') ?><?php echo form_error('passwd2'); ?></p>
    <p><?php echo form_submit('submit', '註冊') ?></p>
    <p><?php echo form_close() ?></p>
    <?php echo anchor('login','登錄')?>
</body>
</html>