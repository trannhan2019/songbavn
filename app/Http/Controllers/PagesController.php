<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function getDashboard()
    {
        return view('admin.pages.dashboard');
    }
    public function getTrangchu()
    {
        return view('shared.pages.trangchu');
    }
}
