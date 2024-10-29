<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InstagramService;

class GewissTrainingController extends Controller
{
    public function index()
    {
        $instagramService = new InstagramService();
        return view('gewisstraining')->with('instagram', $instagramService->authenticateTest());
    }
}
