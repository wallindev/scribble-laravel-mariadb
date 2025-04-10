<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController {
  protected $userRepository;

  public function __construct(UserRepositoryInterface $userRepository) {
    // To call the parent class constructor (AdminController)
    // parent::__construct();
    $this->userRepository = $userRepository;
  }

  public function index(Request $request) {
    $success = session('success');
    $users = $this->userRepository->getAllUsers();

    $title = 'Users';
    $breadcrumbs = [
      ...$this->breadcrumbs,
      '/admin' => 'Admin',
      '/admin/users' => 'Users'
    ];
    return view('admin.users.index', compact('success', 'users', 'title', 'breadcrumbs'));

    // For API
    // return response()->json($users);
    // if ($request->wantsJson()) {
    //   return UserResource::collection($users);
    // }
  }

  public function show($id) {
    $success = session('success');
    $user = $this->userRepository->getUserById($id);

    $title = 'Show User';
    $breadcrumbs = [
      ...$this->breadcrumbs,
      '/admin' => 'Admin',
      '/admin/users' => 'Users',
      "/admin/users/$id" => "User $id"
    ];
    return view('admin.users.show', compact('success', 'user', 'title', 'breadcrumbs'));

    // For API
    // return $user ? response()->json($user) : response()->json(['message' => 'User not found'], 404);
  }

  public function edit($id) {
    $user = $this->userRepository->getUserById($id);
    $title = 'Edit User';
    $breadcrumbs = [
      ...$this->breadcrumbs,
      '/admin' => 'Admin',
      '/admin/users' => 'Users',
      "/admin/users/$id" => "User $id",
      "/admin/users/$id/edit" => "Edit User $id"
    ];
    return view('admin.users.edit', compact('user', 'title', 'breadcrumbs'));
  }

  public function update(UserRequest $request, $id) {
    $data = $request->validated();

    if (array_key_exists('password', $data))
      $data = [...$data, 'password' => Hash::make($data['password'])];
    if (!array_key_exists('email_verified', $data))
      $data = [...$data, 'email_verified' => false];
    if (!array_key_exists('is_admin', $data))
      $data = [...$data, 'is_admin' => false];

    $updated = $this->userRepository->updateUser($id, $data);

    if ($updated) { // Update successful
      return redirect()->route('users.show', $id)->with('success', 'User updated successfully!');
    } else { // Update not successful
      return back()->withErrors(['update' => 'Failed to update user. Please try again.']);
    }

    // For API
    // return $updated ?
    // response()->json(['message' => 'User updated successfully']) :
    // response()->json(['message' => 'User not found'], 404);
  }

  public function create() {
    $title = 'Create User';
    $breadcrumbs = [
      ...$this->breadcrumbs,
      '/admin' => 'Admin',
      '/admin/users' => 'Users',
      "/admin/users/new" => 'Create User'
    ];
    return view('admin.users.create', compact('title', 'breadcrumbs'));
  }

  public function store(UserRequest $request) {
    $data = $request->validated();

    $user = $this->userRepository->createUser([...$data, 'password' => Hash::make($data['password'])]);

    // TODO: Add error handling like in update() method
    return redirect()->route('users.index')->with('success', 'User created successfully.');

    // For API
    // return response()->json($user, 201);
  }

  public function destroy($id) {
    dump('UserController->destroy()');
    dd("User Id: $id");
    $deleted = $this->userRepository->deleteUser($id);

    // TODO: Add error handling like in update() method
    // return redirect()->route('users.index')->with('success', 'User deleted successfully.');

    // For API
    // return $deleted ?
    // response()->json(['message' => 'User deleted successfully']) :
    // response()->json(['message' => 'User not found'], 404);
  }
}
