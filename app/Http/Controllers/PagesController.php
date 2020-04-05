<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Slide;

class PagesController extends Controller
{
    public function getDashboard()
    {
        return view('admin.pages.dashboard');
    }
    public function getTrangchu()
    {
        $slide = Slide::where('Active',1)->orderBy('location')->get();
        return view('shared.pages.trangchu',compact('slide'));
    }
}
