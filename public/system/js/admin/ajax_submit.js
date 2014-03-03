function failResp($data, $form)
{
	var $errors = JSON.parse($data.responseJSON);

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
        content : $data.responseJSON,
        color : "#C46A69",
        timeout: 7000,
        icon : "fa fa-warning shake animated",
    });
}

function successResp($message, $form, $href)
{
	$form.find('.input').removeClass('state-error');

    if(typeof $href != "undefined")
    {
        window.location.href = $href;
    } else {
        $.bigBox({
            title : $message,
            color : "#739E73",
            timeout: 7000,
            icon : "fa fa-check",
        });
        
    }
}

function formSubmitOn($_form, $redirect)
{
	var $data = $_form.serialize();

	$('.editor').each(function(){
		$data += "&" + $(this).attr('name') + "=" + $(this).code();
	});
	
	$.ajax({
		url: $_form.attr('action'),
		data: $data,
		type: 'post'
	}).always(function($data){
		console.log($data);

	}).fail(function($data){
		failResp($data, $_form);

	}).done(function(data){
		successResp(data, $_form, $redirect);

	});
}

$.fn.ajax_submit = function($redirect)
{
	var $_form = $(this);

	var $_save_btn = $(this).find('.ajax-save');

	$_form.on('submit', function(e){
		event.preventDefault();
		formSubmitOn($_form, $redirect);

	});

	$_save_btn.click(function(){
		formSubmitOn($_form);
		return false;

	});
}