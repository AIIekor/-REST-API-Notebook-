<?php 
use notebook\Handler;

include('handler.php');
$handler = new Handler;
$noteData = $handler->showNote();
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Note</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body class="back">
    <div class="container">
        <a class="link" href="/notes.php">Back to all notes</a>
        <div class="header">
            <h1>Note № <?=$_GET['id']?></h1>
        </div>
    
        <div class="content">
        <? foreach ($noteData as $note): ?>
                    <div class="note-block">
                        <p><b>Full Name:</b> <?=$note['fio']?></p>
                        <? echo ($note['company'] !== 'null' && trim($note['company'] !== "")) ? '<p><b>Компания:</b> '.$note['company'].'</p>' : '' ?> 
                        <p><b>Phone:</b> <?=$note['phone']?></p>
                        <p><b>Email:</b> <?=$note['email']?></p>
                        <? echo ($note['birth_date'] !== 'null') ? '<p><b>Дата рождения:</b> '.$note['birth_date'].'</p>' : '' ?>              
                        <? echo ($note['photo'] !== 'null') ? '<img class="photo" src="content/images/'.$note['photo'].'"' : '' ?>  
                        <div class='links'>
                            <a class="link" href="/">Edit Note</a>
                            <a class="link" href="/notes.php?id=<?=$note['id']?>&email=<?=$note['email']?>">Delete Note</a>
                            <? $_SESSION['id'] = $note['id'];?>
                            <? $_SESSION['photo'] = $note['photo'];?>
                        </div>
                    </div>
            <? endforeach; ?>
        </div>
</body>
</html>
