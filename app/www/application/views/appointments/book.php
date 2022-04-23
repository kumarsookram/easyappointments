<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="<?= $website_theme_color ?>">

    <title><?php if (isset($seo_title) && $seo_title !== ''): ?><?= $seo_title ?><?php else: ?><?= lang('page_title') ?><?php endif ?></title>

    <?php if (isset($seo_title) && $seo_title !== '' && isset($seo_description) && $seo_description !== ''): ?>
    <meta name="description" content="<?= $seo_description ?>">

    <!-- Open graph tags -->
    <meta property="og:title" content="<?= $seo_title ?>" />
    <meta property="og:description" content="<?= $seo_description ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?= $website_logo ?>" />
    <meta property="og:site_name" content="<?= lang('page_title') . ' | ' . $company_name ?>" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:locale:alternate" content="ca_ES" />

    <!-- Twitter card tags -->
    <meta property="twitter:title" content="<?= $seo_title ?>" />
    <meta property="twitter:description" content="<?= $seo_description ?>" />
    <meta property="twitter:image" content="<?= $website_logo ?>" />
    <?php endif; ?>
    <?php
    if (isset($company_twitter_link) && $company_twitter_link !== '')
    {
        $link_array = explode("/",$company_twitter_link);
        echo '<meta name="twitter:site" content="@' . end($link_array) . '"/>';
    }
    ?>

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/cookieconsent/cookieconsent.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/frontend.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/fontawesome/css/all.min.css') ?>">

    <link rel="icon" type="image/x-icon" href="<?= $website_logo ?>">

    <script src="<?= asset_url('assets/ext/fontawesome/js/fontawesome.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/fontawesome/js/solid.min.js') ?>"></script>
    <!-- general -->
    <style>
        body .ui-datepicker td a, body .ui-datepicker td span {
            color: <?= $website_theme_color ?> !important;
        }
        body .ui-datepicker .ui-slider-handle  {
            background-color: <?= $website_theme_color ?> !important;
        }
        body .ui-datepicker .ui-widget-header, body .ui-datepicker th, html body .ui-datepicker td a.ui-state-active,
        body .ui-datepicker td a.ui-state-highlight  {
            background: <?= $website_theme_color ?> !important;
        }
        body .ui-widget.ui-widget-content {
            border: 1px solid <?= $website_theme_color ?> !important;
        }
        body .ui-datepicker .ui-slider-handle {
            border-color: <?= $website_theme_color ?> !important;
        }
    </style>
</head>

<body>
<nav class="navbar text-<?= $text_color ?> bg-<?= $website_theme_color ?> px-md-5">
    <!-- Navbar content -->
    <div class="col-md-4 col-6">
        <a class="navbar-brand" href="/">
            <img src="<?= $website_logo ?>"  height="80" alt="Logo de <?= $company_name ?>" loading="lazy">
        </a>
    </div>
    <div class="col-md-4 col-6 text-center">
        <h1><?= $company_name ?></h1>
        <h5 class="d-none d-md-block"><?= $website_description ?></h5>
    </div>
    <div class="col-md-4 d-none d-md-block">
        <div class="row float-right">
            <div class="col col-md-auto">
                <?php if (isset($admin['mobile_number']) && $admin['mobile_number'] !== ''): ?>
                    <div class="row"><i class="fab fa-whatsapp mr-2"></i><?= $admin['mobile_number'] ?></div>
                <?php endif ?>
                <?php if (isset($admin['phone_number']) && $admin['phone_number'] !== ''): ?>
                    <div class="row"><i class="fas fa-phone-alt mr-2"></i><?= $admin['phone_number'] ?></div>
                <?php endif ?>
                <?php if (isset($admin['email']) && $admin['email'] !== ''): ?>
                    <div class="row"><i class="fas fa-envelope mr-2"></i><?= $admin['email'] ?></div>
                <?php endif ?>
                <div class="row">
                    <?php if (isset($company_facebook_link) && $company_facebook_link !== ''): ?>
                        <a target="_blank" href="<?= $company_facebook_link ?>">
                            <div class="icon rounded-circle" style="line-height: 22px !important;">
                                <i class="fa-brands fa-facebook"></i>
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if (isset($company_instagram_link) && $company_instagram_link !== ''): ?>
                        <a target="_blank" href="<?= $company_instagram_link ?>">
                            <div class="icon rounded-circle" style="line-height: 22px !important;">
                                <i class="fa-brands fa-instagram"></i>
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if (isset($company_twitter_link) && $company_twitter_link !== ''): ?>
                        <a target="_blank" href="<?= $company_twitter_link ?>">
                            <div class="icon rounded-circle" style="line-height: 22px !important;">
                                <i class="fa-brands fa-twitter"></i>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>
