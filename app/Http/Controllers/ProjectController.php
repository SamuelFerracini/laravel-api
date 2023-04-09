<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Redirect;

use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Services\ProjectService;
use App\Models\Project;
use App\Models\Skill;


class ProjectController extends Controller
{
    /**
     * @var projectService
     */
    protected $projectService;

    /**
     * PostController Constructor
     *
     * @param ProjectService $projectService
     *
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = ProjectResource::collection($this->projectService->findAll());

        return Inertia::render('Projects/index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();

        return Inertia::render('Projects/create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project = $this->projectService->store($request);

        if ($project)
            return Redirect::route('projects.index');

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return Inertia::render('Projects/edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->projectService->update($request, $project);

        return Redirect::route('skills.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->projectService->delete($project);
    }
}