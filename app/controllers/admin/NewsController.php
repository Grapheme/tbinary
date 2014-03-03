<?php

class NewsController extends BaseController {

	public function __construct()
	{
		$this->beforeFilter('admin_news');
	}

	public function getIndex()
	{
		$news = news::all();
		return View::make('admin.news.index', compact('news'));
	}

	public function getCreate()
	{
		$languages = language::retArray();
		$settings = settings::retArray();
		return View::make('admin.news.create', compact('languages', 'settings'));
	}

	public function getEdit($id)
	{
		$new = news::find($id);
		$languages = language::all();
		return View::make('admin.news.edit', compact('new', 'languages'));
	}

	public function postUpdate($id)
	{
		$input = Input::all();
		$v = Validator::make($input, news::$rules);

		if ($v->passes())
		{
			$page = news::find($id);
			$page->update($input);

			return Response::json('News saved!', 200);
		} else {
			return Response::json($v->getMessageBag()->toJson(), 400);
		}
	}

	public function postStore()
	{
		$input = Input::all();
		$v = Validator::make($input, news::$rules);
		if($v->passes())
		{
			news::create($input);
			return "News created!";
		} else {
			return Response::json($v->getMessageBag()->toJson(), 400);
		}
	}

	public function postDelete()
	{
		$id = Input::get('id');
		if(news::find($id)->delete())
		{
			return Response::make('News deleted!', 200);
		} else {
			return Response::make('error', 400);
		}
	}
}
