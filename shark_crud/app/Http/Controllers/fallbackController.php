<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fallbackController extends Controller
{
    public function index(){
        return response()->view('fallback.404error',[],404);
    }
}
