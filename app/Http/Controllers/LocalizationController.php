<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function localization(){

        $locale=request('lang');
        App::setlocale($locale);
        session()->put('locale',$locale);
        return back();
    }
}
