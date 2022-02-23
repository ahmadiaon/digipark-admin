<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title'         => 'Dashboard'
        ]);
    }
    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }
}
