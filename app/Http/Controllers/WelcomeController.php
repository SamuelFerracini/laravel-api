<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use App\Http\Resources\ProjectResource;
use App\Http\Resources\SkillResource;
use App\Models\Project;
use App\Models\Skill;

class WelcomeController extends Controller
{
  public function welcome()
  {
    $skills = SkillResource::collection(Skill::all());
    $projects = ProjectResource::collection(Project::with('skill')->get());

    return Inertia::render('Welcome', compact('skills', 'projects'));
  }
}