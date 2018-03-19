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
    <?php echo validation_errors(); ?>
    <?php if(isset($error)) echo $error?>
    <p><?php echo form_open('login/log') ?></p>
    <p>用戶名:<?php echo form_input('name') ?></p>
    <p>密碼:<?php echo form_password('passwd') ?></p>
    <p><?php echo form_submit('submit', '登錄') ?></p>
    <p><?php echo form_close() ?></p>
    <?php echo anchor('login/signup','註冊')?>
</body>
</html>