<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
  /**
   * @var Project
   */
  protected $project;

  /**
   * ProjectRepository constructor.
   *
   * @param Project $project
   */
  public function __construct(Project $project)
  {
    $this->project = $project;
  }

  /**
   * Find all Projects
   *
   * @return \Illuminate\Database\Eloquent\Collection Project
   */
  public function findAll()
  {
    return $this->project::all();
  }

  /**
   * Create Project
   *
   * @param $data
   * @return Project
   */
  public function create($data)
  {
    $project = new $this->project($data);

    $project->save();

    return $project->fresh();
  }
}