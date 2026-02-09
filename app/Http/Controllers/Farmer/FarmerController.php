<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function dashboard()
    {
        return view('farmer.dashboard');
    }
}
