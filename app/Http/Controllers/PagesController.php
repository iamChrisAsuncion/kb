<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about() {
      return view('layouts.about');
    }
    public function support() {
      return view('layouts.support');
    }
    public function disabled(){
      return view('disabled');
    }
}
