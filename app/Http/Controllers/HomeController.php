<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use App\Models\Education;
use App\Models\WorkExperience;
use App\Models\Award;
use App\Models\Skill;
use App\Models\Reference;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'personalInfo' => PersonalInformation::first(),
            'education' => Education::orderBy('start_date', 'desc')->get(),
            'workExperience' => WorkExperience::orderBy('start_date', 'desc')->get(),
            'awards' => Award::orderBy('date_received', 'desc')->get(),
            'skills' => Skill::orderBy('category')->get(),
            'references' => Reference::take(2)->get(),
        ];
        
        return view('home', $data);
    }

    public function print()
    {
        $data = [
            'personalInfo' => PersonalInformation::first(),
            'education' => Education::orderBy('start_date', 'desc')->get(),
            'workExperience' => WorkExperience::orderBy('start_date', 'desc')->get(),
            'awards' => Award::orderBy('date_received', 'desc')->get(),
            'skills' => Skill::orderBy('category')->get(),
            'references' => Reference::take(2)->get(),
        ];
        
        return view('print', $data);
    }
}