<?php

namespace App\Http\Controllers\Admin;

use App\Models\Registration;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\AdminController;

class DashboardController extends AdminController
{
    public function setupDashboard()
    {
        $this->data['total_user'] = User::count();
        $this->data['total_registration'] = Registration::count();

        return $this->dashboard();
    }
}
