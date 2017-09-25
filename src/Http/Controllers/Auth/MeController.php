<?php

namespace KraftHaus\WebClip\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use KraftHaus\WebClip\Http\Requests\Auth\UpdateProfileRequest;

class MeController extends Controller
{
    /**
     * Show the current logged-in user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(
            $this->user()
        );
    }

    /**
     * Update the current user with new data.
     *
     * @param  \KraftHaus\WebClip\Http\Requests\Auth\UpdateProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProfileRequest $request)
    {
        $this->user()->update($request->all());

        return response()->json(
            $this->user()
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function user()
    {
        return Auth::guard()->user();
    }
}
