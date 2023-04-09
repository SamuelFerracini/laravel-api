<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Redirect;

use App\Http\Requests\UpdateSkillRequest;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Resources\SkillResource;
use App\Services\SkillService;
use App\Models\Skill;


class SkillController extends Controller
{

    /**
     * @var skillService
     */
    protected $skillService;

    /**
     * PostController Constructor
     *
     * @param SkillService $skillService
     *
     */
    public function __construct(SkillService $skillService)
    {
        $this->skillService = $skillService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = SkillResource::collection($this->skillService->findAll());

        return Inertia::render('Skills/index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Skills/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillRequest $request)
    {
        $skill = $this->skillService->store($request);

        if ($skill)
            return Redirect::route('skills.index')->with('message', 'Skill created successfully.');

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
    public function edit(Skill $skill)
    {
        return Inertia::render('Skills/edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $this->skillService->update($request, $skill);

        return Redirect::route('skills.index')->with('message', 'Skill edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $this->skillService->delete($skill);

        return Redirect::back()->with('message', 'Skill deleted successfully.');
    }
}