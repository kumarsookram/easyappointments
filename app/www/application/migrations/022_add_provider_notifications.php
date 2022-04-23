<?php defined('BASEPATH') or exit('No direct script access allowed');

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

class Migration_Add_provider_notifications extends CI_Migration {
    public function up()
    {
        $this->db->insert('settings', [
            'name' => 'provider_notifications',
            'value' => '0'
        ]);
        $this->db->insert('settings', [
            'name' => 'secretary_notifications',
            'value' => '0'
        ]);
        $this->db->insert('settings', [
            'name' => 'admin_notifications',
            'value' => '0'
        ]);
    }

    public function down()
    {
        $this->db->delete('settings', [
            'name' => 'provider_notifications'
        ]);
        $this->db->delete('settings', [
            'name' => 'secretary_notifications'
        ]);
        $this->db->delete('settings', [
            'name' => 'admin_notifications'
        ]);
    }
}
