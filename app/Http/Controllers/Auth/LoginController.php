<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class LoginController
 *
 * @author Martin Justin Medina <martin.justin04@gmail.com>
 */
class LoginController extends Controller
{
    /**
     * Invoke function
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'errors' => [
                    'email' => ['Credentials does not match.']
                ]
            ], 422);
        }

        return response()->json($request->user());
    }
}
