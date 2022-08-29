<?php
/**
 * Created by PhpStorm.
 * User: Konel
 * Date: 04.11.2021
 * Time: 1:07
 */
?>

<div class = 'malfunctions_rank'>

    <div class = 'row empty-row'>
        <div class = 'col'></div>
    </div>

    <?php foreach ($malfunctions as $key => $value) { ?>
    <div class = 'row ranks'>
        <div class = 'row'>
            <div class = 'col title'><?= $value['section']['name'] ?></div>
        </div>
        <div class="accordion" id="accordionExample-<?= $key ?>">

        <?php foreach ($value as $key2 => $value2) { if (is_numeric($key2)) { ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-<?= $key.'-'.$key2 ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $key.'-'.$key2 ?>" aria-expanded="true" aria-controls="collapse-<?= $key.'-'.$key2 ?>">
                                <?= $value2['name'] ?>
                            </button>
                        </h2>
                        <div id="collapse-<?= $key.'-'.$key2 ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= $key.'-'.$key2 ?>" data-bs-parent="#accordionExample-<?= $key ?>">
                            <div class="accordion-body">
                                <div><b>Описание: </b><?= $value2['description'] ?></div>
                                <div><b>Рекомендации: </b><?= $value2['recommendation'] ?></div>
                            </div>
                        </div>
                    </div>

        <?php } } ?>
        </div>
    </div>

   <div class = 'row empty-row'>
       <div class = 'col'></div>
   </div>
    <?php } ?>

</div>