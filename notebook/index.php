<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body class="back">
    <div class="container">
        <div class="header">
            <h1>Notebook</h1>
        </div>
        <div class="content">
            <form action="/handler.php" method="POST" class="contact-form" id="contactForm">
            <? if(!isset($_SESSION['id']) && empty($_SESSION['id'])):?>
                <div class="input-block">
                    <div class="text-part">
                        <label for="fio">Full Name
                            <span class="required-input">*</span>
                        </label>
                    </div>
                    <input type="text" name="fio" class="input" id="fio" required>
                </div>
                <div class="input-block">
                    <div class="text-part">
                        <label for="company">Company</label>
                    </div>  
                        <input type="text" name="company" class="input" id="company">
                </div>
                <div class="input-block">
                    <div class="text-part">
                        <label for="phone">Phone
                            <span class="required-input">*</span>
                        </label>
                    </div>
                    
                    <input type="text" name="phone" title="Phone example: +79161234567" class="input" id="phone" required>
                </div>
                <div class="input-block">
                    <div class="text-part">
                       <label for="email">Email
                            <span class="required-input">*</span>
                        </label>  
                    </div>
                    <input type="email" name="email" class="input" id="email" required>
                </div>
                <div class="input-block">
                    <label for="date">Date of Birth</label>
                    <input type="date" name="date" class="input" id="phone">
                </div>
                <div class="input-block">
                    <div class="text-part">
                        <label for="photo">Photo</label>
                    </div>
                    <input type="file" name="photo" class="input" id="photo" title="Select Image" accept="image/jpeg,image/png,image/webp">
                </div>
                <? else:?>
                    <div class="input-block">
                    <div class="text-part">
                        <label for="fio">Full Name
                            <span class="required-input">*</span>
                        </label>
                    </div>
                    <? foreach ($edit as $val): ?>
                    <input type="text" name="fio" class="input" value="<?=$val['fio']?>" id="fio" required>
                </div>
                <div class="input-block">
                    <div class="text-part">
                        <label for="company">Company</label>
                    </div>
                    <input type="text" name="company"  value="<? echo ($val['company'] !== "null" && $val['company'] !== "") ? $val['company'] : ""?>" class="input" id="company">
                </div>
                <div class="input-block">
                    <div class="text-part">
                        <label for="phone">Phone
                            <span class="required-input">*</span>
                        </label>
                    </div>
                    <input type="text" name="phone" value="<?=$val['phone']?>" title="Phone Example: +79161234567" class="input" id="phone" required>
                </div>
                <div class="input-block">
                    <div class="text-part">
                       <label for="email">Email
                            <span class="required-input">*</span>
                        </label>  
                    </div>
                    <input type="email" name="email" value="<?=$val['email']?>" class="input" id="email" required>
                </div>
                <div class="input-block">
                    <label for="date">Date of birth</label>
                    <input type="date" name="date" class="input" value="<? echo ($val['birth_date'] !== "null") ? $val['birth_date'] : ""?>" id="birth_date">
                </div>
                <div class="input-block">
                    <div class="text-part">
                        <label for="photo">Фото</label>
                    </div>
                    <input type="file" name="photo" class="input" id="photo"  title="Select Image" accept="image/jpeg,image/png,image/webp">
                </div>
        
                <? endforeach;?>
                <? endif;?>
                <? if(isset($_SESSION['id']) && !empty($_SESSION['id'])):?>
                        <input type="hidden" name="actionFunction" value="editNote">
                    <? else:?>
                        <input type="hidden" name="actionFunction" value="checkNote">
                    <? endif;?>
                <div class="input-block">
                    <div class="required-tip">
                        <span class="required-input">*</span>
                        <p>&nbsp; - Обязательное поле</p>  
                    </div>
                    
                    <input type="submit" class="input" value="Send">
                </div>
            </form>
        </div>
        <div class='links'>
            <? if(empty($_SESSION['id']) && !isset($_SESSION['id']) ):?>
                <a class="link" href="/notes.php" class="notes-link">Go to notes</a>
            <? else:?>
                <a class="link" href="/note.php?id=<?=$_SESSION['id']?>" class="notes-link">Back to Note № <?=$_SESSION['id']?></a>
            <? endif;?>
        </div>
    </div>

    <script src="/scripts/script.js"></script>
</body>

</html>