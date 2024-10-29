<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fight;

class FightController extends Controller
{
    public function index()
    {
        return view('fight.index')->with([
            'fights' => Fight::all()->sortByDesc('date'),
        ]);
    }
}
