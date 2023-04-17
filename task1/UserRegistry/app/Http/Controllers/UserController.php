<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  $this->userRepository->index();

        return view('users.index', compact('users'));
    }

    public function destroy($id)
    {
        $this->userRepository->destroy($id);

        return redirect(route('user'))->with('message', 'User deleted successfully.');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'email',
            'position' => 'required|string|max:255',
        ]);

        $this->userRepository->store($data);

        return redirect(route('user'))->with('message', 'User added successfully.');
    }
}
