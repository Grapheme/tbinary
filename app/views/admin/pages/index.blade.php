@extends('layouts.admin.index')

@section('plugins')

<script>

	$(".btn-danger").click(function(e) {
		var $form = $(this).parent();
		$.SmartMessageBox({
			title : "Deleting page!",
			content : "You're going to delete this page?",
			buttons : '[No][Yes]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Yes") {
				$.ajax({
					url: $form.attr('action'),
					type: 'post',
				}).done(function(){
					$form.parent().parent().fadeOut();
				}).fail(function(data){
					console.log(data);
				});
			}
			if (ButtonPressed === "No") {
				return false;
			}

		});
		e.preventDefault();
	});

</script>

@stop

@section('content')

<div style="margin-bottom: 25px;">
	<a class="btn btn-primary" href="<?=slink::to('admin/pages/create')?>">Add new page</a>
</div>

@if ($pages->count() > 1)
<div style="margin-bottom: 25px;">
	<a class="btn btn-default" href="<?=slink::to('admin/pages/menu')?>">Sort menu</a>
</div>
@endif

@if ($pages->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Url</th>
				<th>Title</th>
				<th></th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach ($pages as $page)
				<tr>
					<td>{{ $page->name }}</td>
					<td>{{ $page->url }}</td>
					<td>{{ $page->title }}</td>
                    <td><a href="{{slink::to('admin/pages/edit/'.$page->id)}}" class="btn btn-info">Edit</a></td>
                    <td>
                        <form method="POST" action="{{slink::to('admin/pages/destroy/'.$page->id)}}">
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        </form>
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no pages
@endif

@stop
