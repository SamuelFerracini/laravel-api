<?php

namespace App\Services;

use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Repositories\ProjectRepository;
use App\Models\Project;
use Storage;

class ProjectService
{
  /**
   * @var $projectRepository
   */
  protected $projectRepository;
  private $rootDirectory = 'public/projects';

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
   * Find all projects
   *
   * @return \Illuminate\Database\Eloquent\Collection Project
   */
  public function findAll()
  {
    return $this->projectRepository->findAll();
  }

  /**
   * Store to database.
   *
   * @param array $validated
   * @return mixed Project or void
   */
  public function store(StoreProjectRequest $request)
  {
    $validated = $request->validated();

    if ($request->hasFile('image')) {
      $image = $request->file('image')->store($this->rootDirectory);

      return $this->projectRepository->create([...$validated, 'image' => str_replace('public/', '', $image)]);
    }
  }


  /**
   * Update into database.
   *
   * @param UpdateProjectRequest $request
   * @param Project $project
   * @return Project
   */
  public function update(UpdateProjectRequest $request, Project $project)
  {
    $validated = $request->validated();

    $image = $project->image;

    if ($request->hasFile('image')) {
      Storage::delete($this->rootDirectory . '/' . $project->image);

      $image = $request->file('image')->store($this->rootDirectory);
      $image = str_replace('public/', '', $image);
    }

    return $this->projectRepository->update([
      ...$validated,
      'image' => $image
    ], $project);
  }


  /**
   * Delete project and remove its image.
   *
   * @param Project project
   * @return void
   */
  public function delete(Project $project)
  {
    Storage::delete($this->rootDirectory . '/' . $project->image);
    $this->projectRepository->delete($project);
  }
}