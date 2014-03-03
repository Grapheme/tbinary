<?php

class Allow {

	public static function to($perm)
	{
		if(Auth::check())
		{
			$groups = User::find(Auth::user()->id)->groups;
			foreach($groups as $group)
			{
				$id = $group->id;
				$roles = Group::find($id)->roles;
				foreach($roles as $role)
				{
					$roleArray[] = $role->name;
				}
			}

			if(isset($roleArray)){
				if(in_array($perm, $roleArray))
				{
					return true;
					
				} else { return false; }
			} else { return false; }
		} else { return false; }
	}

	public static function filter($permission)
	{
		Route::filter($permission, function() use ($permission)
		{
			if($permission == 'admin_panel')
			{
				App::setLocale(settings::where('name', 'admin_language')->first()->value);
			}

			if (!self::to($permission) && Auth::check()) {
				return App::abort(403);
				exit;
			}
			if (!allow::to($permission))
			{
				return App::abort(404);
				exit;
			}

		});
	}

	public static function filters($permissions)
	{
		if(is_array($permissions))
		{
			foreach ($permissions as $permission) {
				self::filter($permission);
			}
		}
	}

	public static function autoFilters()
	{
		$model = role::all();
		foreach ($model as $role) {
			$roles[] = $role->name;
		}

		self::filters($roles);
	}

}