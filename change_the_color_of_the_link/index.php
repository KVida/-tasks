<!DOCTYPE html>
<html>
<head>
    <title>Change_the_color_of_the_link</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
    <div id="block1">
        <p>Способ №1</p>
        <a href="index.php?id=1" class="a_link <?php if (isset($_GET['id']) && $_GET['id'] == 1){ echo 'red';} else { echo 'black';} ?>">Главная</a>
        <a href="index.php?id=2" class="a_link <?php if (isset($_GET['id']) && $_GET['id'] == 2){ echo 'red';} else { echo 'black';} ?>">Каталог</a>
        <a href="index.php?id=3" class="a_link <?php if (isset($_GET['id']) && $_GET['id'] == 3){ echo 'red';} else { echo 'black';} ?>">О нас</a>
    </div>
    
    <div id="block2">
        <p>Способ №2</p>
        <a href="index.php?id=4" class="a_link">Главная</a>
        <a href="index.php?id=5" class="a_link">Каталог</a>
        <a href="index.php?id=6" class="a_link">О нас</a>
        <script>
            /*только при нажатии на ссылку изменяется цвет*/
            /*$(document).ready(function() {
                $('#block2 a').click(function(){
                    $(this).removeClass();
                    $(this).toggleClass('red');
                });
            });*/

            /*при нахожении на текущей странице изменять цвет*/
            $(document).ready(function() {
                $("[href]").each(function() {
                    if (this.href == window.location.href) {
                        $(this).removeClass();
                        $(this).toggleClass('red');
                    }
                });
            });
        </script>
    </div>
    <div id="block3">
        <p>Способ №3</p>
        <a href="index.php?id=7" class="a_link">Главная</a>
        <a href="index.php?id=8" class="a_link">Каталог</a>
        <a href="index.php?id=9" class="a_link">О нас</a>
    </div>
</body>
</html>