@extends('layouts.scaffold')

@section('main')

<h1>Show Group</h1>

<p>{{ link_to_route('groups.index', 'Return to all groups') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Desc</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $group->name }}}</td>
					<td>{{{ $group->desc }}}</td>
                    <td>{{ link_to_route('groups.edit', 'Edit', array($group->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('groups.destroy', $group->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
