<?php
/**
 * Created by PhpStorm.
 * User: Konel
 * Date: 04.11.2021
 * Time: 0:59
 */

    header('Content-Type: text/html; charset=utf-8');
    //error_reporting(0);
    require_once ($_SERVER['DOCUMENT_ROOT']."/controller/controller.php");

    if ($_GET['page'] == '') { $_GET['page'] = 'test';  }

    switch ($_GET['page'])
    {
        default: case 'test': $title = "Онлайн диагностика"; break;
        case 'malfunctions_rank': $title = 'Частые поломки'; break;
        case 'profile': $title = "Личный кабинет"; break;
        case 'feedback': $title = "Обратная связь"; break;
        case 'car_test': $title = "Автоинфо"; break;
        case 'check': $title = "Проверка авто"; break;
        case 'malfunctions':
            if ($_GET['page-type'] == 'malfunctions') { $title = "Неисправности"; }
            elseif ($_GET['page-type'] == 'signs') { $title = "Признаки неисправностей"; }
            break;
    }

?>

<!DOCTYPE html>

<html lang = 'ru'>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

        <link rel="stylesheet/less" type="text/css" href="/styles/styles.less">
        <link rel="stylesheet/less" type="text/css" href="/styles/nav.less">
        <link rel = 'stylesheet/less' type = 'text/css' href = '/styles/<?= $_GET['page'] ?>.less'>
        <script src="https://cdn.jsdelivr.net/npm/less@4.1.1"></script>

        <title><?= $title ?></title>
        <meta charset = 'utf-8'>
    </head>
    <body>
        <header>
            <div class = 'container header'>
                <div class = 'row'>
                    <div class = 'col-2 label'>car check</div>
                    <div class = 'col title'><?= $title ?></div>
                </div>
            </div>
        </header>

        <div class = 'main-div'>

        </div>
        <div class = 'container'>
            <div class = 'row'>
                <div class = 'col-2 nav-div'>
                    <aside>
                        <nav>
                        <?php require_once($_SERVER['DOCUMENT_ROOT']."/view/nav.php"); ?>
                        </nav>
                    </aside>
                </div>
                <div class = 'col content-div'>
                    <main>
                    <?php require_once($_SERVER['DOCUMENT_ROOT']."/view/{$_GET['page']}.php"); ?>
                    </main>
                </div>
            </div>
        </div>
        <footer>© Все права защищены car check 2022</footer>
    </body>
</html>
