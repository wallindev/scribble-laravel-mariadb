<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends AdminController {
  protected $userService;

  public function __construct(UserServiceInterface $userService) {
    // dd($this->userService);
    // parent::__construct(); // Call the parent constructor if needed
    $this->userService = $userService;
  }

  public function index(Request $request) {
    $users = $this->userService->getAllUsers();
    // dump($users);
    // dd($users);
    // For API
    // return response()->json($users);
    if ($request->wantsJson()) {
      return UserResource::collection($users);
    }
    // For GUI
    return view('admin.users.index', [
      'title' => 'Users',
      'users' => $users,
    ]);

    // $title = 'Users';
    // return view('admin.users.index', compact('title', 'users'));
  }

  public function show($id) {
    // Session flash variable (destroyed after first use)
    $successMessage = session('success');
    $user           = $this->userService->getUserById($id);
    // For API
    // return $user ? response()->json($user) : response()->json(['message' => 'User not found'], 404);
    // For GUI
    return view('admin.users.show', [
      'title'   => 'Show User',
      'user'    => $user,
      'success' => $successMessage,
    ]);
  }

  public function store(UserRequest $request) {
    dd('UserController->store()');
    // Get the validated data
    $data = $request->validated();
    // Proceed with storing the user

    // $data = $request->validate([
    //   'name' => 'required|string|max:255',
    //   'email' => 'required|string|email|max:255|unique:users',
    //   'password' => 'required|string|min:8',
    // ]);

    // $request->validate([
    //   'name' => 'required|string|max:255',
    //   'email' => 'required|email|max:255|unique:users,email,' . $id,
    // ]);

    // $user = User::create($request->all());
    $user = $this->userService->createUser($data);
    // For API
    // return response()->json($user, 201);
    // For GUI
    return redirect()->route('users.index')->with('success', 'User created successfully.');
  }

  public function update(UserRequest $request, $id) {
    dd('UserController->update()');
    // dd($request);
    // Get the validated data
    $data = $request->validated();
    // $data = $request->validate([
    //   'name' => 'sometimes|required|string|max:255',
    //   'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
    //   'password' => 'sometimes|required|string|min:8',
    // ]);

    // $request->validate([
    //   'name' => 'required|string|max:255',
    //   'email' => 'required|email|max:255|unique:users,email,' . $id,
    // ]);

    // $user->name = $request->input('name');
    // $user->email = $request->input('email');
    // $user->save();

    $updated = $this->userService->updateUser($id, $data);
    // For API
    // return $updated ?
    // response()->json(['message' => 'User updated successfully']) :
    // response()->json(['message' => 'User not found'], 404);
    // For GUI
    return redirect()->route('users.show', $id)->with('success', 'User updated successfully!');
  }

  public function destroy($id) {
    // $user->delete();
    $deleted = $this->userService->deleteUser($id);
    // For API
    // return $deleted ?
    // response()->json(['message' => 'User deleted successfully']) :
    // response()->json(['message' => 'User not found'], 404);
    // For GUI
    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
  }

  // Only for GUI
  public function create() {
    return view('admin.users.create');
  }

  // Only for GUI
  public function edit($id) {
    $user = $this->userService->getUserById($id);
    return view('admin.users.edit', [
      'title' => 'Edit User',
      'user'  => $user,
    ]);
  }
}
