<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PersonalInformation;
use App\Models\Education;
use App\Models\WorkExperience;
use App\Models\Award;
use App\Models\Skill;
use App\Models\Reference;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'personal_info' => PersonalInformation::count(),
            'education' => Education::count(),
            'work_experience' => WorkExperience::count(),
            'awards' => Award::count(),
            'skills' => Skill::count(),
            'references' => Reference::count(),
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}