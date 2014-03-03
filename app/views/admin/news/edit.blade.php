@extends('layouts.admin.index')

@section('plugins')

	<script src="{{slink::path('admin_template/js/plugin/summernote/summernote.js')}}"></script>
	<script src="{{slink::path('system/js/admin/ajax_submit.js')}}"></script>
	<script>
	
		$('.editor').summernote({
                height: 250
        });

        $('form').ajax_submit('{{slink::to('admin/news/')}}');

	</script>

@stop

@section('content')

	<form action="{{slink::to('admin/news/update/'.$new->id)}}" class="smart-form">
		<section>
	        <label class="label">Language</label>
	        <label class="input">
	            <select name="language">

					@foreach($languages as $id => $lang)
						<option value="{{$lang['code']}}" @if($lang['code'] == $new->language) selected="selected" @endif>{{$lang['name']}}</option>
					@endforeach

				</select>
	        </label>
	    </section>
		<section>
	        <label class="label">Title</label>
	        <label class="input">
	            <input type="text" class="input-lg" name="title" value="{{$new->title}}">
	        </label>
	    </section>
	    <section>
	        <label class="label">Preview</label>
	        <label class="input">
	            <div class="editor" name="preview">{{$new->preview}}</div>
	        </label>
	    </section>
	    <section>
	        <label class="label">Text</label>
	        <label class="input">
	            <div class="editor" name="content">{{$new->content}}</div>
	        </label>
	    </section>
	    <section>
	    	<button type="submit" class="btn btn-primary">Save and quit</button>
	    	<button class="btn ajax-save">Save</button>
	    </section>
	</form>

@stop