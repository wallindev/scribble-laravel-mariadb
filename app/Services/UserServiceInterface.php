<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserServiceInterface {
  // For API
  // public function getAllUsers(): array
  // For GUI
  public function getAllUsers(): Collection;
  public function getUserById(int $id): ?User;
  public function createUser(array $data): User;
  public function updateUser(int $id, array $data): bool;
  public function deleteUser(int $id): bool;
  public function isAdmin(): bool;
}
