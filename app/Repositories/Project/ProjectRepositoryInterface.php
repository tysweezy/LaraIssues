<?php

namespace App\Repositories\Project;

interface ProjectRepositoryInterface {

  public function getAll();

  public function getAllById($id);

  public function getAllIssues();

  public function getAllIssuesById($id);
}