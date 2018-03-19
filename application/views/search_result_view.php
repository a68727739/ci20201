<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/' ?>style.css">
    <title>搜尋結果</title>
</head>
<body>
<table>
<?php foreach($results as $row){ ?>
    <tr>
        <td><?php echo $row->name?></td>
        <td><?php echo $row->url?></td>
        <td><?php echo $row->title?></td>
        <td><?php echo $row->content?></td>
        <td><?php echo $row->date?></td>
        <td><?php echo '<img class="msgListImg" src="'.base_url().'assets/uploads/'.$row->pic.'">'?></td>
        
    </tr>
<?php } ?>
</table>
    
</body>
</html>