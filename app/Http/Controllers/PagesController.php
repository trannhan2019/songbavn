<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function __construct() {
        
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        Carbon::setLocale('vi');
        view()->share('dt', $dt);
    }
    public function getTrangchu()
    {
        return view('shared.pages.trangchu');
    }
}
