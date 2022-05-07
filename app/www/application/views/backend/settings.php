<link rel="stylesheet"
 href="https://fonts.googleapis.com/css?family=Roboto|Lato|Montserrat|Merriweather|Bitter|Lora|Inconsolata|Kalam">
<script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
<script src="https://ucarecdn.com/libs/widget-tab-effects/1.x/uploadcare.tab-effects.min.js"></script>
<style>
    .uploadcare--widget__button.uploadcare--widget__button_type_open {
        background-color: #63adf2;
    }
</style>
<script>
    uploadcare.registerTab('preview', uploadcareTabEffects);
    UPLOADCARE_LOCALE = "ca";
    UPLOADCARE_LOCALE_TRANSLATIONS = {
        buttons: {
            choose: {
                images: {
                    one: "<?= lang('choose_image') ?>",
                    other: "<?= lang('choose_images') ?>"
                }
            }
        }
    };
</script>
<script src="<?= asset_url('assets/js/backend_settings_system.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_settings_user.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_settings.js') ?>"></script>
<script src="<?= asset_url('assets/js/working_plan.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui-timepicker-addon.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-jeditable/jquery.jeditable.min.js') ?>"></script>
<script>
    var GlobalVariables = {
        csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
        baseUrl: <?= json_encode($base_url) ?>,
        dateFormat: <?= json_encode($date_format) ?>,
        firstWeekday: <?= json_encode($first_weekday); ?>,
        timeFormat: <?= json_encode($time_format) ?>,
        userSlug: <?= json_encode($role_slug) ?>,
        timezones: <?= json_encode($timezones) ?>,
        settings: {
            system: <?= json_encode($system_settings) ?>,
            user: <?= json_encode($user_settings) ?>
        },
        user: {
            id: <?= $user_id ?>,
            email: <?= json_encode($user_email) ?>,
            timezone: <?= json_encode($timezone) ?>,
            role_slug: <?= json_encode($role_slug) ?>,
            privileges: <?= json_encode($privileges) ?>
        }
    };

    $(function () {
        BackendSettings.initialize(true);
    });
</script>

