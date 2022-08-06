<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __invoke(Request $request)
	{
		$users = new User;

		if ($request->sort) {
			$sort = explode(',', $request->sort);

			foreach ($sort as $item) {
				list ($sortCol, $sortDir) = explode('|', $item);
				$sortDir = $sortDir ?? 'asc';
				$users = $users->orderBy($sortCol, $sortDir);
			}
		}

		return UserResource::collection($users->paginate($request->perPage));
	}
}
