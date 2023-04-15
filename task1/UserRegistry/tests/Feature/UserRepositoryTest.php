<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    protected $userRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->userRepository = app(UserRepository::class);
    }

    /** @test */
    public function test_can_retrieve_all_users()
    {
        $users = factory(User::class, 3)->create();

        $result = $this->userRepository->index();

        $this->assertCount(3, $result);
        $this->assertEquals($users->pluck('id')->toArray(), $result->pluck('id')->toArray());
    }

    /** @test */
    public function test_can_retrieve_user_by_id()
    {
        $user = factory(User::class)->create();

        $result = $this->userRepository->find($user->id);

        $this->assertInstanceOf(User::class, $result);
        $this->assertEquals($user->id, $result->id);
    }

    /** @test */
    public function test_can_create_a_user()
    {
        $data = [
            'name' => 'Klaas',
            'surname' => 'Rikhotso',
            'position' => 'Software Developer',
            'email' => 'kmrikhotso@gmail.com',
            'password' => Hash::make('password')
        ];

        $result = $this->userRepository->store($data);

        $this->assertInstanceOf(User::class, $result);
        $this->assertEquals('Klaas', $result->name);
        $this->assertEquals('Rikhotso', $result->surname);
        $this->assertEquals('kmrikhotso@gmail.com', $result->email);
        $this->assertEquals('Software Developer', $result->position);
    }

    /** @test */
    public function test_can_delete_a_user()
    {
        $user = factory(User::class)->create();

        $this->userRepository->destroy($user->id);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
