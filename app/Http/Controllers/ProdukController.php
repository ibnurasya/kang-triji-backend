<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Support\Facades\Auth;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller as OrionController;

class ProdukController extends OrionController
{

    use DisableAuthorization;

    protected $model = Produk::class;

    /**
     * Retrieves currently authenticated user based on the guard.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function resolveUser()
    {
        return Auth::guard('sanctum')->user();
    }
}
