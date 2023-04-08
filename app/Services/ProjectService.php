<?php

namespace App\Services;

use App\Http\Requests\StoreProjectRequest;
use App\Repositories\ProjectRepository;

class ProjectService
{
  /**
   * @var $projectRepository
   */
  protected $projectRepository;

  /**
   * ProjectService constructor.
   *
   * @param ProjectRepository $projectRepository
   */
  public function __construct(ProjectRepository $projectRepository)
  {
    $this->projectRepository = $projectRepository;
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
      $image = $request->file('image')->store('public/projects');

      return $this->projectRepository->create([...$validated, 'image' => str_replace('public/', '', $image)]);
    }
  }
}