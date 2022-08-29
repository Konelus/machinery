<ul class = 'nav row'>
    <li>
        <a href = '/?page=test'>
            <div class = 'col nav-link'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                    <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                </svg>
                <span>Диагностика</span>
            </div>
        </a>
    </li>
    <li>
        <a href = '/?page=malfunctions_rank'>
            <div class = 'col nav-link'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                </svg>
                <span>Частые поломки</span>
            </div>
        </a>
    </li>
    <?php if ($_COOKIE['user']) { ?>
        <li>
            <a href = '/?page=profile'>
                <div class = 'col nav-link'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                    </svg>
                    <span>Личный кабинет</span>
                </div>
            </a>
        </li>
        <li>
            <a href = '/?page=check'>
                <div class = 'col nav-link'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                    </svg>
                    <span>Проверка авто</span>
                </div>
            </a>
        </li>
    <?php } ?>
    <li>
        <a href = '/?page=feedback'>
            <div class = 'col nav-link'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-text" viewBox="0 0 16 16">
                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                    <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                </svg>
                <span>Обратная связь</span>
            </div>
        </a>
    </li>
    <?php if ($user['status'] == '1') { ?>
    <li>
        <div class = 'nav-row-admin'></div>
        <a href = '/?page=malfunctions&page-type=malfunctions'>
            <div class = 'col nav-link'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench-adjustable" viewBox="0 0 16 16">
                    <path d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z"/>
                    <path d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                </svg>
                <span>Неисправности</span>
            </div>
        </a>
    </li>
        <li>
            <a href = '/?page=malfunctions&page-type=signs'>
                <div class = 'col nav-link'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                        <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
                    </svg>
                    <span>Признаки</span>
                </div>
            </a>
        </li>
        <?php } ?>
    <li>
        <div class = 'nav-row-admin'></div>
        <form method = "post">
            <?php if ($_COOKIE['user']) { ?>
                <button type = 'submit' name = 'logout'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                        <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                        <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                    </svg>
                    <span>Выход</span>
                </button>
            <?php } else { $userNav = array(); if (($_GET['user'] == 'login') || (!$_GET['user']))
            {
                $userNav['login']['title'] = 'nav-reg-active';
                $userNav['login']['text'] = 'nav-reg-active-text';
                $userNav['reg']['link'] = "/?page={$_GET['page']}&user=reg";
                $userNav['btn']['text'] = 'Войти в систему';
                $userNav['btn']['name'] = 'login';
            }
            else
            {
                $userNav['reg']['title']  = 'nav-reg-active';
                $userNav['reg']['text'] = 'nav-reg-active-text';
                $userNav['login']['link'] = "/?page={$_GET['page']}&user=login";
                $userNav['btn']['text'] = 'Зарегистрироваться';
                $userNav['btn']['name'] = 'reg';
            } ?>


                <div class = 'row naw-reg-row'>
                    <?php if ($_GET['user']) { $userShow = ''; $background = 'on'; }
                    else { $userShow = '&user=login'; $background = 'off'; } ?>
                    <div class = 'reg-<?= $background ?>-btn-div'>
                        <a href = '/?page=<?= $_GET['page'].$userShow ?>'>
                            <div class = 'col nav-link'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                                    <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                                    <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                                </svg>
                                <span>Вход / Регистрация</span>
                            </div>
                        </a>
                    </div>

                    <?php if ($_GET['user']) { ?>
                        <div class = 'col-4 nav-link nav-reg <?= $userNav['login']['title'] ?>'>
                            <?php if ($userNav['login']['link']) { ?>
                                <a href = '<?= $userNav['login']['link'] ?>'>
                                    <div class = 'nav-reg-text'>Вход</div>
                                </a>
                            <?php } else { ?>
                                <div class = 'nav-reg-text'>
                                    <span class = '<?= $userNav['login']['text'] ?>'>Вход</span>
                                </div>
                            <?php } ?>
                        </div>

                        <div class = 'col-8 nav-link nav-reg <?= $userNav['reg']['title'] ?>'>
                            <?php if ($userNav['reg']['link']) { ?>
                                <a href = '<?= $userNav['reg']['link'] ?>'>
                                    <div class = 'nav-reg-text'>Регистрация</div>
                                </a>
                            <?php } else { ?>
                                <div class = 'nav-reg-text'>
                                    <span class = '<?= $userNav['reg']['text'] ?>'>Регистрация</span>
                                </div>
                            <?php } ?>
                        </div>


                        <?php if ($errorReg == 1) {?>
                            <div class = 'alert alert-danger'>Введите другие данные <br>или войдите в систему!</div>
                        <?php } elseif ($errorLog == 1) { ?>
                            <div class = 'alert alert-danger'>Пользователь не найден!</div>
                        <?php } ?>
                        <div class = 'col-12 nav-reg-input-div'>
                            <div class = 'input-group'>
                                <div class = 'input-group-prepend'>
                                    <div class = 'input-group-text'>
                                        <label for = 'name'>Логин</label>
                                    </div>
                                </div>
                                <input type = 'text' class = 'form-control' id = 'name' name = 'name' required>
                            </div>
                        </div>
                        <div class = 'col-12 nav-reg-input-div'>
                            <div class = 'input-group'>
                                <div class = 'input-group-prepend'>
                                    <div class = 'input-group-text'>
                                        <label for = 'password'>Пароль</label>
                                    </div>
                                </div>
                                <input type = 'password' class = 'form-control' id = 'password' name = 'password' required>
                            </div>
                        </div>
                        <?php if ($userNav['reg']['title']) { ?>
                            <div class = 'col-12 nav-reg-input-div'>
                                <div class = 'input-group'>
                                    <div class = 'input-group-prepend'>
                                        <div class = 'input-group-text'>
                                            <label for = 'email'>Email</label>
                                        </div>
                                    </div>
                                    <input type = 'email' class = 'form-control' id = 'email' name = 'email' required>
                                </div>
                            </div>
                        <?php } ?>
                        <div class = 'col-12 nav-reg-input-div'>
                            <input type = 'submit' class = 'btn btn-dark' name = '<?= $userNav['btn']['name'] ?>' value = '<?= $userNav['btn']['text'] ?>'>
                        </div>
                    <?php } ?>

                </div>

            <?php } ?>
        </form>
    </li>
</ul>