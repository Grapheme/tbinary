@extends('layouts.admin.index')

@section('plugins')

<script>
	$(function(){

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
		    }).done(function(){

		    	location.reload();
		    	
		    }).fail(function(data){

		    	console.log(data);

		    	var $errors = data.responseJSON;

		        $.bigBox({
		            title : "Error!",
		            content : $errors,
		            color : "#C46A69",
		            timeout: 15000,
		            icon : "fa fa-warning shake animated",
		        });
		        
		    });
			
		});

		$('.language-delete-btn').click(function(){

			var $that = $(this).parent().parent();
			var $id = $(this).attr('data-id');

			$.ajax({
				url: '{{URL::to('admin/languages/delete')}}',
				data: { id: $id },
				type: 'post',
            }).done(function(){
            	$that.fadeOut('fast');
            }).always(function(data){
            	console.log(data);
            });

			return false;
		});

	});
</script>

@stop

@section('content')

<div style="margin-bottom: 25px;">
	<a class="btn btn-primary" data-toggle="modal" data-target="#lang">Add new language</a>
</div>
<table class="table table-bordered table-striped">
<thead>
	<tr>
		<th>Code</th>
		<th>Name</th>
	</tr>
</thead>
<tbody>

	@foreach($langs as $lang)
		<tr>
			<td>{{$lang->code}}</td>
			<td>{{$lang->name}}</td>
			<td><a href='{{slink::to('admin/languages/'.$lang->id.'/edit')}}'>Edit</a></td>
			<td><a href='{{slink::to('admin/languages/delete')}}' class="language-delete-btn" data-id="{{$lang->id}}">Delete</a></td>
		</tr>
	@endforeach

</tbody>
</table>

<div class="modal fade in" id="lang" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title" id="myModalLabel">Add new language</h4>
			</div>
			<div class="modal-body">

				<div class="row">
					<div class="col-md-12">
						<form id="add-lang" class="form-ajax-submit" action="{{slink::to('admin/languages/create')}}">
							<div class="form-group">
								<label>Code:</label>
								<input type="text" class="form-control" name="code">
							</div>
							<div class="form-group">
								<label>Name:</label>
								<input class="form-control" name="name">
							</div>
							<input type="hidden" value="0" name="default">
							<input type="submit" class="btn btn-primary" value="Add">
						</form>
					</div>
				</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

@stop