<?php if (! empty($website_images)): ?>
<section class="bg-<?= $text_color === 'white' ? 'light' : 'dark' ?>">
    <div class="container">
        <div class="row align-items-center pt-5" style="min-height: 450px;">
            <div class="col-lg-6 d-md-none d-lg-block text-lg-left text-center pl-5 pb-5">
                <h1 style="font-size: 5rem;"><?= $website_title ?></h1>
                <h3 class="text-muted mb-5"><?= $website_description ?></h3>
                <button class="btn-lg btn-<?= $website_theme_color ?>" href="#book-appointment-wizard"><?= lang('page_title')?></button>
            </div>
            <div class="col-lg-6 col-md-12">
                <div id="carousel" class="carousel slide" data-interval="false">
                    <ol class="carousel-indicators">
                        <?php foreach ($website_images as $key => $image): ?>
                            <?php if (isset($image) && $image !== ''): ?>
                            <li data-target="#carousel" data-slide-to="<?= $key ?>" <?php if ($key === 0): ?>class="active"<?php endif ?>></li>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php foreach ($website_images as $key => $image): ?>
                            <?php if (isset($image) && $image !== ''): ?>
                            <div class="carousel-item <?php if ($key === 0): ?>active<?php endif ?>">
                                <img src="<?= $image ?>" class="d-block w-100" alt="Image <?= $key ?> <?= $company_name ?>">
                            </div>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </div>
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if (isset($elfsight_review_code) && $elfsight_review_code !== ''): ?>
<section class="bg-<?= $website_theme_color === 'light' ? 'dark text-white' : 'light' ?>">
    <div class="container">
        <?php
            echo $elfsight_review_code;
        ?>
    </div>
