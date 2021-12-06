<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
	public function login(Request $request)
	{
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
			$auth = Auth::user();
			$success['token'] =  $auth->createToken('LaravelSanctumAuth')->plainTextToken;
			$success['name'] =  $auth->name;

			return $this->handleResponse($success, 'User logged-in!');
		} else {
			return $this->handleError('Unauthorised.', ['error' => 'Unauthorised']);
		}
	}

	public function register(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required',
			'confirm_password' => 'required|same:password',
			// 'no_hp' => 'string'
		]);

		if ($validator->fails()) {
			return $this->handleerror($validator->errors());
		}

		$input = $request->all();
		$input['password'] = bcrypt($input['password']);
		$user = user::create($input);
		$success['token'] =  $user->createtoken('laravelsanctumauth')->plaintexttoken;
		$success['name'] =  $user->name;

		return $this->handleresponse($success, 'user successfully registered!');
	}

	public function resetPassword(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'password' => 'required',
			'confirm_password' => 'required|same:password',
		]);

		if ($validator->fails()) {
			return $this->handleerror($validator->errors());
		}

		$input = $request->all();
		$input['password'] = bcrypt($input['password']);
		$user = $request->user();
		$user->password = $input['password'];
		$user->save();

		$success['name'] =  $user->name;
		return $this->handleresponse($success, 'Password reset successfull');
	}
}
