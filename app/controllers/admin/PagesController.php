<?php

class PagesController extends BaseController {

	protected $page;

	public function __construct(Page $page)
	{
		$this->model = $page;
	}

	public function getIndex()
	{
		$pages = $this->model->all();

		return View::make('admin.pages.index', compact('pages'));
	}

	public function getCreate()
	{
		$bread = trans('admin.creating');
		$temps = templates::all();
		$langs = language::all();
		return View::make('admin.pages.create', compact('temps', 'bread', 'langs'));
	}

	public function postStore()
	{
		$input = Input::all();

		$validation = Validator::make($input, Page::$rules);

		if ($validation->passes())
		{
			$this->model->create($input);
			
			//return Redirect::route('admin.pages.index');

			return Response::json('success', 200);
		} else {
			return Response::json($validation->getMessageBag()->toJson(), 400);
		}

	}

	public function getShow($id)
	{
		$page = $this->model->findOrFail($id);

		return View::make('admin.pages.show', compact('page'));
	}

	public function getEdit($id)
	{
		$page = $this->model->find($id);
		$langs = language::all();
		$temps = templates::all();
		$bread = trans('admin.editing');

		return View::make('admin.pages.edit', compact('page', 'bread', 'langs', 'temps'));
	}

	public function postUpdate($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Page::$rules);

		if ($validation->passes())
		{
			$page = $this->model->find($id);
			$page->update($input);

			return Response::json('success', 200);
		} else {
			return Response::json($validation->getMessageBag()->toJson(), 400);
		}

	}

	public function postDestroy($id)
	{
		if($this->model->find($id)->delete())
		{
			return Response::json('success', 200);
		} else {
			return Response::json('error', 400);
		}

	}

	public function getMenu()
	{
		$bread = "Menu";
		$pages = $this->model->all();
		$pages = $pages->sortBy('sort_menu');
		return View::make('admin.pages.menu', compact('bread', 'pages'));
	}

	public function postSort()
	{
		$input = Input::get('menu');
		$sorts = json_decode($input);
		foreach($sorts as $key => $sort)
		{
			//print_r(Page::find($sort)->get());/*->update(array('sort_menu' => $key));*/
			$model = Page::find($sort);
			$model->sort_menu = $key;
			$model->save();
		}

	}

}
