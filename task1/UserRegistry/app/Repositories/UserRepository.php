<?php

namespace App\Repositories;

use App\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return User::latest()->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        $user_data = array_merge($data, ['password' => Hash::make('password')]);
        return $this->model->create($user_data);
    }

    public function update($id, $data)
    {
        $user = $this->find($id);
        $user->fill($data);
        $user->save();

        return $user;
    }

    public function destroy($id)
    {
        $user = $this->find($id);
        $user->delete();
    }
}