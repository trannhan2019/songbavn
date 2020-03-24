<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class ContentController extends Controller
{
    public function getAdminGioithieu($id)
    {
        $contents = Content::find($id);
        return view('admin.pages.content.gioithieu',compact('content'));
    }
}
