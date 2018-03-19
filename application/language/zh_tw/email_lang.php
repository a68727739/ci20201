<?php

$lang['email_must_be_array'] = "電子郵件確認方式必須傳入一個數組.";
$lang['email_invalid_address'] = "無效的電子郵件地址: %s";
$lang['email_attachment_missing'] = "無法定位此電子郵件附件: %s";
$lang['email_attachment_unreadable'] = "無法打開此附件: %s";
$lang['email_no_recipients'] = "必須包含收件人(To)、抄送人(Cc)或暗送人(Bcc)";
$lang['email_send_failure_phpmail'] = "無法使用PHP mail()發送電子郵件. 您的服務器可能沒有配置用此方法發郵件.";
$lang['email_send_failure_sendmail'] = "無法使用PHP Sendmail發送郵件. 您的服務器可能沒有配置用此方法發郵件.";
$lang['email_send_failure_smtp'] = "無法用PHP SMTP發送郵件. 您的服務器可能沒有配置用此方法發郵件.";
$lang['email_sent'] = "您的信件已經被成功的發送了,所使用的協議是: %s";
$lang['email_no_socket'] = "無法打開套接字(socket)以使用Sendmail. 請檢查設置.";
$lang['email_no_hostname'] = "您沒有指定SMTP主機名.";
$lang['email_smtp_error'] = "出現SMTP錯誤: %s";
$lang['email_no_smtp_unpw'] = "錯誤: 您必須指定SMTP用戶名和密碼.";
$lang['email_failed_smtp_login'] = "發送AUTH LOGIN命令失敗. 錯誤為: %s";
$lang['email_smtp_auth_un'] = "驗證用戶名失敗. 錯誤為: %s";
$lang['email_smtp_auth_pw'] = "驗證密碼失敗. 錯誤為: %s";
$lang['email_smtp_data_failure'] = "無法發送數據: %s";
$lang['email_exit_status'] = "退出狀態代碼為: %s";


/* End of file email_lang.php */
/* Location: ./application/language/zh_cn/email_lang.php */