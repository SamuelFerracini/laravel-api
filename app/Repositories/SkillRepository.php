<?php

namespace App\Repositories;

use App\Models\Skill;

class SkillRepository
{
  /**
   * @var Skill
   */
  protected $skill;

  /**
   * SkillRepository constructor.
   *
   * @param Skill $skill
   */
  public function __construct(Skill $skill)
  {
    $this->skill = $skill;
  }


  /**
   * Find all Skills
   *
   * @return \Illuminate\Database\Eloquent\Collection Skill
   */
  public function findAll()
  {
    return $this->skill::all();
  }

  /**
   * Create Skill
   *
   * @param array $data
   * @return Skill
   */
  public function create($data)
  {
    $skill = new $this->skill($data);

    $skill->save();

    return $skill->fresh();
  }

  /**
   * Update Skill
   *
   * @param array $data
   * @param Skill $skill
   * @return Skill
   */
  public function update($data, Skill $skill)
  {
    $skill->update($data);

    return $skill;
  }

  /**
   * Update Skill
   *
   * @param Skill $skill
   * @return void
   */
  public function delete(Skill $skill)
  {
    $skill->delete();
  }
}