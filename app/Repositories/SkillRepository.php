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
   * Create Skill
   *
   * @param $data
   * @return Skill
   */
  public function create($data)
  {
    $skill = new $this->skill($data);

    $skill->save();

    return $skill->fresh();
  }
}