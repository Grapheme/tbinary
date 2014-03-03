@extends('layouts.admin.index')

@section('content')

<?php $groups = User::find(Auth::user()->id)->groups;

		foreach($groups as $group)
		{
			echo "Group: ";
			echo $group->name."\n";
			$id = $group->id;
			$roles = Group::find($id)->roles;

			echo "<br>Permissions: ";
			foreach($roles as $role)
			{
				echo $role->name."\n";
			}
			echo "<br>";
		}
		echo "Current language: ".Config::get('app.locale');

		?>

@stop