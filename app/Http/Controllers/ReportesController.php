<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class ReportesController extends Controller
{
    public function index()
    {
        $title = 'Reportes';

    
        return Voyager::view('voyager::reportes.browse', compact('title'));
    }
}
