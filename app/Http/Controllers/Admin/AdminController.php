<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashBoard(){

        $notify[]=['success','Currency updated successfully'];
        return view('back-end.partial.essential.dash-board')->withNotify($notify);
        // return view('back-end.index');
    }
}
