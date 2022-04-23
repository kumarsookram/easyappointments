<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2020, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.4.0
 * ---------------------------------------------------------------------------- */

class Migration_Add_website_settings extends CI_Migration {
    public function up()
    {
        $this->db->insert('settings', [
            'name' => 'website_logo',
            'value' => 'https://storage.googleapis.com/elkaribu_website2/images/logo_azul.original.png'
        ]);
        $this->db->insert('settings', [
            'name' => 'website_title',
            'value' => ''
        ]);
        $this->db->insert('settings', [
            'name' => 'website_description',
            'value' => ''
        ]);
        $this->db->insert('settings', [
            'name' => 'seo_title',
            'value' => ''
        ]);
        $this->db->insert('settings', [
            'name' => 'seo_description',
            'value' => ''
        ]);
        $this->db->insert('settings', [
            'name' => 'website_images',
            'value' => '{}'
        ]);
        $this->db->insert('settings', [
            'name' => 'theme_color',
            'value' => 'primary'
        ]);
        $this->db->insert('settings', [
            'name' => 'company_instagram_link',
            'value' => ''
        ]);
        $this->db->insert('settings', [
            'name' => 'company_facebook_link',
            'value' => ''
        ]);
        $this->db->insert('settings', [
            'name' => 'company_twitter_link',
            'value' => ''
        ]);
        $this->db->insert('settings', [
            'name' => 'elfsight_review_code',
            'value' => ''
        ]);
    }

    public function down()
    {
        $this->db->delete('settings', [
            'name' => 'website_logo'
        ]);
        $this->db->delete('settings', [
            'name' => 'website_title'
        ]);
        $this->db->delete('settings', [
            'name' => 'website_description'
        ]);
        $this->db->delete('settings', [
            'name' => 'website_images'
        ]);
        $this->db->delete('settings', [
            'name' => 'theme_color'
        ]);
        $this->db->delete('settings', [
            'name' => 'company_instagram_link'
        ]);
        $this->db->delete('settings', [
            'name' => 'company_facebook_link'
        ]);
        $this->db->delete('settings', [
            'name' => 'company_twitter_link'
        ]);
        $this->db->delete('settings', [
            'name' => 'elfsight_review_code'
        ]);
    }
}
