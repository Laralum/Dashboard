<?php

namespace Laralum\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use ConsoleTVs\Charts\Charts;
use Laralum\Dashboard\Widgets;

class DashboardController extends Controller
{
    public function index()
    {
        $widgets = Widgets::get();
        return view('dashboard::dashboard', ['widgets' => $widgets]);
    }
}
