<?php

namespace App\Http\Controllers\wpadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function index()
    {
        return inertia('wpadmin/Tema/Index');
    }
}
