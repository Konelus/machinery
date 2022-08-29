<?php
    if ($_GET['page-type'] == 'malfunctions') { $cellValue = 'Рекомендации'; }
    elseif ($_GET['page-type'] == 'signs') { $cellValue = 'Результат'; }
?>

<div class = 'malfunctions'>

        <div class = 'row'>
            <div class = 'col'>
                <div class = 'select-div'>
                    <form method = "post">
                        <select class = 'form-select' name = 'section-select' onchange = 'form.submit()'>
                            <option>Все секции</option>
                            <?php foreach ($sectionList as $key => $value) { if ($_POST['section-select'] == $key) { $selected[$key] = 'selected'; } ?>
                            <option <?= $selected[$key] ?> value = '<?= $key ?>'><?= $value ?></option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class = 'row'>
            <div class = 'col'>
                <table class = 'table table-bordered table-striped table-hover'>
                    <thead class = 'table-dark'>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Секция</th>
                            <th>Описание</th>
                            <th><?= $cellValue ?></th>
                            <th colspan = '2'>Добавить</th>
                        </tr>
                    </thead>
                    <tbody>
                    <form method = "post">
                        <tr>
                            <th></th>
                            <th><textarea name = 'name' placeholder = 'Название'></textarea></th>
                            <th>
                                <select class = 'form-select' name = 'section'>
                                    <?php foreach ($sectionList as $key => $value) { ?>
                                    <option <?= $selected[$key] ?> value = '<?= $key ?>'><?= $value ?></option>
                                    <?php } ?>
                                </select>
                            </th>
                            <th><textarea name = 'description' placeholder = 'Описание'></textarea></th>
                            <th>
                                <?php if ($_GET['page-type'] == 'malfunctions') { ?>
                                <textarea name = 'recommendation' placeholder = 'Рекомендации'></textarea>
                                <?php } elseif ($_GET['page-type'] == 'signs') { ?>
                                    <select class = 'form-select' name = 'result'>
                                        <?php foreach ($systemData as $key0 => $value0) { ?>
                                            <option value = '<?= $value0['result']['id'] ?>'><?= $value0['result']['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } ?>
                            </th>
                            <th colspan = '2'>
                                <button type = 'submit' name = 'data-add' class = 'btn btn-success'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                                        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                    </svg>
                                </button>
                            </th>
                        </tr>
                    </form>
                    <tr class = 'table-dark'>
                        <th>#</th>
                        <th>Название</th>
                        <th>Секция</th>
                        <th>Описание</th>
                        <th><?= $cellValue ?></th>
                        <th>Ред</th>
                        <th>Уд</th>
                    </tr>

                    <?php if ($systemData != '') { $count = 0; foreach ($systemData as $key => $value)
                    { $count++; if (($_POST['hid'] == $value['id']) && (!isset($_POST['data-update']))) { $editActive[$key] = true; } ?>
                    <tr>
                        <form method = "post">
                            <td class = 'count'><?= $count ?></td>
                            <?php foreach ($value as $key2 => $value2) { if ($key2 != 'id') { ?>
                            <td>
                                <?php if (($key2 != 'count') && ($editActive[$key] == true)) { if (($key2 != 'section') && ($key2 != 'result')) { ?>
                                <textarea name = '<?= $key2 ?>'><?= $value2 ?></textarea>
                                <?php } else { if ($key2 == 'section') { ?>
                                <select class = 'form-select' name = 'section'>
                                    <?php foreach ($sectionList as $key0 => $value0) { if ($value2 == $value0) { $selected[$key0] = 'selected'; } ?>
                                     <option <?= $selected[$key0] ?> value = '<?= $key0 ?>'><?= $value0 ?></option>
                                    <?php } ?>
                                </select>
                                <?php } elseif ($key2 == 'result') { ?>
                                <select class = 'form-select' name = 'result'>
                                    <?php foreach ($systemData as $key0 => $value0) {  if ($value['result']['id'] == $value0['result']['id']) { $selectedResult[$key0] = 'selected'; }  ?>
                                    <option <?= $selectedResult[$key0] ?> value = '<?= $value0['result']['id'] ?>'><?= $value0['result']['name'] ?></option>
                                <?php } ?>
                                </select>
                                <?php } } } else
                                {
                                    if ($key2 == 'result') { $value2 = $value2['name']; }
                                    echo $value2;
                                } ?>
                            </td>
                            <?php } else {
                                if ($editActive[$key] == false)
                                { $btn[$key]['bg'] = 'btn-dark'; $btn[$key]['name'] = ''; $btn[$key]['del'] = ''; }
                                else { $btn[$key]['bg'] = 'btn-success'; $btn[$key]['name'] = 'data-update'; $btn[$key]['del'] = 'btn-danger-active'; } ?>
                            <td>
                                <input type = 'hidden' name = 'hid' value = '<?= $value2 ?>'>
                                <input type = 'hidden' name = 'section-select' value = '<?= $_POST['section-select'] ?>'>
                                <button type = 'submit' name = '<?= $btn[$key]['name'] ?>' class = 'btn <?= $btn[$key]['bg'] ?>'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </button>
                            </td>
                            <td>
                                <button type = 'submit' name = 'data-del' class = 'btn btn-danger <?= $btn[$key]['del'] ?>'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                                        <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z"/>
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                    </svg>
                                </button>
                            </td>
                            <?php } } ?>
                        </form>
                    </tr>
                    <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>