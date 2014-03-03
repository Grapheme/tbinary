@extends('layouts.admin.index')

@section('plugins')

<script>
	$('.form-ajax-submit').on('submit', function(event){

		event.preventDefault();

		var $_form = $(this);
		var $data = {};

		$_form.find('input').not('input[type=submit]').each(function(){
			$data[$(this).attr('name')] = $(this).val();
		});

		$.ajax({
			url: $_form.attr('action'),
			data: $data,
			type: 'post',
        }).done(function(href){
        	window.location.href = href;
        }).fail(function(data){
        	var $errors = data.responseJSON;
        	console.log(data);

            $.bigBox({
                title : "Error!",
                content : $errors,
                color : "#C46A69",
                timeout: 15000,
                icon : "fa fa-warning shake animated",
            });
        });

		
	});

	$('.group-add-select').on('change', function(){
		var $_select = $(this);
		if($_select.val() != 0)
		{
			$.ajax({
				url: '{{slink::to('admin/users/attach')}}',
				data: { group_id: $_select.val(), user_id: $_select.attr('data-user')},
				type: 'post'
			}).always(function(data){
				console.log(data);
			});
		}
	});

</script>

@stop

@section('content')

<div style="margin-bottom: 25px;">
	<a class="btn btn-primary" data-toggle="modal" data-target="#user">Add new user</a>
</div>
<table class="table table-bordered table-striped">
<thead>
	<tr>
		<th>id</th>
		<th>Username</th>
		<th>Groups</th>
	</tr>
</thead>
<tbody>
	@foreach($users as $user)
		<tr>
			@if($user->id == Auth::user()->id)
			<td>{{$user->id}} (you)</td>
			@else
			<td>{{$user->id}}</td>
			@endif
			<td>{{$user->user}}</td>
			<td>
				<span class="groups-list">
					@foreach($groups as $group)
						{{$group->name}}
					@endforeach
				</span>
				<select class="group-add-select" data-user="{{$user->id}}">
					<option value="0">Add</option>
					@foreach($all_groups as $all_group)
						@if(!in_array($all_group->id, $groups_ids_array))
							<option value="{{$all_group->id}}">{{$all_group->name}}</option>
						@endif
					@endforeach
				</select>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

<div class="modal fade in" id="user" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title" id="myModalLabel">Add new user</h4>
			</div>
			<div class="modal-body">

				<div class="row">
					<div class="col-md-12">
						<form id="add-lang" class="form-ajax-submit" action="{{slink::to('admin/users/create')}}">
							<div class="form-group">
								<label>Username:</label>
								<input class="form-control" name="user" type="text">
								<label>Password:</label>
								<input class="form-control" name="password" type="text">
							</div>
							<input type="submit" class="btn btn-primary" data-id="add-lang" value="add">
						</form>
					</div>
				</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

@stop