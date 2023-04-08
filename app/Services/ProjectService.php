<?php

namespace App\Services;

use App\Http\Requests\StoreProjectRequest;
use App\Repositories\ProjectRepository;

class ProjectService
{
  /**
   * @var $projectService
   */
  protected $projectService;

  /**
   * ProjectService constructor.
   *
   * @param ProjectRepository $projectService
   */
  public function __construct(ProjectRepository $projectService)
  {
    $this->projectService = $projectService;
  }

  /**
   * Store to database.
   *
   * @param array $validated
   * @return mixed Project or void
   */
  public function save(StoreProjectRequest $request)
  {
    $validated = $request->validated();

    if ($request->hasFile('image')) {
      $image = $request->file('image')->store('projects');

      return $this->projectService->create([...$validated, 'image' => $image]);
    }
  }
}