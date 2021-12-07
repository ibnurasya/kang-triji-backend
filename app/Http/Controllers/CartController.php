<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Support\Facades\Auth;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller as OrionController;

class CartController extends OrionController
{

    use DisableAuthorization;

    protected $model = Cart::class;

    /**
     * Retrieves currently authenticated user based on the guard.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function resolveUser()
    {
        return Auth::guard('sanctum')->user();
    }

    public function filterableBy() : array {
	    return ['created_at', 'user_id'];
    }

}
