<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fighter;

class HomepageController extends Controller
{
    public function index()
    {
        return view(view: 'homepage')->with('fighters', Fighter::orderBy(column: 'name')->get());
    }

}
