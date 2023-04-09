<?php

namespace App\Services;

use Storage;

use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Repositories\SkillRepository;
use App\Models\Skill;

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
  public function store(StoreSkillRequest $request)
  {
    $validated = $request->validated();

    if ($request->hasFile('image')) {
      $image = $request->file('image')->store('public/skills');

      return $this->skillRepository->create([...$validated, 'image' => str_replace('public/', '', $image)]);
    }
  }


  /**
   * Store to database.
   *
   * @param UpdateSkillRequest $request
   * @param Skill $skill
   * @return Skill
   */
  public function update(UpdateSkillRequest $request, Skill $skill)
  {
    $validated = $request->validated();

    $image = $skill->image;

    if ($request->hasFile('image')) {
      Storage::delete('public/skills/' . $skill->image);

      $image = $request->file('image')->store('public/skills');
      $image = str_replace('public/', '', $image);
    }

    return $this->skillRepository->update([
      ...$validated,
      'image' => $image
    ], $skill);
  }


  /**
   * Delete skill and remove its image.
   *
   * @param Skill skill
   * @return void
   */
  public function delete(Skill $skill)
  {
    Storage::delete('public/skills/' . $skill->image);
    $this->skillRepository->delete($skill);
  }
}