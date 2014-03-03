@extends('layouts.admin.index')

@section('plugins')
	
<script>
	
	$(function(){
		$('.lang-change').on('change', function(){
			var $_form = $(this).parent();
			var $id = $(this).val();
			$.ajax({
				url: $_form.attr('action'),
				data: { id: $id },
				type: 'post',	
			}).done(function(data){
				$.smallBox({
					title : "Settings saved!",
					content : "",
					color : "#296191",
					iconSmall : "fa fa-thumbs-up bounce animated",
					timeout : 4000
				});
			});
		});
	});

</script>

@stop

@section('content')

<table>

		<tr>
			<td>Admin panel language: </td>
		<td>
			<form action="{{slink::to('admin/settings/adminlanguagechange')}}">
				<select class="lang-change">

					@foreach($languages as $id => $lang)
						<option value="{{$id}}" @if($lang['code'] == $settings['admin_language']['value']) selected="selected" @endif>{{$lang['name']}}</option>
					@endforeach

				</select>
			</form>
		</td>
		</tr>

</table>

@stop