<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Setting;
use App\Models\Testimony;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        $data['setting'] = Setting::parsed();
        $data['categories'] = ProjectCategory::get();
        $data['projects'] = Project::with('category')->limit(9)->orderBy('id', 'DESC')->get();
        $data['testimonies'] = Testimony::limit(8)->orderBy('id', 'DESC')->get();
        $data['galleries'] = Gallery::limit(8)->orderBy('id', 'DESC')->get();

        return view('layouts.landing', $data);
    }
}
