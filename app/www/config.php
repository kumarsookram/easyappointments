<?php
/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2016, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.0.0
 * ---------------------------------------------------------------------------- */

/**
 * Easy!Appointments Configuration File
 *
 * Set your installation BASE_URL * without the trailing slash * and the database
 * credentials in order to connect to the database. You can enable the DEBUG_MODE
 * while developing the application.
 *
 * Set the default language by changing the LANGUAGE constant. For a full list of
 * available languages look at the /application/config/config.php file.
 *
 * IMPORTANT:
 * If you are updating from version 1.0 you will have to create a new "config.php"
 * file because the old "configuration.php" is not used anymore.
 */
class Config {

    // ------------------------------------------------------------------------
    // GENERAL SETTINGS
    // ------------------------------------------------------------------------

    const BASE_URL = '${BASE_URL}';
    const LANGUAGE = '${LANGUAGE}';
    const DEBUG_MODE = ${DEBUG_MODE};
    const CSRF_PROTECTION = ${CSRF_PROTECTION};
    const EASYAPPOINTMENTS_VERSION = '${EASYAPPOINTMENTS_VERSION}';

    // ------------------------------------------------------------------------
    // DATABASE SETTINGS
    // ------------------------------------------------------------------------

    const DB_HOST = '${DB_HOST}';
    const DB_NAME = '${DB_NAME}';
    const DB_USERNAME = '${DB_USERNAME}';
    const DB_PASSWORD = '${DB_PASSWORD}';

    // ------------------------------------------------------------------------
    // GOOGLE CALENDAR SYNC
    // ------------------------------------------------------------------------

    const GOOGLE_SYNC_FEATURE = ${GOOGLE_SYNC_FEATURE}; // Enter TRUE or FALSE
    const GOOGLE_PRODUCT_NAME = '${GOOGLE_PRODUCT_NAME}';
    const GOOGLE_CLIENT_ID = '${GOOGLE_CLIENT_ID}';
    const GOOGLE_CLIENT_SECRET = '${GOOGLE_CLIENT_SECRET}';
    const GOOGLE_API_KEY = '${GOOGLE_API_KEY}';

    // ------------------------------------------------------------------------
    // EMAIL SETTINGS
    // ------------------------------------------------------------------------

    const EMAIL_HOST = '${EMAIL_HOST}';
    const EMAIL_USER = '${EMAIL_USER}';
    const EMAIL_PASSWORD = '${EMAIL_PASSWORD}';
    const EMAIL_CRYPTO = '${EMAIL_CRYPTO}';
    const EMAIL_PORT = ${EMAIL_PORT}; // 465 or 587
    const EMAIL_IGNORE_SSL = ${EMAIL_IGNORE_SSL}; // Enter TRUE or FALSE
}

/* End of file config.php */
/* Location: ./config.php */
