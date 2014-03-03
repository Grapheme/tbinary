@extends('layouts.admin.index')

@section('content')

<h1>Show Page</h1>

<p>{{ link_to_route('admin.pages.index', 'Return to all pages') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Url</th>
				<th>Title_en</th>
				<th>Description_en</th>
				<th>Keywords_en</th>
				<th>Content_en</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $page->name }}}</td>
					<td>{{{ $page->url }}}</td>
					<td>{{{ $page->title_en }}}</td>
					<td>{{{ $page->description_en }}}</td>
					<td>{{{ $page->keywords_en }}}</td>
					<td>{{{ $page->content_en }}}</td>
                    <td>{{ link_to_route('admin.pages.edit', 'Edit', array($page->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.pages.destroy', $page->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
