<?php

namespace App\Services;

use App\Interfaces\UserServiceInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserServiceInterface {
  // For API
  // public function getAllUsers(): array
  // For GUI
  public function getAllUsers(): Collection {
    // For API
    // return User::all()->toArray();
    // For GUI
    return User::all();
  }

  public function getUserById(int $id): ?User {
    return User::findOrFail($id);
  }

  public function createUser(array $data): User {
    return User::create($data);
  }

  public function updateUser(int $id, array $data): bool {
    $user = $this->getUserById($id);
    return $user ? $user->update($data) : false;
  }

  public function deleteUser(int $id): bool {
    $user = $this->getUserById($id);
    return $user ? $user->delete() : false;
  }

  /* public function isAdmin(int $id): bool {
    // TODO: How get is_admin from db? Implement in User model? Is '$this' referring to the model?
    $user = $this->getUserById($id);
    dump('UserService, isAdmin() function, $user->is_admin:');
    dump($user->is_admin);
    return true;
  } */
}
