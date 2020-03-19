<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Menu;

class TestController extends Controller
{
    public function index()
    {
        // $data = Menu::whereNull('parent')->get();
        // return view('Test',compact('data'));
        return view('shared.pages.test');
    }
    public function testdt(Request $request){
        dd($request->created_at)->format("Y-m-d H:i:s");
    }
}
