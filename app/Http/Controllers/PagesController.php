<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getTrangchu()
    {
        return view('shared.pages.trangchu');
    }
}
