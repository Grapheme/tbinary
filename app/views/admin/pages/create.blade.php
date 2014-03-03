@extends('layouts.admin.index')

@section('plugins')
    
    <script src="<?=URL::to('admin_template/js/plugin/summernote/summernote.js')?>"></script>
    <script>
        $('.editor').summernote({
                height: 250
        });

        function saveBtn(that, close)
        {
            var $formId = $(that).attr('data-id');
            var $form = $('#' + $formId);
            var $dataArray = {};
            $form.find('input.input-lg, textarea').each(function(){
                $dataArray[$(this).attr('name')] = ($(this).val());
            });

            $form.find('select[name=language]').each(function(){
                $dataArray[$(this).attr('name')] = ($(this).val());
            });

            if($('input[name=in_menu]').is(':checked'))
            {
                $dataArray['in_menu'] = $('input[name=in_menu]').val();
            } else {
                $dataArray['in_menu'] = 0;
            }

            $('.editor').each(function(){
                $dataArray[$(this).attr('name')] = $(this).code();
            });


              $.ajax({
                  url: $form.attr('action'),
                  data: $dataArray,
                  type: 'post',
                  }).done(function(){

                    $form.find('.input').removeClass('state-error');

                    $.bigBox({
                            title : "Page saved",
                            color : "#739E73",
                            timeout: 7000,
                            icon : "fa fa-check",
                        });

                        if(close === true)
                        {
                            window.location.href = $(that).attr('href');
                        }

                  }).fail(function(data){

                        var $errors = JSON.parse(data.responseJSON);

                        $form.find('.input').removeClass('state-error');

                        for(var key in $errors)
                        {
                            $('input[name=' + key + ']').parent().addClass('state-error');
                            //console.log($('input[name=' + json.errors[key] + ']'));
                        }

                        $errorPos = $form.find('.state-error').first().parent().position().top;

                        if($(window).scrollTop() > $errorPos)
                        {
                            $('html, body').animate({ scrollTop: $errorPos });
                        }
                            
                        $.bigBox({
                            title : "Error!",
                            content : data.responseJSON,
                            color : "#C46A69",
                            timeout: 7000,
                            icon : "fa fa-warning shake animated",
                        });

                  }).always(function(data){
                    console.log(data);
                  });
        }

        $('.btn-just-save').click(function(){
            saveBtn($(this));
            return false;
        });

        $('.btn-save-n-close').click(function(){
            saveBtn($(this), true);
            return false;
        });

        $('.template-select').on('change', function(){

            $_select = $(this);

            $.ajax({
                url: '{{slink::to('admin/temps/insert/')}}',
                data:  { id: $_select.val() },
                type: 'post'
            }).done(function(data){
                $('textarea[name=content]').text(data);

            }).fail(function(data){
                console.log(data);

            });
        });


    </script>

@stop

@section('content')

<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">

    <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget" style="">

        <!-- widget div-->
        <div role="content">

            <!-- widget edit box -->
            <div class="jarviswidget-editbox">
                <!-- This area used as dropdown edit box -->

            </div>
            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body">

                <form class="smart-form ajax-form" action="<?=slink::to('admin/pages/store')?>" method="post" id="edit-from">

                    <section>
                        <section style="display: inline-block;">
                            <label class="toggle">
                                <input type="checkbox" name="in_menu" value="1">
                                <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Show in menu: 
                            </label>
                        </section>
                        <hr>
                    </section>

                    

                    <section>
                        <label class="label">Name</label>
                        <label class="input">
                            <input type="text" class="input-lg" name="name">
                        </label>
                    </section>
                    <section>
                        <label class="label">URL</label>
                        <label class="input">
                            <input type="text" class="input-lg" name="url">
                        </label>
                    </section>
                    <section>
                        <label>Language</label>
                        <label class="select">
                            <select name="language">
                                @foreach($langs as $lang)
                                <option value="{{$lang->code}}">{{$lang->name}}</option>
                                @endforeach
                            </select> <i></i>
                        </label>
                    </section>

                    <section>
                        <label class="label">Title</label>
                        <label class="input">
                            <input type="text" class="input-lg" name="title">
                        </label>
                    </section>
                    <section>
                        <label class="label">Description</label>
                        <label class="input">
                            <input type="text" class="input-lg" name="description">
                        </label>
                    </section>
                    <section>
                        <label class="label">Keywords</label>
                        <label class="input">
                            <input type="text" class="input-lg" name="keywords">
                        </label>
                    </section>
                    <section>
                        <label class="label">Content</label>
                        <section>
                            <label class="select">
                                <select class="template-select">
                                    <option value="0">Select template</option>
                                    @foreach($temps as $temp)
                                    <option value="{{$temp->id}}">{{$temp->name}}</option>
                                    @endforeach
                                </select> <i></i>
                            </label>
                        </section>
                        <label class="textarea">
                            <textarea name="content" style="height: 150px;"></textarea>
                        </label>
                    </section>
                </form>

                <a class="btn btn-success btn-save-n-close" href="<?=URL::previous()?>" data-id="edit-from">Create</a>

            </div>
                                        <!-- end widget content -->

        </div>
        <!-- end widget div -->

    </div>

</article>

@stop