<div id="settings-page" class="container-fluid backend-page">
    <ul class="nav nav-pills">
        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE): ?>
            <li class="nav-item">
                <a class="nav-link active" href="#general" data-toggle="tab"><?= lang('general') ?></a>
            </li>
        <?php endif ?>
        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE): ?>
            <li class="nav-item">
                <a class="nav-link" href="#website" data-toggle="tab"><?= lang('main_page') ?></a>
            </li>
        <?php endif ?>
        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE): ?>
            <li class="nav-item">
                <a class="nav-link" href="#business-logic" data-toggle="tab"><?= lang('business_logic') ?></a>
            </li>
        <?php endif ?>
        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE): ?>
            <li class="nav-item">
                <a class="nav-link" href="#legal-contents" data-toggle="tab"><?= lang('legal_contents') ?></a>
            </li>
        <?php endif ?>
        <?php if ($privileges[PRIV_USER_SETTINGS]['view'] == TRUE): ?>
            <li class="nav-item">
                <a class="nav-link" href="#current-user" data-toggle="tab"><?= lang('current_user') ?></a>
            </li>
        <?php endif ?>
        <li class="nav-item">
            <a class="nav-link" href="#about-app" data-toggle="tab"><?= lang('about_app') ?></a>
        </li>
    </ul>

    <div class="tab-content">

        <!-- GENERAL TAB -->

        <?php $hidden = ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE) ? '' : 'd-none' ?>
        <div class="tab-pane active <?= $hidden ?>" id="general">
            <form>
                <fieldset>
                    <legend class="border-bottom mb-4">
                        <?= lang('general_settings') ?>
                        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['edit'] == TRUE): ?>
                            <button type="button" class="save-settings btn btn-primary btn-sm mb-2"
                                    data-tippy-content="<?= lang('save') ?>">
                                <i class="fas fa-check-square mr-2"></i>
                                <?= lang('save') ?>
                            </button>
                        <?php endif ?>
                    </legend>

                    <div class="wrapper row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="company-name"><?= lang('company_name') ?> *</label>
                                <input id="company-name" data-field="company_name" class="required form-control">
                                <span class="form-text text-muted">
                                    <?= lang('company_name_hint') ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="company-email"><?= lang('company_email') ?> *</label>
                                <input id="company-email" data-field="company_email" class="required form-control">
                                <span class="form-text text-muted">
                                    <?= lang('company_email_hint') ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="company-link"><?= lang('company_link') ?> *</label>
                                <input id="company-link" data-field="company_link" class="required form-control">
                                <span class="form-text text-muted">
                                    <?= lang('company_link_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="date-format">
                                    <?= lang('date_format') ?>
                                </label>
                                <select class="form-control" id="date-format" data-field="date_format">
                                    <option value="DMY">DMY</option>
                                    <option value="MDY">MDY</option>
                                    <option value="YMD">YMD</option>
                                </select>
                                <span class="form-text text-muted">
                                    <?= lang('date_format_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="time-format">
                                    <?= lang('time_format') ?>
                                </label>
                                <select class="form-control" id="time-format" data-field="time_format">
                                    <option value="<?= TIME_FORMAT_REGULAR ?>">H:MM AM/PM</option>
                                    <option value="<?= TIME_FORMAT_MILITARY ?>">HH:MM</option>
                                </select>
                                <span class="form-text text-muted">
                                    <?= lang('time_format_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="first-weekday">
                                    <?= lang('first_weekday') ?>
                                </label>
                                <select class="form-control" id="first-weekday" data-field="first_weekday">
                                    <option value="sunday"><?= lang('sunday') ?></option>
                                    <option value="monday"><?= lang('monday') ?></option>
                                    <option value="tuesday"><?= lang('tuesday') ?></option>
                                    <option value="wednesday"><?= lang('wednesday') ?></option>
                                    <option value="thursday"><?= lang('thursday') ?></option>
                                    <option value="friday"><?= lang('friday') ?></option>
                                    <option value="saturday"><?= lang('saturday') ?></option>
                                </select>
                                <span class="help-block">
                                    <?= lang('first_weekday_hint') ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="google-analytics-code">
                                    Google Analytics ID</label>
                                <input id="google-analytics-code" placeholder="UA-XXXXXXXX-XX o G-XXXXXXXXXX"
                                       data-field="google_analytics_code" class="form-control">
                                <span class="help-block">
                                    <?= lang('google_analytics_code_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="api-token">API Token</label>
                                <input id="api-token" data-field="api_token" class="form-control">
                                <span class="help-block">
                                    <?= lang('api_token_hint') ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customer-notifications">
                                    <label class="custom-control-label" for="customer-notifications">
                                        <?= lang('customer_notifications') ?>
                                    </label>
                                </div>
                                <span class="form-text text-muted">
                                    <?= lang('customer_notifications_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="provider-notifications">
                                    <label class="custom-control-label" for="provider-notifications">
                                        <?= lang('provider_notifications') ?>
                                    </label>
                                </div>
                                <span class="form-text text-muted">
                                    <?= lang('provider_notifications_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="secretary-notifications">
                                    <label class="custom-control-label" for="secretary-notifications">
                                        <?= lang('secretary_notifications') ?>
                                    </label>
                                </div>
                                <span class="form-text text-muted">
                                    <?= lang('secretary_notifications_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="admin-notifications">
                                    <label class="custom-control-label" for="admin-notifications">
                                        <?= lang('admin_notifications') ?>
                                    </label>
                                </div>
                                <span class="form-text text-muted">
                                    <?= lang('admin_notifications_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="require-captcha">
                                    <label class="custom-control-label" for="require-captcha">
                                        CAPTCHA
                                    </label>
                                </div>
                                <span class="form-text text-muted">
                                    <?= lang('require_captcha_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="require-phone-number">
                                    <label class="custom-control-label" for="require-phone-number">
                                        <?= lang('phone_number') ?>
                                    </label>
                                </div>
                                <span class="help-block">
                                    <?= lang('require_phone_number_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="display-any-provider">
                                    <label class="custom-control-label" for="display-any-provider">
                                        <?= lang('any_provider') ?>
                                    </label>
                                </div>
                                <span class="help-block">
                                    <?= lang('display_any_provider_hint') ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <!-- WEBSITE TAB -->

        <?php $hidden = ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE) ? '' : 'd-none' ?>
        <div class="tab-pane <?= $hidden ?>" id="website">
            <form>
                <fieldset>
                    <legend class="border-bottom mb-4">
                        <?= lang('website_settings') ?>
                        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['edit'] == TRUE): ?>
                            <button type="button" class="save-settings btn btn-primary btn-sm mb-2"
                                    data-tippy-content="<?= lang('save') ?>">
                                <i class="fas fa-check-square mr-2"></i>
                                <?= lang('save') ?>
                            </button>
                        <?php endif ?>
                    </legend>

                    <div class="wrapper row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="website-title"><?= lang('website_title') ?> *</label>
                                <input id="website-title" data-field="website_title" class="required form-control">
                                <span class="form-text text-muted">
                                    <?= lang('website_title_hint') ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="website-description"><?= lang('website_description') ?> *</label>
                                <input id="website-description" data-field="website_description" class="required form-control">
                                <span class="form-text text-muted">
                                    <?= lang('website_description_hint') ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="seo-title"><?= lang('seo_title') ?></label>
                                <input id="seo-title" data-field="seo_title" class="form-control">
                                <span class="form-text text-muted">
                                    <?= lang('seo_title_hint') ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="seo-description"><?= lang('seo_description') ?></label>
                                <input id="seo-description" data-field="seo_description" class="form-control">
                                <span class="form-text text-muted">
                                    <?= lang('seo_description_hint') ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="website-logo"><?= lang('website_logo') ?> *</label>
                                <span class="form-text text-muted">
                                    <?= lang('website_logo_hint') ?>
                                </span>
                                <br/>
                                <input
                                    id="website-logo"
                                    data-field="website_logo"
                                    type="hidden"
                                    role="uploadcare-uploader"
                                    data-public-key="8fa0bc9e7f65bd03a8d0"
                                    data-images-only="true"
                                    data-tabs=""file facebook gdrive gphotos""
                                    data-effects="crop, flip, enhance, grayscale, blur, rotate, mirror, sharp, invert"
                                />
                            </div>
                            <div class="form-group">
                                <label for="font-family"><?= lang('font_family') ?> *</label>
                                <div class="list-group">
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" name="font-family" type="radio" value="Roboto" aria-label="Selecciona fuente Roboto">
                                        <span style="font-family: Roboto;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" name="font-family" type="radio" value="Lato" aria-label="Selecciona fuente Lato">
                                        <span style="font-family: Lato;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" name="font-family" type="radio" value="Montserrat" aria-label="Selecciona fuente Montserrat">
                                        <span style="font-family: Montserrat;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" name="font-family" type="radio" value="Merriweather" aria-label="Selecciona fuente Merriweather">
                                        <span style="font-family: Merriweather;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" name="font-family" type="radio" value="Bitter" aria-label="Selecciona fuente Bitter">
                                        <span style="font-family: Bitter;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" name="font-family" type="radio" value="Lora" aria-label="Selecciona fuente Lora">
                                        <span style="font-family: Lora;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" name="font-family" type="radio" value="Inconsolata" aria-label="Selecciona fuente Inconsolata">
                                        <span style="font-family: Inconsolata;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" name="font-family" type="radio" value="Kalam" aria-label="Selecciona fuente Kalam">
                                        <span style="font-family: Kalam;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="theme-color"><?= lang('theme_color') ?> *</label>
                                <div class="list-group" style="width: 40%;">
                                    <label class="list-group-item list-group-item-primary">
                                        <input class="form-check-input me-1" name="theme-color" type="radio" value="primary" aria-label="Selecciona color <?= lang('color_primary') ?>">
                                        <?= lang('color_primary') ?>
                                    </label>
                                    <label class="list-group-item list-group-item-secondary">
                                        <input class="form-check-input me-1" name="theme-color" type="radio" value="secondary" aria-label="Selecciona color <?= lang('color_secondary') ?>">
                                        <?= lang('color_secondary') ?>
                                    </label>
                                    <label class="list-group-item list-group-item-success">
                                        <input class="form-check-input me-1" name="theme-color" type="radio" value="success" aria-label="Selecciona color <?= lang('color_success') ?>">
                                        <?= lang('color_success') ?>
                                    </label>
                                    <label class="list-group-item list-group-item-danger">
                                        <input class="form-check-input me-1" name="theme-color" type="radio" value="danger" aria-label="Selecciona color <?= lang('color_danger') ?>">
                                        <?= lang('color_danger') ?>
                                    </label>
                                    <label class="list-group-item list-group-item-warning">
                                        <input class="form-check-input me-1" name="theme-color" type="radio" value="warning" aria-label="Selecciona color <?= lang('color_warning') ?>">
                                        <?= lang('color_warning') ?>
                                    </label>
                                    <label class="list-group-item list-group-item-info">
                                        <input class="form-check-input me-1" name="theme-color" type="radio" value="info" aria-label="Selecciona color <?= lang('color_info') ?>">
                                        <?= lang('color_info') ?>
                                    </label>
                                    <label class="list-group-item list-group-item-dark">
                                        <input class="form-check-input me-1" name="theme-color" type="radio" value="dark" aria-label="Selecciona color <?= lang('color_dark') ?>">
                                        <?= lang('color_dark') ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-5 breaks-wrapper">
                            <div class="form-group">
                                <label for="website-images"><?= lang('website_images') ?></label>
                                <span class="form-text text-muted">
                                    <?= lang('website_images_hint') ?>
                                </span>
                                <br/>
                                <input
                                    id="website-images"
                                    data-field="website_images"
                                    type="hidden"
                                    role="uploadcare-uploader"
                                    data-public-key="8fa0bc9e7f65bd03a8d0"
                                    data-multiple="true"
                                    data-images-only="true"
                                    data-tabs="file facebook gdrive gphotos"
                                    data-effects="crop, flip, enhance, grayscale, blur, rotate, mirror, sharp, invert"
                                />
                            </div>

                            <div class="form-group">
                                <label for="company-instagram-link"><?= lang('company_instagram_link') ?></label>
                                <input id="company-instagram-link" data-field="company_instagram_link" class="form-control">
                                <span class="form-text text-muted">
                                    <?= lang('company_instagram_link_hint') ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="company-facebook-link"><?= lang('company_facebook_link') ?></label>
                                <input id="company-facebook-link" data-field="company_facebook_link" class="form-control">
                                <span class="form-text text-muted">
                                    <?= lang('company_facebook_link_hint') ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="company-twitter-link"><?= lang('company_twitter_link') ?></label>
                                <input id="company-twitter-link" data-field="company_twitter_link" class="form-control">
                                <span class="form-text text-muted">
                                    <?= lang('company_twitter_link_hint') ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="elfsight-review-code"><?= lang('elfsight_review_code') ?></label>
                                <input id="elfsight-review-code" data-field="elfsight_review_code" class="form-control">
                                <span class="form-text text-muted">
                                    <?= lang('elfsight_review_code_hint') ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <!-- BUSINESS LOGIC TAB -->

        <?php $hidden = ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE) ? '' : 'd-none' ?>
        <div class="tab-pane <?= $hidden ?>" id="business-logic">
            <form>
                <fieldset>
                    <legend class="border-bottom mb-4">
                        <?= lang('business_logic') ?>
                        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['edit'] == TRUE): ?>
                            <button type="button" class="save-settings btn btn-primary btn-sm mb-2"
                                    data-tippy-content="<?= lang('save') ?>">
                                <i class="fas fa-check-square mr-2"></i>
                                <?= lang('save') ?>
                            </button>
                        <?php endif ?>
                    </legend>

                    <div class="row">
                        <div class="col-12 col-sm-7 working-plan-wrapper">
                            <h4><?= lang('working_plan') ?></h4>
                            <span class="form-text text-muted mb-4">
                                <?= lang('edit_working_plan_hint') ?>
                            </span>

                            <table class="working-plan table table-striped">
                                <thead>
                                <tr>
                                    <th><?= lang('day') ?></th>
                                    <th><?= lang('start') ?></th>
                                    <th><?= lang('end') ?></th>
                                </tr>
                                </thead>
                                <tbody><!-- Dynamic Content --></tbody>
                            </table>

                            <div class="text-right">
                                <button class="btn btn-outline-secondary" id="apply-global-working-plan" type="button">
                                    <i class="fas fa-check"></i>
                                    <?= lang('apply_to_all_providers') ?>
                                </button>
                            </div>

                            <br>

                            <h4><?= lang('book_advance_timeout') ?></h4>
                            <div class="form-group">
                                <label for="book-advance-timeout"
                                       class="control-label"><?= lang('timeout_minutes') ?></label>
                                <input id="book-advance-timeout" data-field="book_advance_timeout" class="form-control"
                                       type="number" min="15">
                                <p class="form-text text-muted">
                                    <?= lang('book_advance_timeout_hint') ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-5 breaks-wrapper">
                            <h4><?= lang('breaks') ?></h4>

                            <span class="form-text text-muted">
                                <?= lang('edit_breaks_hint') ?>
                            </span>

                            <div class="mt-2">
                                <button type="button" class="add-break btn btn-primary">
                                    <i class="fas fa-plus-square"></i>
                                    <?= lang('add_break'); ?>
                                </button>
                            </div>

                            <br>

                            <table class="breaks table table-striped">
                                <thead>
                                <tr>
                                    <th><?= lang('day') ?></th>
                                    <th><?= lang('start') ?></th>
                                    <th><?= lang('end') ?></th>
                                    <th><?= lang('actions') ?></th>
                                </tr>
                                </thead>
                                <tbody><!-- Dynamic Content --></tbody>
                            </table>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <!-- LEGAL CONTENTS TAB -->

        <?php $hidden = ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE) ? '' : 'd-none' ?>
        <div class="tab-pane <?= $hidden ?>" id="legal-contents">
            <form>
                <fieldset>
                    <legend class="border-bottom mb-4">
                        <?= lang('legal_contents') ?>
                        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['edit'] == TRUE): ?>
                            <button type="button" class="save-settings btn btn-primary btn-sm mb-2"
                                    data-tippy-content="<?= lang('save') ?>">
                                <i class="fas fa-check-square mr-2"></i>
                                <?= lang('save') ?>
                            </button>
                        <?php endif ?>
                    </legend>

                    <div class="row">
                        <div class="col-12 col-sm-11 col-md-10 col-lg-9">
                            <h4><?= lang('cookie_notice') ?></h4>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="display-cookie-notice">
                                    <label class="custom-control-label" for="display-cookie-notice">
                                        <?= lang('display_cookie_notice') ?>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?= lang('cookie_notice_content') ?></label>
                                <textarea id="cookie-notice-content" cols="30" rows="10" class="form-group"></textarea>
                            </div>

                            <br>

                            <h4><?= lang('terms_and_conditions') ?></h4>

                            <div class="form-group">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"
                                               id="display-terms-and-conditions">
                                        <label class="custom-control-label" for="display-terms-and-conditions">
                                            <?= lang('display_terms_and_conditions') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?= lang('terms_and_conditions_content') ?></label>
                                <textarea id="terms-and-conditions-content" cols="30" rows="10"
                                          class="form-group"></textarea>
                            </div>

                            <h4><?= lang('privacy_policy') ?></h4>

                            <div class="form-group">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="display-privacy-policy">
                                        <label class="custom-control-label" for="display-privacy-policy">
                                            <?= lang('display_privacy_policy') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?= lang('privacy_policy_content') ?></label>
                                <textarea id="privacy-policy-content" cols="30" rows="10" class="form-group"></textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <!-- CURRENT USER TAB -->

        <?php $hidden = ($privileges[PRIV_USER_SETTINGS]['view'] == TRUE) ? '' : 'd-none' ?>
        <div class="tab-pane <?= $hidden ?>" id="current-user">
            <form>
                <div class="row">
                    <fieldset class="col-12 col-sm-6 personal-info-wrapper">
                        <legend class="border-bottom mb-4">
                            <?= lang('personal_information') ?>
                            <?php if ($privileges[PRIV_USER_SETTINGS]['edit'] == TRUE): ?>
                                <button type="button" class="save-settings btn btn-primary btn-sm mb-2"
                                        data-tippy-content="<?= lang('save') ?>">
                                    <i class="fas fa-check-square mr-2"></i>
                                    <?= lang('save') ?>
                                </button>
                            <?php endif ?>
                        </legend>

                        <input type="hidden" id="user-id">

                        <div class="form-group">
                            <label for="first-name"><?= lang('first_name') ?> *</label>
                            <input id="first-name" class="form-control required">
                        </div>

                        <div class="form-group">
                            <label for="last-name"><?= lang('last_name') ?> *</label>
                            <input id="last-name" class="form-control required">
                        </div>

                        <div class="form-group">
                            <label for="email"><?= lang('email') ?> *</label>
                            <input id="email" class="form-control required">
                        </div>

                        <div class="form-group">
                            <label for="phone-number"><?= lang('phone_number') ?> *</label>
                            <input id="phone-number" class="form-control required">
                        </div>

                        <div class="form-group">
                            <label for="mobile-number"><?= lang('mobile_number') ?></label>
                            <input id="mobile-number" class="form-control">
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
                            <label for="state"><?= lang('state') ?></label>
                            <input id="state" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="zip-code"><?= lang('zip_code') ?></label>
                            <input id="zip-code" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="notes"><?= lang('notes') ?></label>
                            <textarea id="notes" class="form-control" rows="3"></textarea>
                        </div>
                    </fieldset>

                    <fieldset class="col-12 col-sm-6 miscellaneous-wrapper">
                        <legend class="border-bottom mb-4"><?= lang('system_login') ?></legend>

                        <div class="form-group">
                            <label for="username"><?= lang('username') ?> *</label>
                            <input id="username" class="form-control required">
                        </div>

                        <div class="form-group">
                            <label for="password"><?= lang('password') ?></label>
                            <input type="password" id="password" class="form-control" autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="retype-password"><?= lang('retype_password') ?></label>
                            <input type="password" id="retype-password" class="form-control"
                                   autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="calendar-view"><?= lang('calendar') ?> *</label>
                            <select id="calendar-view" class="form-control required">
                                <option value="default">Default</option>
                                <option value="table">Table</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="timezone"><?= lang('timezone') ?></label>
                            <?= render_timezone_dropdown('id="timezone" class="form-control"') ?>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="user-notifications">
                            <label class="custom-control-label" for="user-notifications">
                                <?= lang('receive_notifications') ?>
                            </label>
                        </div>
                    </fieldset>
                </div>
            </form>
        </div>

        <!-- ABOUT TAB -->

        <div class="tab-pane" id="about-app">
            <h3>Easy!Appointments</h3>

            <p>
                <?= lang('about_app_info') ?>
            </p>

            <div class="current-version card card-body bg-light border-light mb-3">
                <?= lang('current_version') ?>
                <?= config('version') ?>
                <?php if (config('release_label')): ?>
                    - <?= config('release_label') ?>
                <?php endif ?>
            </div>

            <h3><?= lang('support') ?> elKaribu</h3>
            <p>

                <?= lang('about_app_support_elkaribu') ?>

                <br><br>

                <a href="https://www.elkaribu.com">
                    <?= lang('official_website') ?>
                </a>
                |
                <a href="https://github.com/elkaribu/easyappointments/issues">
                    <?= lang('project_issues') ?>
                </a>
                |
                <a href="mailto:info@elkaribu.com">
                    info@elkaribu.com
                </a>
                |
                <a href="https://twitter.com/elkaribu">
                    Twitter
                </a>
            </p>

            <h3><?= lang('support') ?> Easy!Appointments</h3>
            <p>

                <?= lang('about_app_support') ?>

                <br><br>

                <a href="https://easyappointments.org">
                    <?= lang('official_website') ?>
                </a>
                |
                <a href="https://groups.google.com/forum/#!forum/easy-appointments">
                    <?= lang('support_group') ?>
                </a>
                |
                <a href="https://github.com/alextselegidis/easyappointments/issues">
                    <?= lang('project_issues') ?>
                </a>
                |
                <a href="https://facebook.com/easyappts">
                    Facebook
                </a>
                |
                <a href="https://twitter.com/easyappts">
                    Twitter
                </a>
            </p>

            <h3><?= lang('license') ?></h3>

            <p>
                <?= lang('about_app_license') ?>
                <a href="http://www.gnu.org/copyleft/gpl.html">http://www.gnu.org/copyleft/gpl.html</a>
            </p>
        </div>

    </div>
</div>
