
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>Instal·lació | Easy!Appointments</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto|Lato|Montserrat|Merriweather|Bitter|Lora|Inconsolata|Kalam">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="icon" type="image/x-icon" href="<?= asset_url('assets/img/favicon.ico') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/installation.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">
    <style>
        .uploadcare--widget__button.uploadcare--widget__button_type_open {
            background-color: #63adf2;
        }
    </style>
    <script>
        uploadcare.registerTab('preview', uploadcareTabEffects)
        UPLOADCARE_LOCALE = "ca"
    </script>
</head>
<body>
<div id="loading" class="d-none">
    <img src="<?= base_url('assets/img/loading.gif') ?>">
</div>

<header>
    <div class="container">
        <h1 class="page-title">Instal·lació Easy!Appointments</h1>
    </div>
</header>

<div class="content container">
    <div class="welcome">
        <h3>Benvinguts a la pàgina d'instal·lació de Easy!Appointments.</h3>
        <p>
            Aquesta pàgina us ajudarà a configurar els principals paràmetres de la pàgina.
            Podreu editar tots aquests paràmetres i molts més a la pàgina d'administradors del sistema.
            Simplement cal recordar d'utilitzar l'enllaç <strong class="text-primary"><?= site_url('backend') ?></strong>
            per connectar-vos a la pàgina d'administradors.

            Si teniu qualsevol problema durant l'ús de l'aplicació, no dubteu en contactar-nos a
            <a href="http://elkaribu.com/contact">elkaribu.com/contact</a> o enviant-nos un correu a
            <a href="mailto:info@elkaribu.com">info@elkaribu.com</a>. A més, disposeu de la documentació de l'aplicatiu
            de codi lliure prement <a href="http://easyappointments.org/docs.html">aquí</a>.
        </p>
    </div>

    <div class="alert d-none"></div>

    <div class="row">
        <div class="admin-settings col-12 col-sm-5">
            <h3>Administrador</h3>

            <div class="form-group">
                <label for="first-name" class="control-label">Nom</label>
                <input type="text" id="first-name" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="last-name" class="control-label">Cognoms</label>
                <input type="text" id="last-name" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input type="text" id="email" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="username" class="control-label">Nom d'usuari</label>
                <input type="text" id="username" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="password" class="control-label">Contrassenya</label>
                <input type="password" id="password" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="retype-password" class="control-label">Reescriu la contrassenya</label>
                <input type="password" id="retype-password" class="form-control"/>
            </div>

            <h3>Pàgina web</h3>

            <div class="form-group">
                <label for="website-title" class="control-label">Títol de la pàgina</label>
                <input type="text" id="website-title" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="website-description" class="control-label">Eslògan de l'empresa</label>
                <input type="text" id="website-description" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="website-logo" class="control-label">Logo de l'empresa</label>
                <input
                    type="hidden"
                    role="uploadcare-uploader"
                    data-public-key="8fa0bc9e7f65bd03a8d0"
                    data-images-only="true"
                    data-tabs="file"
                    data-effects="crop, flip, enhance, grayscale, blur, rotate, mirror, sharp, invert"
                />
            </div>

            <div class="form-group">
                <label for="color-theme" class="control-label">Color principal de la pàgina</label>
                <div class="btn-group-vertical" data-toggle="buttons">
                    <label class="btn btn-primary active">
                        <input type="radio" name="theme-color" value="primary" autocomplete="off" checked><img class="img-rounded" height="150px" src="<?= asset_url('assets/img/theme-colors/primary.png') ?>" alt="Color blau">
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="theme-color" value="secondary" autocomplete="off"><img class="img-rounded" height="150px" src="<?= asset_url('assets/img/theme-colors/secondary.png') ?>" alt="Color gris">
                    </label>
                    <label class="btn btn-success">
                        <input type="radio" name="theme-color" value="success" autocomplete="off"><img class="img-rounded" height="150px" src="<?= asset_url('assets/img/theme-colors/success.png') ?>" alt="Color verd">
                    </label>
                    <label class="btn btn-danger">
                        <input type="radio" name="theme-color" value="danger" autocomplete="off"><img class="img-rounded" height="150px" src="<?= asset_url('assets/img/theme-colors/danger.png') ?>" alt="Color vermell">
                    </label>
                    <label class="btn btn-warning">
                        <input type="radio" name="theme-color" value="warning" autocomplete="off"><img class="img-rounded" height="150px" src="<?= asset_url('assets/img/theme-colors/warning.png') ?>" alt="Color groc">
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="theme-color" value="info" autocomplete="off"><img class="img-rounded" height="150px" src="<?= asset_url('assets/img/theme-colors/info.png') ?>" alt="Color blau clar">
                    </label>
                    <label class="btn btn-dark">
                        <input type="radio" name="theme-color" value="dark" autocomplete="off"><img class="img-rounded" height="150px" src="<?= asset_url('assets/img/theme-colors/dark.png') ?>" alt="Color negre">
                    </label>
                </div>
            </div>
        </div>

        <div class="company-settings col-12 col-sm-5">
            <h3>Empresa</h3>

            <div class="form-group">
                <label for="company-name" class="control-label">Nom de l'empresa</label>
                <input type="text" id="company-name" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="company-email" class="control-label">Email de l'empresa</label>
                <input type="text" id="company-email" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="phone-number" class="control-label">Número de telèfon</label>
                <input type="text" id="phone-number" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="company-link" class="control-label">Enllaç al web de l'empresa</label>
                <input type="text" id="company-link" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="address"><?= lang('address') ?></label>
                <input id="address" class="form-control">
            </div>

            <div class="form-group">
                <label for="city"><?= lang('city') ?></label>
                <input id="city" class="form-control">
            </div>

            <div class="form-group">
                <label for="zip-code"><?= lang('zip_code') ?></label>
                <input id="zip-code" class="form-control">
            </div>

            <div class="form-group">
                <label for="font-family"><?= lang('font_family') ?> *</label>
                <div class="list-group">
                    <label class="list-group-item">
                        <input class="form-check-input me-1" name="font-family" type="radio" value="Roboto" style="font-family: Roboto;" aria-label="Selecciona fuente Roboto">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" name="font-family" type="radio" value="Lato" style="font-family: Lato;" aria-label="Selecciona fuente Lato">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" name="font-family" type="radio" value="Montserrat" style="font-family: Montserrat;" aria-label="Selecciona fuente Montserrat">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" name="font-family" type="radio" value="Merriweather" style="font-family: Merriweather;" aria-label="Selecciona fuente Merriweather">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" name="font-family" type="radio" value="Bitter" style="font-family: Bitter;" aria-label="Selecciona fuente Bitter">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" name="font-family" type="radio" value="Lora" style="font-family: Lora;" aria-label="Selecciona fuente Lora">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" name="font-family" type="radio" value="Inconsolata" style="font-family: Inconsolata;" aria-label="Selecciona fuente Inconsolata">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" name="font-family" type="radio" value="Kalam" style="font-family: Kalam;" aria-label="Selecciona fuente Kalam">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </label>
                </div>
            </div>
        </div>
    </div>

    <br>

    <p>
        Podrà configurar la lògica de l'empresa (horari, vacances, treballadors, etc.) en la secció d'administradors
        una vegada s'hagi completat la instal·lació.
        <br/>
        Prem el següent botó per completar la instal·lació.
    </p>

    <br/>

    <button type="button" id="install" class="btn btn-success btn-large">
        <i class="icon-white icon-ok mr-2"></i>
        Instal·lar Easy!Appointments
    </button>

    <br/>

    <p>
    <h3>Llicència</h3>
    Easy!Appointments té una llicència <span class="badge badge-default">GPL-3.0</span>.
    A l'utilitzar el programa Easy!Appointments en qualsevol forma <br/> vostè acceptarà els terminis descrits
    en el següent enllaç:
    <a href="https://www.gnu.org/licenses/gpl-3.0.en.html">https://www.gnu.org/licenses/gpl-3.0.en.html</a>
    </p>
</div>

<footer>
    Powered by <a href="https://easyappointments.org">Easy!Appointments</a> and <a href="https://www.elkaribu.com/ca">elKaribu</a>
</footer>

<script>
    var GlobalVariables = {
        csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
        baseUrl: <?= json_encode(config('base_url')) ?>
    };

    var EALang = <?= json_encode($this->lang->language) ?>;
</script>

<script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/datejs/date.min.js') ?>"></script>
<script src="<?= asset_url('assets/js/polyfill.js') ?>"></script>
<script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>
<script src="<?= asset_url('assets/js/installation.js') ?>"></script>
</body>
</html>
