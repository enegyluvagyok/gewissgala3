<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fighter;

class FighterController extends Controller
{
    public function index()
    {
        return view(view: 'fighters.index')->with('fighters', Fighter::orderBy(column: 'name')->get());
    }

    public function show($id)
    {
        return view(view: 'fighters.show')->with('fighter', Fighter::find($id));
    }
}
