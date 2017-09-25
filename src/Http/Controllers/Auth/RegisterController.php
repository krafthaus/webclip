<?php

namespace KraftHaus\WebClip\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use KraftHaus\WebClip\Eloquent\Models\User;
use KraftHaus\WebClip\Events\User\Registered;
use KraftHaus\WebClip\Contracts\Team\Repository;
use KraftHaus\WebClip\Http\Requests\Auth\RegisterRequest;
use KraftHaus\WebClip\Events\Team\Created as TeamCreated;

class RegisterController extends Controller
{
    /**
     * The team repository implementation.
     *
     * @var \KraftHaus\WebClip\Contracts\Team\Repository
     */
    protected $teams;

    /**
     * Cerate a new register controller instance.
     *
     * @param  \KraftHaus\WebClip\Contracts\Team\Repository $teams
     * @return void
     */
    public function __construct(Repository $teams)
    {
        $this->teams = $teams;
    }

    /**
     * @param  \KraftHaus\WebClip\Http\Requests\Auth\RegisterRequest $request
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->create($request->all());

        if ($teamName = $request->team_name) {
            $team = $this->teams->createTeam($user, ['name' => $teamName]);

            event(new TeamCreated($team));
        }

        event(new Registered($user));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
