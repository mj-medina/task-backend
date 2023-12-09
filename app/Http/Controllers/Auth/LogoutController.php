<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class LogoutController
 *
 * @author Martin Justin Medina <martin.justin04@gmail.com>
 */
class LogoutController extends Controller
{
    /**
     * Invoke function
     * @return void
     */
    public function __invoke()
    {
        auth()->logout();
    }
}
