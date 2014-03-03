@extends('layouts.admin.index')

@section('plugins')

    <script src="{{slink::path('system/js/admin/ajax_submit.js')}}"></script>
    <script>

        $('form').ajax_submit('{{slink::to('admin/temps/')}}');

    </script>

@stop

@section('content')

    <form action="{{slink::to('admin/temps/store')}}" class="smart-form">
        <section>
            <label class="label">Name</label>
            <label class="input">
                <input type="text" class="input-lg" name="name">
            </label>
        </section>
        <section>
            <label class="label">Content</label>
            <label class="textarea textarea-resizable">                                         
                <textarea rows="3" class="custom-scroll" name="content"></textarea> 
            </label>
        </section>
        <section>
            <button type="submit" class="btn btn-primary">Save</button>
        </section>
    </form>

@stop