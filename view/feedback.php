<?php
/**
 * Created by PhpStorm.
 * User: Konel
 * Date: 03.01.2022
 * Time: 18:41
 */
?>

<div class = 'feedback'>
    <form method = "post">
        <div class = 'row'>
            <div class = 'col'>
                <div class = 'alert alert-dark description'>
                    На данной странице вы можите сообщить о неполадках или оставить свои пожелания к работе сайта.<br>
                    Ваше сообщение будет рассмотрено в течение нескольких дней. Спасибо за понимание!
                </div>
            </div>
        </div>

        <div class = 'row feedback-div'>
            <div class = 'col-2'></div>
            <div class = 'col'>
                <div class = 'input-group'>
                    <div class = 'input-group-text'>Тема обращения</div>
                    <select class = 'form-select'>
                        <option>Технические ошибки</option>
                        <option>Предложения и пожелания</option>
                        <option>Прочее</option>
                    </select>
                </div>
                <div class = 'feedback-div-textarea'>
                    <textarea placeholder = 'Поле для ввода текста'></textarea>
                </div>
                <div class = 'feedback-send-div'>
                    <input type = 'submit' class = 'btn btn-dark' value = 'Отправить сообщение'>
                </div>
            </div>
            <div class = 'col-2'></div>
        </div>
    </form>
</div>
