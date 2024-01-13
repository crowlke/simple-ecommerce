<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $oneDayAgo = Carbon::now()->subDays(1);

        $totalUsers = User::count();
        $recentUsers = User::whereDate('created_at', '<=', $oneDayAgo)->count();

        return view('admin.dashboard', compact('totalUsers', 'recentUsers'));
    }
}