</section>
<?php endif ?>
<section class="bg-<?= $text_color === 'white' ? 'light' : 'dark' ?>">
    <div class="container py-5">
        <div class="col-12">
            <h1><?= lang('make_appointment') ?></h1>
            <div id="book-appointment-wizard" class="color-<?= $website_theme_color ?> mt-3 mx-auto col-12 col-lg-10">
                <!-- FRAME TOP BAR -->
                <div id="header" class="bg-<?= $website_theme_color ?> border border-<?= $website_theme_color ?>">
                    <div id="steps">
                        <div id="step-1" class="book-step active-step"
                             data-tippy-content="<?= lang('service_and_provider') ?>">
                            <strong class="text-<?= $website_theme_color ?>">1</strong>
                        </div>

                        <div id="step-2" class="book-step" data-toggle="tooltip"
                             data-tippy-content="<?= lang('appointment_date_and_time') ?>">
                            <strong class="text-<?= $website_theme_color ?>">2</strong>
                        </div>
                        <div id="step-3" class="book-step" data-toggle="tooltip"
                             data-tippy-content="<?= lang('customer_information') ?>">
                            <strong class="text-<?= $website_theme_color ?>">3</strong>
                        </div>
                        <div id="step-4" class="book-step" data-toggle="tooltip"
                             data-tippy-content="<?= lang('appointment_confirmation') ?>">
                            <strong class="text-<?= $website_theme_color ?>">4</strong>
                        </div>
                    </div>
                </div>

                <?php if ($manage_mode): ?>
                    <div id="cancel-appointment-frame" class="row booking-header-bar">
                        <div class="col-12 col-md-10">
                            <small><?= lang('cancel_appointment_hint') ?></small>
                        </div>
                        <div class="col-12 col-md-2">
                            <form id="cancel-appointment-form" method="post"
                                  action="<?= site_url('appointments/cancel/' . $appointment_data['hash']) ?>">

                                <input type="hidden" name="csrfToken" value="<?= $this->security->get_csrf_hash() ?>"/>

                                <textarea name="cancel_reason" style="display:none"></textarea>

                                <button id="cancel-appointment" class="btn btn-warning btn-sm">
                                    <?= lang('cancel') ?>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="booking-header-bar row">
                        <div class="col-12 col-md-10">
                            <small><?= lang('delete_personal_information_hint') ?></small>
                        </div>
                        <div class="col-12 col-md-2">
                            <button id="delete-personal-information"
                                    class="btn btn-danger btn-sm"><?= lang('delete') ?></button>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (isset($exceptions)): ?>
                    <div style="margin: 10px">
                        <h4><?= lang('unexpected_issues') ?></h4>

                        <?php foreach ($exceptions as $exception): ?>
                            <?= exceptionToHtml($exception) ?>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>


                <!-- SELECT SERVICE AND PROVIDER -->

                <div id="wizard-frame-1" class="wizard-frame">
                    <div class="frame-container">
                        <h2 class="frame-title"><?= lang('service_and_provider') ?></h2>

                        <div class="row frame-content">
                            <div class="col">
                                <div class="form-group">
                                    <label for="select-service">
                                        <strong><?= lang('service') ?></strong>
                                    </label>

                                    <select id="select-service" class="form-control">
                                        <?php
                                        // Group services by category, only if there is at least one service with a parent category.
                                        $has_category = FALSE;
                                        foreach ($available_services as $service)
                                        {
                                            if ($service['category_id'] != NULL)
                                            {
                                                $has_category = TRUE;
                                                break;
                                            }
                                        }

                                        if ($has_category)
                                        {
                                            $grouped_services = [];

                                            foreach ($available_services as $service)
                                            {
                                                if ($service['category_id'] != NULL)
                                                {
                                                    if ( ! isset($grouped_services[$service['category_name']]))
                                                    {
                                                        $grouped_services[$service['category_name']] = [];
                                                    }

                                                    $grouped_services[$service['category_name']][] = $service;
                                                }
                                            }

                                            // We need the uncategorized services at the end of the list so we will use
                                            // another iteration only for the uncategorized services.
                                            $grouped_services['uncategorized'] = [];
                                            foreach ($available_services as $service)
                                            {
                                                if ($service['category_id'] == NULL)
                                                {
                                                    $grouped_services['uncategorized'][] = $service;
                                                }
                                            }

                                            foreach ($grouped_services as $key => $group)
                                            {
                                                $group_label = ($key != 'uncategorized')
                                                    ? $group[0]['category_name'] : 'Uncategorized';

                                                if (count($group) > 0)
                                                {
                                                    echo '<optgroup label="' . $group_label . '">';
                                                    foreach ($group as $service)
                                                    {
                                                        echo '<option value="' . $service['id'] . '">'
                                                            . $service['name'] . '</option>';
                                                    }
                                                    echo '</optgroup>';
                                                }
                                            }
                                        }
                                        else
                                        {
                                            foreach ($available_services as $service)
                                            {
                                                echo '<option value="' . $service['id'] . '">' . $service['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="select-provider">
                                        <strong><?= lang('provider') ?></strong>
                                    </label>

                                    <select id="select-provider" class="form-control"></select>
                                </div>

                                <div id="service-description"></div>
                            </div>
                        </div>
                    </div>

                    <div class="command-buttons">
                        <span>&nbsp;</span>

                        <button type="button" id="button-next-1" class="btn button-next btn-dark"
                                data-step_index="1">
                            <?= lang('next') ?>
                            <i class="fas fa-chevron-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- SELECT APPOINTMENT DATE -->

                <div id="wizard-frame-2" class="wizard-frame" style="display:none;">
                    <div class="frame-container">

                        <h2 class="frame-title"><?= lang('appointment_date_and_time') ?></h2>

                        <div class="row frame-content">
                            <div class="col-12 col-md-6">
                                <div id="select-date"></div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div id="select-time">
                                    <div class="form-group" style="display: none;">
                                        <label for="select-timezone"><?= lang('timezone') ?></label>
                                        <?= render_timezone_dropdown('id="select-timezone" class="form-control" value="Europe/Madrid"'); ?>
                                    </div>
                                    <div id="available-hours"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="command-buttons">
                        <button type="button" id="button-back-2" class="btn button-back btn-outline-secondary"
                                data-step_index="2">
                            <i class="fas fa-chevron-left mr-2"></i>
                            <?= lang('back') ?>
                        </button>
                        <button type="button" id="button-next-2" class="btn button-next btn-dark"
                                data-step_index="2">
                            <?= lang('next') ?>
                            <i class="fas fa-chevron-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- ENTER CUSTOMER DATA -->

                <div id="wizard-frame-3" class="wizard-frame" style="display:none;">
                    <div class="frame-container">

                        <h2 class="frame-title"><?= lang('customer_information') ?></h2>

                        <div class="row frame-content">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="first-name" class="control-label">
                                        <?= lang('first_name') ?>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="first-name" class="required form-control" maxlength="100"/>
                                </div>
                                <div class="form-group">
                                    <label for="last-name" class="control-label">
                                        <?= lang('last_name') ?>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="last-name" class="required form-control" maxlength="120"/>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email" class="control-label">
                                        <?= lang('email') ?>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="email" class="required form-control" maxlength="120"/>
                                </div>
                                <div class="form-group">
                                    <label for="phone-number" class="control-label">
                                        <?= lang('phone_number') ?>
                                        <?= $require_phone_number === '1' ? '<span class="text-danger">*</span>' : '' ?>
                                    </label>
                                    <input type="text" id="phone-number" maxlength="60"
                                           class="<?= $require_phone_number === '1' ? 'required' : '' ?> form-control"/>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="notes" class="control-label">
                                        <?= lang('notes') ?>
                                    </label>
                                    <textarea id="notes" maxlength="500" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-12" style="display: none;">
                                <div class="form-group">
                                    <label for="address" class="control-label">
                                        <?= lang('address') ?>
                                    </label>
                                    <input type="text" id="address" class="form-control" maxlength="120"/>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="control-label">
                                        <?= lang('city') ?>
                                    </label>
                                    <input type="text" id="city" class="form-control" maxlength="120"/>
                                </div>
                                <div class="form-group">
                                    <label for="zip-code" class="control-label">
                                        <?= lang('zip_code') ?>
                                    </label>
                                    <input type="text" id="zip-code" class="form-control" maxlength="120"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($display_terms_and_conditions): ?>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="required form-check-input" id="accept-to-terms-and-conditions">
                            <label class="form-check-label" for="accept-to-terms-and-conditions">
                                <?= strtr(lang('read_and_agree_to_terms_and_conditions'),
                                    [
                                        '{$link}' => '<a href="#" data-toggle="modal" data-target="#terms-and-conditions-modal">',
                                        '{/$link}' => '</a>'
                                    ])
                                ?>
                            </label>
                        </div>
                    <?php endif ?>

                    <?php if ($display_privacy_policy): ?>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="required form-check-input" id="accept-to-privacy-policy">
                            <label class="form-check-label" for="accept-to-privacy-policy">
                                <?= strtr(lang('read_and_agree_to_privacy_policy'),
                                    [
                                        '{$link}' => '<a href="#" data-toggle="modal" data-target="#privacy-policy-modal">',
                                        '{/$link}' => '</a>'
                                    ])
                                ?>
                            </label>
                        </div>
                    <?php endif ?>

                    <div class="command-buttons">
                        <button type="button" id="button-back-3" class="btn button-back btn-outline-secondary"
                                data-step_index="3">
                            <i class="fas fa-chevron-left mr-2"></i>
                            <?= lang('back') ?>
                        </button>
                        <button type="button" id="button-next-3" class="btn button-next btn-dark"
                                data-step_index="3">
                            <?= lang('next') ?>
                            <i class="fas fa-chevron-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- APPOINTMENT DATA CONFIRMATION -->

                <div id="wizard-frame-4" class="wizard-frame" style="display:none;">
                    <div class="frame-container">
                        <h2 class="frame-title"><?= lang('appointment_confirmation') ?></h2>
                        <div class="row frame-content">
                            <div id="appointment-details" class="col-12 col-md-6"></div>
                            <div id="customer-details" class="col-12 col-md-6"></div>
                        </div>
                        <?php if ($this->settings_model->get_setting('require_captcha') === '1'): ?>
                            <div class="row frame-content">
                                <div class="col-12 col-md-6">
                                    <h4 class="captcha-title">
                                        CAPTCHA
                                        <button class="btn btn-link text-dark text-decoration-none py-0">
                                            <i class="fas fa-sync-alt text-<?= $website_theme_color ?>"></i>
                                        </button>
                                    </h4>
                                    <img class="captcha-image" src="<?= site_url('captcha') ?>">
                                    <input class="captcha-text form-control" type="text" value=""/>
                                    <span id="captcha-hint" class="help-block" style="opacity:0">&nbsp;</span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="command-buttons" style="justify-content: space-around;">
                        <form id="book-appointment-form" style="display:inline-block" method="post">
                            <button id="book-appointment-submit" type="button" class="btn btn-<?= $website_theme_color ?>">
                                <i class="fas fa-check-square mr-2"></i>
                                <?= ! $manage_mode ? lang('confirm') : lang('update') ?>
                            </button>
                            <input type="hidden" name="csrfToken"/>
                            <input type="hidden" name="post_data"/>
                        </form>
                    </div>
                    <div class="command-buttons">
                        <button type="button" id="button-back-4" class="btn button-back btn-outline-secondary"
                                data-step_index="4">
                            <i class="fas fa-chevron-left mr-2"></i>
                            <?= lang('back') ?>
                        </button>
                    </div>
                </div>

                <!-- FRAME FOOTER -->

                <div id="frame-footer">
                    <small>
                        <span class="footer-powered-by">
                            Powered By

                            <a href="https://easyappointments.org" target="_blank">Easy!Appointments</a>

                            &amp;

                            <a href="https://www.elkaribu.com" target="_blank">elKaribu</a>
                        </span>

                        <span class="footer-options">
                            <span id="select-language" class="badge badge-secondary">
                                <i class="fas fa-language mr-2"></i>
                                <?= ucfirst(config('language')) ?>
                            </span>

                            <a class="backend-link badge badge-<?= $website_theme_color ?>" href="<?= site_url('backend'); ?>">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                <?= $this->session->user_id ? lang('backend_section') : lang('login') ?>
                            </a>
                        </span>
                    </small>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-<?= $text_color === 'white' ? 'light' : 'dark' ?>">
    <div class="container py-2">
        <div class="row">
            <div class="col-lg-3 col-8">
                <h1 class="text-center mb-3"><i class="fa-solid fa-clock mr-2"></i><?= lang('schedule') ?></h1>
                <?php foreach ($company_working_plan as $day => $wp): ?>
                    <div class="row">
                        <div class="col-4 text-left">
                            <h5><?= lang($day) ?>:</h5>
                        </div>
                        <div class="col-8 text-right">
                            <?php if (isset($wp) && $wp !== ''): ?>
                                <p><?= $wp['start'] ?>h <?php foreach ($wp['breaks'] as $break): ?>- <?= $break['start'] ?>h<br/> <?= $break['end'] ?>h<?php endforeach ?> - <?= $wp['end'] ?>h</p>
                            <?php else: ?>
                                <p><?= lang('closed') ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="col-lg-9 col-12">
                <?php if (isset($admin['address']) && $admin['address'] !== ''): ?>
                <div class="my-3">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <style>iframe {width:100%;height:100%;}</style>
                            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=<?= $admin['address'] ?>%20<?= $admin['city'] ?>%20<?= $admin['zip_code'] ?>&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <style>.mapouter{position:relative;text-align:right;height:500px;}</style>
                            <style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;}</style>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<section class="bg-<?= $website_theme_color ?> text-<?= $text_color ?> pt-3 pb-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-6 text-center">
                <a href="/">
                    <img src="<?= $website_logo ?>"  height="100" alt="<?= 'Logo de ' . $company_name ?>" loading="lazy">
                </a>
            </div>
            <div class="col-md-8 col-sm-12 col-10">
                <div class="row">
                    <a class="text-<?= $text_color ?>" style="text-decoration: none;" href="<?= $company_link ?>"><h1><?= $company_name ?></h1></a>
                </div>
                <div class="row bg-<?= $text_color ?> mt-2" style="height: 2px;"></div>
                <div class="row">
                    <div class="col">
                        <?php if (isset($admin['mobile_number']) && $admin['mobile_number'] !== ''): ?>
                            <div class="row mt-2"><i class="fab fa-whatsapp mr-2"></i><?= $admin['mobile_number'] ?></div>
                        <?php endif ?>
                        <?php if (isset($admin['phone_number']) && $admin['phone_number'] !== ''): ?>
                            <div class="row mt-2"><i class="fas fa-phone-alt mr-2"></i><?= $admin['phone_number'] ?></div>
                        <?php endif ?>
                        <?php if (isset($admin['email']) && $admin['email'] !== ''): ?>
                            <div class="row mt-2"><i class="fas fa-envelope mr-2"></i><?= $admin['email'] ?></div>
                        <?php endif ?>
                        <?php if (isset($admin['address']) && $admin['address'] !== ''): ?>
                            <div class="row mt-2"><i class="fa-solid fa-building mr-2"></i><?= $admin['address'] . ', ' . $admin['zip_code'] . ' ' . $admin['city'] ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row bg-<?= $text_color ?> mt-2" style="height: 2px;"></div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col text-center">
                <?php if (isset($company_facebook_link) && $company_facebook_link !== ''): ?>
                    <a target="_blank" href="<?= $company_facebook_link ?>">
                        <div class="icon rounded-circle" style="line-height: 22px !important;">
                            <i class="fa-brands fa-facebook"></i>
                        </div>
                    </a>
                <?php endif; ?>
                <?php if (isset($company_instagram_link) && $company_instagram_link !== ''): ?>
                    <a target="_blank" href="<?= $company_instagram_link ?>">
                        <div class="icon rounded-circle" style="line-height: 22px !important;">
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                    </a>
                <?php endif; ?>
                <?php if (isset($company_twitter_link) && $company_twitter_link !== ''): ?>
                    <a target="_blank" href="<?= $company_twitter_link ?>">
                        <div class="icon rounded-circle" style="line-height: 22px !important;">
                            <i class="fa-brands fa-twitter"></i>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-center">
                Powered by <a href="https://www.elkaribu.com" target="_blank" style="color: #63ADF2;">elKaribu
                <img class="pb-1" src="<?= base_url('assets/img/elkaribu-16x16.png') ?>" alt="elKaribu SL Logo"></a>
            </div>
        </div>
    </div>
</section>

<?php if ($display_cookie_notice === '1'): ?>
    <?php require 'cookie_notice_modal.php' ?>
<?php endif ?>

<?php if ($display_terms_and_conditions === '1'): ?>
    <?php require 'terms_and_conditions_modal.php' ?>
<?php endif ?>

<?php if ($display_privacy_policy === '1'): ?>
    <?php require 'privacy_policy_modal.php' ?>
<?php endif ?>

<script>
    var GlobalVariables = {
        availableServices: <?= json_encode($available_services) ?>,
        availableProviders: <?= json_encode($available_providers) ?>,
        baseUrl: <?= json_encode(config('base_url')) ?>,
        manageMode: <?= $manage_mode ? 'true' : 'false' ?>,
        customerToken: <?= json_encode($customer_token) ?>,
        dateFormat: <?= json_encode($date_format) ?>,
        timeFormat: <?= json_encode($time_format) ?>,
        firstWeekday: <?= json_encode($first_weekday) ?>,
        displayCookieNotice: <?= json_encode($display_cookie_notice === '1') ?>,
        appointmentData: <?= json_encode($appointment_data) ?>,
        providerData: <?= json_encode($provider_data) ?>,
        customerData: <?= json_encode($customer_data) ?>,
        displayAnyProvider: <?= json_encode($display_any_provider) ?>,
        csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
        website_theme_color: <?= json_encode($website_theme_color) ?>
    };

    var EALang = <?= json_encode($this->lang->language) ?>;
    var availableLanguages = <?= json_encode(config('available_languages')) ?>;
</script>

<script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/cookieconsent/cookieconsent.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/popper/popper.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/tippy/tippy-bundle.umd.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/datejs/date.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/moment/moment.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/moment/moment-timezone-with-data.min.js') ?>"></script>
<script src="<?= asset_url('assets/js/frontend_book_api.js') ?>"></script>
<script src="<?= asset_url('assets/js/frontend_book.js') ?>"></script>

<script>
    $(function () {
        FrontendBook.initialize(true, GlobalVariables.manageMode);
        GeneralFunctions.enableLanguageSelection($('#select-language'));
    });
</script>

<?php google_analytics_script(); ?>
</body>
</html>
