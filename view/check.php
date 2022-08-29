<?php
?>

<div class = 'check'>
    <div class = 'row'>
        <div class = 'col'>
            <form method = "post">
                <div class = 'row auto-info'>
                    <div class = 'col'>
                        <div class = 'input-group'>
                            <div class = 'input-group-text'>
                                <label for = 'brand'>Марка</label>&nbsp;и&nbsp;<label for = 'model'>модель</label>&nbsp;автомобиля
                            </div>
                            <input type = 'text' class = 'form-control' list = 'brands' id = 'brand' placeholder = 'Марка автомобиля' name = 'brand' value = '<?= $_POST['brand'] ?>' autocomplete = 'off' required>
                            <datalist id = 'brands'>
                                <?php foreach ($cars['brand'] as $key => $value) { ?>
                                    <option><?= $value ?></option>
                                <?php } ?>
                            </datalist>
                            <input type = 'text' class = 'form-control' list = 'models' id = 'model' placeholder = 'Модель автомобиля' name = 'model' value = '<?= $_POST['model'] ?>' autocomplete = 'off' required>
                            <datalist id = 'models'>
                                <?php foreach ($cars['model'] as $key => $value) { ?>
                                    <option><?= $value ?></option>
                                <?php } ?>
                            </datalist>
                            <div class = 'input-group-text input-div'>
                                <input type = 'submit' class = 'btn btn-dark' value = 'Проверить автомобиль' name = 'car_check'>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if ($carInfo != '') { ?>
    <div class = 'row diagram'>
        <div class = 'diagram-average'><?= $_POST['brand'].' '.$_POST['model'] ?></div>
        <div class = 'col-3'>
            <svg width="100%" height="100%" viewBox="0 0 42 42">
                <circle cx="21" cy="21" r="15.91549430918954" fill="#fff"></circle>
                <circle cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#E3E3E3" stroke-width="3"></circle>
                <circle cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="black" stroke-width="3" stroke-dasharray="<?= $grade ?> <?= 100 - $grade?>" stroke-dashoffset="0"></circle>
                <?php if ($grade != 0) { $x = '30'; } else { $x = '40'; } ?>
                <text x="<?= $x ?>%" y="62%" class="chart-number"><?= $grade ?></text>
            </svg>
        </div>

        <div class = 'col description'>
            <div class = 'diagram-topics'>
                <div class = 'row'>
                    <div class="accordion" id="accordionExample">
                        <?php $count = 0; foreach ($carInfo as $key => $value) { $count++; ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?= $count ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $count ?>" aria-expanded="false" aria-controls="collapseOne">
                                    <?php if ($value == 1) { ?>
                                    <span class = 'svg' title = 'Высокий риск неисправностей'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                        </svg>
                                    </span>
                                    <?php } else { ?>
                                    <span class = 'svg' title = 'Низкий риск неисправностей'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                        </svg>
                                    </span>
                                    <?php } ?>
                                    <?= $key ?></div>
                                </button>
                            </h2>
                            <div id="collapse<?= $count ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $count ?>" data-bs-parent="#accordionExample">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php } ?>
</div>

