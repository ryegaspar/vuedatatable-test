<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
	public function __invoke(Request $request)
	{
		sleep(1);

		$users = QueryBuilder::for(User::class)
			->allowedSorts('email', 'id');

		return UserResource::collection($users->paginate($request->perPage));
	}
}
