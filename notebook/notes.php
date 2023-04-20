<?php

use notebook\Handler;

include('handler.php');
$handler = new Handler;
$notes = $handler->showNotes();
session_start();    
unset($_SESSION['id']);
?> 
 
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body class="back">
    <div>
        <div class="header flex-block">
            <h1>Notes</h1>
            <a class="link to-main" href="/">Create new note</a>
        </div>
        <div class="content">
    
        <? if(empty($notes)): ?>
           <p class="empty-notes">Empty Notebook</p>
        <? else: ?>
            <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full name</th>
                <th scope="col">Company</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Date of birth</th>
                <th scope="col">Photo</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($notes as $note): ?>
                    <tr>
                        <td data-label='#'><?=$note['id']?></td>
                        <td data-label='Full name'><?=$note['fio']?></td>
                        <td data-label='Company'><?=$note['company']?></td>
                        <td data-label='Pgone'><?=$note['phone']?></td>
                        <td data-label='Email'><?=$note['email']?></td>
                        <td data-label='Date of Birth'><?=$note['birth_date']?></td>
                        <td data-label='Photo'><?=$note['photo']?></td>                    
                        <td><a class='note-link' href="/note.php?id=<?=$note['id']?>">Go to Note</a></td>
                    </tr>

            <? endforeach; ?>
            <? endif;?>
            </tbody>
        </table>
        
        </div>
    </div>
</body>
</html>
