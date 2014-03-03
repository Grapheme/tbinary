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

	function ajaxGroupRole($url, $box)
	{
		$.ajax({
			url: $url,
			data: { group_id: $box.attr('data-group'), role_id: $box.attr('data-role') },
			type: 'post'
		}).fail(function(data){
			console.log(data);
		});

	}

	$('.roles-checkbox').click(function(){
		
		var $box = $(this);

		if($box.is(':checked'))
		{
			ajaxGroupRole('{{slink::to('admin/groups/attach')}}', $box);

		} else {
			ajaxGroupRole('{{slink::to('admin/groups/detach')}}', $box);

		}

	});
</script>

@stop

@section('content')

<div style="margin-bottom: 25px;">
	<a class="btn btn-primary" data-toggle="modal" data-target="#group">Add new group</a>
</div>

	<div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget" style="">

		<header role="heading"><div class="jarviswidget-ctrls" role="menu">   <a href="#" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-resize-full "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div><div class="widget-toolbar" role="menu"><a data-toggle="dropdown" class="dropdown-toggle color-box selector" href="javascript:void(0);"></a><ul class="dropdown-menu arrow-box-up-right color-select pull-right"><li><span class="bg-color-green" data-widget-setstyle="jarviswidget-color-green" rel="tooltip" data-placement="left" data-original-title="Green Grass"></span></li><li><span class="bg-color-greenDark" data-widget-setstyle="jarviswidget-color-greenDark" rel="tooltip" data-placement="top" data-original-title="Dark Green"></span></li><li><span class="bg-color-greenLight" data-widget-setstyle="jarviswidget-color-greenLight" rel="tooltip" data-placement="top" data-original-title="Light Green"></span></li><li><span class="bg-color-purple" data-widget-setstyle="jarviswidget-color-purple" rel="tooltip" data-placement="top" data-original-title="Purple"></span></li><li><span class="bg-color-magenta" data-widget-setstyle="jarviswidget-color-magenta" rel="tooltip" data-placement="top" data-original-title="Magenta"></span></li><li><span class="bg-color-pink" data-widget-setstyle="jarviswidget-color-pink" rel="tooltip" data-placement="right" data-original-title="Pink"></span></li><li><span class="bg-color-pinkDark" data-widget-setstyle="jarviswidget-color-pinkDark" rel="tooltip" data-placement="left" data-original-title="Fade Pink"></span></li><li><span class="bg-color-blueLight" data-widget-setstyle="jarviswidget-color-blueLight" rel="tooltip" data-placement="top" data-original-title="Light Blue"></span></li><li><span class="bg-color-teal" data-widget-setstyle="jarviswidget-color-teal" rel="tooltip" data-placement="top" data-original-title="Teal"></span></li><li><span class="bg-color-blue" data-widget-setstyle="jarviswidget-color-blue" rel="tooltip" data-placement="top" data-original-title="Ocean Blue"></span></li><li><span class="bg-color-blueDark" data-widget-setstyle="jarviswidget-color-blueDark" rel="tooltip" data-placement="top" data-original-title="Night Sky"></span></li><li><span class="bg-color-darken" data-widget-setstyle="jarviswidget-color-darken" rel="tooltip" data-placement="right" data-original-title="Night"></span></li><li><span class="bg-color-yellow" data-widget-setstyle="jarviswidget-color-yellow" rel="tooltip" data-placement="left" data-original-title="Day Light"></span></li><li><span class="bg-color-orange" data-widget-setstyle="jarviswidget-color-orange" rel="tooltip" data-placement="bottom" data-original-title="Orange"></span></li><li><span class="bg-color-orangeDark" data-widget-setstyle="jarviswidget-color-orangeDark" rel="tooltip" data-placement="bottom" data-original-title="Dark Orange"></span></li><li><span class="bg-color-red" data-widget-setstyle="jarviswidget-color-red" rel="tooltip" data-placement="bottom" data-original-title="Red Rose"></span></li><li><span class="bg-color-redLight" data-widget-setstyle="jarviswidget-color-redLight" rel="tooltip" data-placement="bottom" data-original-title="Light Red"></span></li><li><span class="bg-color-white" data-widget-setstyle="jarviswidget-color-white" rel="tooltip" data-placement="right" data-original-title="Purity"></span></li><li><a href="javascript:void(0);" class="jarviswidget-remove-colors" data-widget-setstyle="" rel="tooltip" data-placement="bottom" data-original-title="Reset widget color to default">Remove</a></li></ul></div>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>Groups list</h2>
		<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

		<div role="content">

			<div class="jarviswidget-editbox">

			</div>

			<div class="widget-body no-padding">

				<table class="table table-bordered table-striped">

					<thead>

						<th>Group</th>
						@foreach($roles as $role)
						<th style="width: 200px;">{{$role->desc}}</th>
						@endforeach

					</thead>

					<tbody>

						@foreach($groups as $group)

							<tr class="news-item">

							<td>
								{{$group->name}}
							</td>

							<?php

								$group_roles = [];
								
								foreach($group->roles as $role)
								{
									$group_roles[] = $role->id;
								}

							?>

								@foreach($roles as $role)

									<td><form><input class="roles-checkbox" type="checkbox" data-role="{{$role->id}}" data-group="{{$group->id}}" @if(in_array($role->id, $group_roles)) checked="checked" @endif></form></td>

								@endforeach

							</tr>

						@endforeach

					</tbody>

				</table>

			</div>

		</div>

	</div>

<div class="modal fade in" id="group" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title" id="myModalLabel">Add new group</h4>
			</div>
			<div class="modal-body">

				<div class="row">
					<div class="col-md-12">
						<form id="add-lang" class="form-ajax-submit" action="{{slink::to('admin/groups/create')}}">
							<div class="form-group">
								<label>Name:</label>
								<input class="form-control" name="name" type="text">
								<label>Description:</label>
								<input class="form-control" name="desc" type="text">
							</div>
							<input type="submit" class="btn btn-primary" data-id="add-lang" value="add">
						</form>
					</div>
				</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>


@stop