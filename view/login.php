<?php
/**
 * Created by PhpStorm.
 * User: Konel
 * Date: 03.01.2022
 * Time: 16:39
 */

    $titleSelected = array();
    $btnValue = '';
    switch ($_GET['type'])
    {
        default: case "": $titleSelected[0] = 'title-selected'; $btnValue = 'Войти в личный кабинет'; $btnName = 'login'; break;
        case "registration": $titleSelected[1] = 'title-selected'; $btnValue = 'Зарегистрироваться'; $btnName = 'registration'; break;
    }
    //if ((!$_GET['type']) || ($_GET['type'] == 'login')) {  }

?>

<div class = 'modal fade' id = 'modal-login' aria-hidden="true">
    <div class = 'modal-dialog'>
        <div class = 'modal-content'>
            <form method = "post">
                <div class = 'container-fluid'>
                    <div class = 'modal-header'>
                        <div class = 'row'>
                            <div class = 'col'>
                                <a href = '/' class = '<?= $titleSelected[0] ?>'>Авторизация</a>
                                <span>/</span>
                                <a href = '/?type=registration' class = '<?= $titleSelected[1] ?>'>Регистрация</a>
                            </div>
                        </div>
                    </div>

                    <div class = 'modal-body'>
                        <?php if (!$_GET['type']) { if ($_POST['login']) { ?>
                        <div class = 'row'>
                            <div class = 'col'>
                                <div class = 'alert alert-danger'><b>Не удалось войти в систему!</b><br>Возможно, вы ошиблись при вводе почты и пароля</div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class = 'row'>
                            <div class = 'col-4 label-left'>
                                <div class = 'label'>Почта</div>
                            </div>
                            <div class = 'col input-right'>
                                <input type = 'text' class = 'form-control' placeholder = 'Почта' name = 'email' value = '<?= $_POST['mail'] ?>' required>
                            </div>
                        </div>
                        <div class = 'row'>
                            <div class = 'col-4 label-left'>
                                <div class = 'label'>Пароль</div>
                            </div>
                            <div class = 'col input-right'>
                                <input type = 'password' class = 'form-control' placeholder = 'Пароль' name = 'password' required>
                            </div>
                        </div>
                        <?php } elseif ($_GET['type']) { if ($_POST['registration']) { ?>
                            <div class = 'row'>
                                <div class = 'col'>
                                    <div class = 'alert alert-danger'><b>Не удалось зарегистрироваться в системе!</b><br>Пользователь с такой почтой уже существует</div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class = 'row'>
                            <div class = 'col-4 label-left'>
                                <div class = 'label'>ФИО</div>
                            </div>
                            <div class = 'col input-right'>
                                <input type = 'text' class = 'form-control' placeholder = 'ФИО' name = 'fio' value = '<?= $invite['fio'] ?>' required>
                            </div>
                        </div>
                        <div class = 'row'>
                            <div class = 'col-4 label-left'>
                                <div class = 'label'>Предмет</div>
                            </div>
                            <div class = 'col input-right'>
                                <div class = 'input-group'>
                                    <select class = 'form-select' name = 'subject' disabled>
                                        <option>Русский язык</option>
                                    </select>
                                    <div class = 'input-group-text' title = 'На данный момент доступен только русский язык'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ($_GET['invite']) { ?>
                        <div class = 'row'>
                            <div class = 'col-4 label-left'>
                                <div class = 'label'>Класс</div>
                            </div>
                            <div class = 'col input-right'>
                                <input type = 'number' min = '1' max = '11' class = 'form-control'  placeholder = 'Класс' name = 'class' value = '<?= $invite['class'] ?>' required>
                            </div>
                        </div>
                        <div class = 'row'>
                            <div class = 'col-4 label-left'>
                                <div class = 'label'>Цель (балл)</div>
                            </div>
                            <div class = 'col input-right'>
                                <input type = 'number' min = '1' max = '100' class = 'form-control'  placeholder = 'Цель (балл)' name = 'aim' value = '<?= $invite['aim'] ?>' required>
                            </div>
                        </div>
                            <?php } ?>

                        <div class = 'row'>
                            <div class = 'col-4 label-left'>
                                <div class = 'label'>Почта</div>
                            </div>
                            <div class = 'col input-right'>
                                <input type = 'email' class = 'form-control'  placeholder = 'Почта' name = 'email' value = '<?= $_POST['email'] ?>' required>
                            </div>
                        </div>
                        <div class = 'row'>
                            <div class = 'col-4 label-left'>
                                <div class = 'label'>Пароль</div>
                            </div>
                            <div class = 'col input-right'>
                                <input type = 'password' class = 'form-control' placeholder = 'Пароль' name = 'password' required>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class = 'modal-footer'>
                        <input type = 'hidden' value = 'teacher' name = 'type'>
                        <input type = 'submit' class = 'btn btn-dark btn-max' name = '<?= $btnName ?>' value = '<?= $btnValue ?>'>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
