<?php
?>

<div class = 'profile'>

    <form method = "post">
        <div class = 'row auto-info'>
            <div class = 'col'>
                <div class = 'label'>
                    <label for = 'brand'>Марка автомобиля <span>*</span></label>
                </div>
                <input type = 'text' class = 'form-control' list = 'brands' id = 'brand' placeholder = 'Марка автомобиля' name = 'brand' autocomplete = 'off' required>
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
                <input type = 'text' class = 'form-control' list = 'models' id = 'model' placeholder = 'Модель автомобиля' name = 'model' autocomplete = 'off' required>
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
            <div class = 'input-main-div'>
                <div class = 'input-div'>
                    <input type = 'submit' class = 'btn btn-dark' value = 'Добавить автомобиль' name = 'car_add'>
                </div>
            </div>
        </div>
    </form>

    <?php if ($userCars != '') foreach ($userCars as $key => $value)
    {
        if ($value['registered'] == 1)
        {
            if ($value['year'] == 0000) { $value['year'] = 'Год не указан!'; }
            if ($value['section'] == '')
            {
                for ($count = 1; $count <= 5; $count++)
                {
                    $userCars[$key]['section'][$count] = 0;
                    $value['section'][$count] = 0;
                }
            }
            foreach ($value['section'] as $key2 => $value2)
            {
                if ($value2 == 0) { $alert[$key][$key2] = 'dark'; } else { $alert[$key][$key2] = 'danger'; }
            }

        ?>
    <form method = "post">
        <div class = 'row diagram'>
            <div class = 'col-3 car-info'>
                <div class = 'car-name'><?= $value['brand'].' '.$value['model'] ?></div>
                <div class = 'car-year'><?= $value['year'] ?></div>
                <div class = 'car-malfunctions'>Мои неисправности: <b><?= $value['quantity'] ?></b></div>
                <div class = 'row car-inputs'>
                    <div class = 'col'>
                        <div class = 'input-div'>
                            <input type = 'hidden' value = '<?= $key ?>' name = 'car_hid'>
                            <input type = 'submit' value = 'Удалить' class = 'btn btn-danger' name = 'car_del'>
                        </div>
                    </div>
                </div>
            </div>

            <div class = 'col description'>
                <div class = 'diagram-title'>Выявленные неисправности</div>
                <div class = 'diagram-topics'>
                    <div class = 'row'>
                        <div class = 'col-4 assess'><div class = 'alert alert-<?= $alert[$key][1] ?>'>Тормозная система: <b><?= $value['section'][1] ?></b></div></div>
                        <div class = 'col-4 assess'><div class = 'alert alert-<?= $alert[$key][2] ?>'>Сцепление: <b><?= $value['section'][2] ?></b></div></div>
                        <div class = 'col-4 assess'><div class = 'alert alert-<?= $alert[$key][3] ?>'>Подвеска: <b><?= $value['section'][3] ?></b></div></div>
                    </div>
                    <div class = 'row'>
                        <div class = 'col'></div>
                        <div class = 'col-4 assess'><div class = 'alert alert-<?= $alert[$key][4] ?>'>Рулевое управление: <b><?= $value['section'][4] ?></b></div></div>
                        <div class = 'col-4 assess'><div class = 'alert alert-<?= $alert[$key][5] ?>'>Стартер: <b><?= $value['section'][5] ?></b></div></div>
                        <div class = 'col'></div>
                    </div>
                </div>
            </div>
<!--            <div class = 'diagram-average'>Среднее время решения теста: <b>187</b> мин.</div>-->
        </div>
    </form>
    <?php } } ?>

</div>
