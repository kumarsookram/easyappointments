<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2020, Alex Tselegidis
 * @license     https://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        https://easyappointments.org
 * @since       v1.1.0
 * ---------------------------------------------------------------------------- */

/**
 * Installation Controller
 *
 * This controller will handle the installation procedure of Easy!Appointments.
 *
 * @package Controllers
 */
class Installation extends EA_Controller {
    /**
     * Installation constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admins_model');
        $this->load->model('settings_model');
        $this->load->model('services_model');
        $this->load->model('providers_model');
        $this->load->model('customers_model');
        $this->load->library('migration');
        $this->load->helper('installation');
        $this->load->helper('string');
    }

    /**
     * Display the installation page.
     */
    public function index()
    {
        if (is_app_installed())
        {
            redirect('appointments');
            return;
        }

        $this->load->view('general/installation', [
            'base_url' => config('base_url')
        ]);
    }

    /**
     * Installs Easy!Appointments on the server.
     */
    public function ajax_install()
    {
        try
        {
            if (is_app_installed())
            {
                return;
            }

            $admin = $this->input->post('admin');
            $company = $this->input->post('company');
            $webpage = $this->input->post('webpage');

            if ( ! $this->migration->latest())
            {
                throw new Exception($this->migration->error_string());
            }

            // Insert admin
            $admin['timezone'] = 'Europe/Madrid';
            $admin['settings']['username'] = $admin['username'];
            $admin['settings']['password'] = $admin['password'];
            $admin['settings']['notifications'] = TRUE;
            $admin['settings']['calendar_view'] = CALENDAR_VIEW_DEFAULT;
            unset($admin['username'], $admin['password']);
            $admin['id'] = $this->admins_model->add($admin);

            $this->session->set_userdata('user_id', $admin['id']);
            $this->session->set_userdata('user_email', $admin['email']);
            $this->session->set_userdata('role_slug', DB_SLUG_ADMIN);
            $this->session->set_userdata('timezone', $admin['timezone']);
            $this->session->set_userdata('username', $admin['settings']['username']);

            // Save company settings
            $this->settings_model->set_setting('company_name', $company['company_name']);
            $this->settings_model->set_setting('company_email', $company['company_email']);
            $this->settings_model->set_setting('company_link', $company['company_link']);

            // Save webpage settings
            $this->settings_model->set_setting('website_title', $webpage['website_title']);
            $this->settings_model->set_setting('website_description', $webpage['website_description']);
            $this->settings_model->set_setting('website_logo', $webpage['website_logo']);
            $this->settings_model->set_setting('website_images', $webpage['website_images']);
            $this->settings_model->set_setting('theme_color', $webpage['theme_color']);
            $this->settings_model->set_setting('font_family', $webpage['font_family']);

            // Service
            $service_id = $this->services_model->add([
                'name' => 'Service',
                'duration' => '30',
                'price' => '0',
                'currency' => '',
                'availabilities_type' => 'flexible',
                'attendants_number' => '1'
            ]);

            // Provider
            $this->providers_model->add([
                'first_name' => 'Joan',
                'last_name' => 'Exemple',
                'email' => 'joan@exemple.org',
                'phone_number' => '+34 600 000 000',
                'services' => [
                    $service_id
                ],
                'settings' => [
                    'username' => 'joanexemple',
                    'password' => 'joanexemple',
                    'working_plan' => $this->settings_model->get_setting('company_working_plan'),
                    'notifications' => FALSE,
                    'google_sync' => FALSE,
                    'sync_past_days' => 30,
                    'sync_future_days' => 90,
                    'calendar_view' => CALENDAR_VIEW_DEFAULT
                ],
            ]);

            // Customer
            $this->customers_model->add([
                'first_name' => 'Jaume',
                'last_name' => 'Exemple',
                'email' => 'jaume@example.org',
                'phone_number' => '+34 600 000 001',
            ]);

            $response = AJAX_SUCCESS;
        }
        catch (Exception $exception)
        {
            $this->output->set_status_header(500);

            $response = [
                'message' => $exception->getMessage(),
                'trace' => config('debug') ? $exception->getTrace() : []
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
