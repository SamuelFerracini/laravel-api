<?php

namespace App\Services;

use App\Http\Requests\StoreSkillRequest;
use App\Repositories\SkillRepository;

class SkillService
{
  /**
   * @var $skillRepository
   */
  protected $skillRepository;

  /**
   * SkillService constructor.
   *
   * @param SkillRepository $skillRepository
   */
  public function __construct(SkillRepository $skillRepository)
  {
    $this->skillRepository = $skillRepository;
  }

  /**
   * Find all Skills
   *
   * @return \Illuminate\Database\Eloquent\Collection Skill
   */
  public function findAll()
  {
    return $this->skillRepository->findAll();
  }

  /**
   * Store to database.
   *
   * @param array $validated
   * @return mixed Skill or void
   */
  public function save(StoreSkillRequest $request)
  {
    $validated = $request->validated();

    if ($request->hasFile('image')) {
      $image = $request->file('image')->store('public/skills');

      return $this->skillRepository->create([...$validated, 'image' => str_replace('public/', '', $image)]);
    }
  }
}