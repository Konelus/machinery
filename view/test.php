<?php
/**
 * Created by PhpStorm.
 * User: Konel
 * Date: 02.01.2022
 * Time: 23:21
 */


?>


<div class = 'test'>
    <form method = "post">
        <div class = 'row'>
            <div class = 'col'>
                <div class = 'alert alert-dark description'>
                    <div class = 'title'>Инструкция по диагностике</div>
                    <div>
                        Ниже расположены наиболее распространенные проблемы, встречающиеся в автомобилях.
                        Для удобства они сгруппированы по системам автомобиля.
                        Отметьте все признаки, которые есть у вашего автомобиля, и нажмите кнопку «Завершить» в самом низу страницы.
                        Если вы не нашли в блоках нужного признака, пожалуйста, отправьте его через форму ниже.
                    </div>
                </div>
            </div>
        </div>


        <?php
        /** $result: массив с неисправностями */
        if ($result) { foreach ($result as $key => $value) { ?>
        <div class = 'report'>
            <div class = 'alert alert-black'>Отчёт по категории: <b><?= $value['section'] ?></b></div>
                <?php
                // Перебор всех групп неисправностей с разным весом показателя
                foreach ($value as $key2 => $value2) {
                // Игнорирование названия категории при переборе
                if (is_numeric($key2))
                {
                    if ($key2 == 0) { $name[$key2] = 'Наиболее'; }
                    if ($key2 == 1) { $name[$key2] = 'Наименее'; }
                    if ((is_iterable($value2)) && (count($value2) > 1)) { $alertTitle[$key2] = "{$name[$key2]} вероятные неисправности"; }
                    elseif ((is_iterable($value2)) && (count($value2) == 1)) { $alertTitle[$key2] = "{$name[$key2]} вероятная неисправность"; }
                } ?>
            <div class="accordion" id="accordionExample-<?= $key ?>">
                <?php if (is_numeric($key2) && (($key2 == 0) || ($key2 == 1))) { ?>
                <div class = 'alert alert-dark'><?= $alertTitle[$key2] ?></div>
                <?php // Перебор всех неисправностей
                if (is_numeric($key2)) { foreach ($value2 as $key3 => $value3) { ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?= $key.$key2.$key3 ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $key.$key2.$key3 ?>" aria-expanded="true" aria-controls="collapse<?= $key.$key2.$key3 ?>">
                            <?= $value3['name'] ?>
                        </button>
                    </h2>
                    <div id="collapse<?= $key.$key2.$key3 ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $key.$key2.$key3 ?>" data-bs-parent="#accordionExample-<?= $key ?>">
                        <div class="accordion-body">
                            <div><b>Описание: </b><?= $value3['description'] ?></div>
                            <div><b>Рекомендации: </b><?= $value3['recommendation'] ?></div>
                        </div>
                    </div>
                </div>
                <?php } } } ?>
           </div>
           <?php if (!isset($value[0])) { ?>
           <div class = 'alert alert-danger'>
               <div>
                   Недостаточно данных для проведения онлайн диагностики!<br>
                   Если вы не нашли всех признаков в нашей системе, пожалуйста, введите их вручную
               </div>
               <div>
                   <br>
                   <div><textarea></textarea></div>
               </div>
               <div>
                   <br>
                   <label>Email <input type = 'text'></label>
               </div>
               <br>
               <div>
                   Мы проведём диагностику с учётов полученных данных и пришлём результат на указанный email<br>
                   Мы постоянно развиваем систему и добавляем новые признаки неисправностей!<br>
                   Спасибо за вашу помощь!
               </div>
           </div>
           <?php } } ?>
        </div>
        <?php } }  ?>

        <?php foreach ($sections as $key => $value) { ?>
            <div class = 'row'>
                <div class = 'col'>
                    <div class = 'question'>
                        <div class = 'question-title'><?= $value ?></div>
                        <div class = 'question-text'>
                            <div class = 'row'>
                            <?php foreach ($signs[$key] as $key0 => $value0) { $stringSplit[$key] = false; if (iconv_strlen($value0) >= 50) { $stringSplit[$key] = true; break; } } ?>
                            <?php foreach ($signs[$key] as $key2 => $value2) { if ($_POST["cb-{$key}-{$key2}"]) { $checked[$key][$key2] = 'checked'; } if ($stringSplit[$key] == false) { ?>
                                <div class = 'col-6'>
                                <?php } ?>
                                    <div>
                                        <div class = 'question-check'><input type = 'checkbox' id = 'cb-<?= $key.'-'.$key2 ?>' <?= $checked[$key][$key2] ?> name = 'cb-<?= $key.'-'.$key2 ?>'></div>
                                        <div class = 'question-answer'><label for = 'cb-<?= $key.'-'.$key2 ?>'><?= $value2 ?></label></div>
                                    </div>
                                <?php if ($stringSplit[$key] == false) { ?>
                                </div>
                                <?php } } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class = 'row auto-info'>
            <div class = ''>

            </div>
            <div class = 'col'>
                <div class = 'label'>
                    <label for = 'brand'>Марка автомобиля <span>*</span></label>
                </div>
                <input type = 'text' class = 'form-control' list = 'brands' id = 'brand' placeholder = 'Марка автомобиля' value = '<?= $_POST['brand'] ?>' name = 'brand' autocomplete = 'off' required>
                <datalist id = 'brands'>
                    <?php foreach ($cars['brand'] as $key => $value) { ?>
                        <option><?= $value ?></option>
                    <?php } ?>
                </datalist>
            </div>
            <div class = 'col'>
                <div class = 'label'>
                    <label for = 'model'>Модель автомобиля <span>*</span></label>
                </div>
                <input type = 'text' class = 'form-control' list = 'models' id = 'model' placeholder = 'Модель автомобиля' value = '<?= $_POST['model'] ?>' name = 'model' autocomplete = 'off' required>
                <datalist id = 'models'>
                    <?php foreach ($cars['model'] as $key => $value) { ?>
                    <option><?= $value ?></option>
                    <?php } ?>
                </datalist>
            </div>
            <div class = 'col'>
                <div class = 'label'>
                    <label for = 'date'>Дата выпуска <span>**</span></label>
                </div>
                <input type = 'date' class = 'form-control' list = 'date' id = 'date' name = 'date'>
                <datalist id = 'date'>
                    <option></option>
                </datalist>
            </div>
            <div class = 'description'>
                <span>*</span> - поля обязательные для заполнения
                <span class = 'left-margin'>**</span> - достаточно указать только год
            </div>
        </div>

        <div class = 'row send-result'>
            <div class = 'col'>
                <input type = 'submit' class = 'btn btn-dark' name = 'send_test_result' value = 'Провести онлайн диагностику'>
            </div>
        </div>
    </form>
</div>
