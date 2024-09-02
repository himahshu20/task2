<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    function documentForm(Request $request){
        return view('Document');
    }
    //
}
