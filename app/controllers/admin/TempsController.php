<?php

class TempsController extends BaseController {

	public function getIndex()
	{
		$temps = templates::all();
		return View::make('admin.temps.index', compact('temps'));
	}

	public function getCreate()
	{
		return View::make('admin.temps.create');
	}

	public function getEdit($id)
	{
		$temp = templates::find($id);
		return View::make('admin.temps.edit', compact('temp'));
	}

	public function postUpdate($id)
	{
		$input = Input::all();
		$v = Validator::make($input, templates::$rules);

		if ($v->passes())
		{
			$page = templates::find($id);
			$page->update($input);

			return Response::json('Template saved!', 200);
		} else {
			return Response::json($v->getMessageBag()->toJson(), 400);
		}
	}

	public function postStore()
	{
		$input = Input::all();
		$v = Validator::make($input, templates::$rules);
		if($v->passes())
		{
			templates::create($input);
			return "News created!";
		} else {
			return Response::json($v->getMessageBag()->toJson(), 400);
		}
	}

	public function postDelete()
	{
		$id = Input::get('id');
		if(templates::find($id)->delete())
		{
			return Response::make('News deleted!', 200);
		} else {
			return Response::make('error', 400);
		}
	}

	public function postInsert()
	{
		$id = Input::get('id');
		$temp = templates::find($id)->content;
		return $temp;
	}
}
