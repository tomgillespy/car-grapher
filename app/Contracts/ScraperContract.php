<?php

namespace App\Contracts;

interface ScraperContract {
  public function getAll(string $make, string $model, bool $save = false);

  public function count();

  public function get(string $make, string $model, int $index, bool $save = false);
}
