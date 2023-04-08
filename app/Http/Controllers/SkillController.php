<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

use App\Http\Requests\StoreSkillRequest;
use App\Services\SkillService;


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
        return Inertia::render('Skills/index');
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
        $skill = $this->skillService->save($request);

        if ($skill)
            return Redirect::route('skills.index');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}