var pattern_email = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
jQuery(document).ready(function($) {
	$( "#data-table-modules tbody" ).sortable({
	    cancel: ".disable-sort-item",
	    update:function(){
	    	var order_modules = "";
			$('#data-table-modules tbody tr').each(function(index, el) {
            	order_modules+=$(this).data('id')+"-";
            });
            $('#order_modules').val(order_modules);
	    }
	});

    $( "#panel_home" ).sortable({
        update:function(){
            var i=1;
            var slides_order="";
            $('#panel_home .panel-collapse').each(function(index, el) {
                $(this).data('order',i);
                slides_order += $(this).data('id')+"-";
                i++;
            });
            $('#slides_order').val(slides_order);
        }
    });

    $("#data-table-modules tbody" ).disableSelection();

    $('#add_slider').click(function(event) {
    	event.preventDefault();
    	var total=parseInt($('#total_modules').val());
    	var base = $('#base-slider').html();
    	res=replaceAll(base,"###",(total+1));
    	$('#panel_home').append(res);
    	$('#total_modules').val((total+1));
        $('#slides_order').val($('#slides_order').val()+(total+1)+"-");
    });

    $('#add_support').click(function(event) {
        event.preventDefault();
        var id=$('#artist_selected option:selected').val();
        $('#current_artists tbody').append('<tr data-id="'+id+'"><td>'+$('#artist_selected option:selected').html()+'<i class="zmdi zmdi-delete zmdi-hc-fw pull-right delete-support" data-id="'+id+'"></i></td></tr>');
        $('#artist_selected option:selected').remove();
        $('#artist_selected').trigger("chosen:updated");
        $('#supports').val($('#supports').val() + id +"-");

    });

    $('#add_concert').click(function(event) {
        event.preventDefault();
        var id=$('#concert_selected option:selected').val();
        $('#current_concerts tbody').append('<tr data-id="'+id+'"><td>'+$('#concert_selected option:selected').html()+'<i class="zmdi zmdi-delete zmdi-hc-fw pull-right delete-concert" data-id="'+id+'"></i></td></tr>');
        $('#concert_selected option:selected').remove();
        $('#concert_selected').trigger("chosen:updated");
        $('#all_concerts').val($('#all_concerts').val() + id +"-");

    });

    $(document).on('keyup','.join-title', {} ,function(event) {
        event.preventDefault();
        $(this).parents('.panel').find('h4.panel-title a').html($(this).val());
    });

    $(document).on('click','.delete-slider', {} ,function(event) {
        event.preventDefault();
        var id=$(this).data('id');
        $('.panel-collapse[data-id="'+id+'"]').remove();
        $('#slides_removed').val($('#slides_removed').val()+id+"-");
    });

    $(document).on('change','.select_type_slider', {} ,function(event) {
        event.preventDefault();
        if($(this).val() == 1){
            $(this).parent().find('.concert_selected').addClass('showing');
        }else{
            $(this).parent().find('.concert_selected').removeClass('showing');
        }
    });

    $(document).on('click','.delete-support', {} ,function(event) {
        event.preventDefault();
        var id=$(this).data('id');
        $('#current_artists tr[data-id="'+id+'"]').remove();
         var str_supports = "";
        $('#current_artists tr').each(function(index, el) {
           id = $(this).data('id');
           str_supports+= id+"-";
        });
        $('#supports').val(str_supports);
    });

    $(document).on('click','.delete-concert', {} ,function(event) {
        event.preventDefault();
        var id=$(this).data('id');
        $('#current_concerts tr[data-id="'+id+'"]').remove();
         var str_concerts = "";
        $('#current_concerts tr').each(function(index, el) {
           id = $(this).data('id');
           str_concerts+= id+"-";
        });
        $('#all_concerts').val(str_concerts);
    });

    if(isset('current_artists')){
        for(i=0;i<current_artists.length;i++){
            $('#artist_selected option[value="'+current_artists[i]+'"]').remove();
            $('#artist_selected').trigger("chosen:updated");
        }

    }

    if(isset('current_concerts')){
        for(i=0;i<current_concerts.length;i++){
            $('#concert_selected option[value="'+current_concerts[i]+'"]').remove();
            $('#concert_selected').trigger("chosen:updated");
        }

    }

    $('.form-module').ajaxForm({
        success:function(date,status,xhr,form){
        	form.next().find('.close-modal').trigger('click');
        }
    });
    $('.save-module').click(function(event) {
    	$(this).parents('.modal-body').find('.form-module').submit();
    });

    $('#form-page').ajaxForm({
        beforeSubmit: function () {
            validateForm($('#form-page'));

            if($('#form-page').hasClass('error')) {
                return false;
            }
        },
        success:function(data,status,xhr,form){
            if(data == 'OK') {
                swal({
                    title: "Save!",
                    text: "Successfully save",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#d9006b",
                    confirmButtonText: "Accept",
                    closeOnConfirm: false
                }, function () {
                    location.href=$('#base_admin').val()+'/users';
                });
            } else {
                swal("Error!", "An error has occurred", "error");
            }
        }
    });

    $('.delete-user').click(function(event) {
       var id = $(this).data('id');
       swal({
           title: "Are you sure?",
           text: "Once deleted it will not be able to recover",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#d9006b",
           confirmButtonText: "Next",
           closeOnConfirm: false
       }, function(){
            $('#form-page').attr('action', $('#form-page').attr('action').replace('save', 'delete'));
            $('#form-page').ajaxForm({
                success:function(data,status,xhr,form){
                    if(data == 'OK') {
                        swal({
                            title: "Deleted!",
                            text: "Successfully deleted",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#d9006b",
                            confirmButtonText: "Accept",
                            closeOnConfirm: false
                        }, function () {
                            location.href=$('#base_admin').val()+'/users';
                        });
                    } else {
                        swal("Error!", "An error has occurred", "error");
                    }
                }
            });
            $('#form-page').submit();
       });
    });

    $('#countries_lang').change(function () {
        if($(this).val() != '') {
            location.href = $('#base_admin').val()+'/'+$('#section').val()+'/'+$(this).val();
        }
    });

    $('.input-translate').blur(function () {
        $(this).parents('form').ajaxForm();
        $(this).parents('form').submit();
    });

    $('.image-translate').change(function () {
        if($(this).val() != '') {
            $(this).parents('form').attr('enctype', 'multipart/form-data');
            $(this).parents('form').ajaxForm();
            $(this).parents('form').submit();
        }
    });

    /****************CUSTOM***************/
    $('.ajax_form').ajaxForm({
        success: function(res) {
            var data = JSON.parse(res);
            if(!data.error) {
                swal({
                    title: "Congratulations!",
                    text: "Changes saved",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#d9006b",
                    confirmButtonText: "Accept",
                    closeOnConfirm: false
                },
                function(){
                    if(data.redirection){
                        location.href=$('#base_admin').val()+'/'+$('#redirect_page').val()+'/'+data.obj.id
                    }else{
                        swal.close();
                    }
                    
                });
            }else{
                swal("Error!", "An error has occurred", "error");
            }
        },
        error: function(){
            swal("Error!", "An error has occurred", "error");
        }
    });

    $(document).on('submit','#filters' ,function(event) {
        event.preventDefault();
    });
    $(document).on('click','a[href="#"]' ,function(event) {
        event.preventDefault();
    });

    $(document).on('click','#go_filter' ,function(event) {
        ajax_table($('#filters').serialize(),1);
    });

    $(document).on('change','#chose_select,#chose_state,#chose_week' ,function(event) {
        ajax_table($('#filters').serialize(),1);
    });

    $(document).on('click','.paginate' ,function(event) {
        if(!$(this).parent().hasClass('disabled')){
            to=$(this).data('page');
        }
        var serialize=$('#filters').serialize();
        var page=to;
        ajax_table(serialize,page);
    });

    $(document).on('click','.close.fileinput-exists' ,function(event) {
        if($(this).parent().find('input[type="hidden"]').length){
            $(this).parent().find('input[type="hidden"]').val("");
        }
    });


    $(document).on('click','.delete-item' ,function(event) {
        var element = $(this);
        event.preventDefault();
        url = $(this).attr('href');
        swal({
            title: "Are you sure?",
            text: "¿Delete this element?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Continue!",
            cancelButtonText: "Cancel!",
            closeOnConfirm: true,
            closeOnCancel: true
        },function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    success:function(data){
                        if($('#list').val() != 'feeds'){
                            ajax_table($('#filters').serialize(),$('#active_page').val());
                        }else{
                            element.parents('tr').remove();
                        }
                       
                    }
                });        
            }
        });
        
    });

    $(document).on('click','.reactive-item' ,function(event) {
        var element = $(this);
        event.preventDefault();
        url = $(this).attr('href');
        swal({
            title: "Are you sure?",
            text: "Activate this element?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Continue!",
            cancelButtonText: "Cancel!",
            closeOnConfirm: true,
            closeOnCancel: true
        },function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    success:function(data){
                        if($('#list').val() != 'feeds'){
                            ajax_table($('#filters').serialize(),$('#active_page').val());
                        }else{
                            element.parents('tr').remove();
                        }
                       
                    }
                });        
            }
        });
        
    });

    $(document).on('click','.confirm-item' ,function(event) {
        var element = $(this);
        event.preventDefault();
        url = $(this).attr('href');
        swal({
            title: "Are you sure?",
            text: "Confirm? The element will be visible on the web",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Continue!",
            cancelButtonText: "Cancel!",
            closeOnConfirm: true,
            closeOnCancel: true
        },function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    success:function(data){
                        ajax_table($('#filters').serialize(),$('#active_page').val());
                    }
                });        
            }
        });
        
    });

    $(document).on('change','.check_winner' ,function(event) {
        var element = $(this);
        if(element.is(':checked')){
            if(parseInt($('#total_winners').val()) >= 5){
                element.prop('checked' , false);
                event.preventDefault();
                swal("Sorry!", "Only 10 winners per week are allowed", "error");
                return;
            }    
        }
        
        

        if(element.is(':checked')){
            var winner=1;
            $('#total_winners').val(parseInt($('#total_winners').val()) + 1);
            element.parents('tr').addClass('tr_winner');
        }else{
            var winner=0;
            $('#total_winners').val(parseInt($('#total_winners').val()) - 1);
            element.parents('tr').removeClass('tr_winner');
        }
        $.ajax({
            url: $('#base_admin').val()+"/add-winner",
            type: 'POST',
            data:'item='+element.data('id')+'&winner='+winner,
            success:function(data){
               
            }
        });
        
    });

    function ajax_table(serialize,page){
        table=$('#list').val();
        switch(table){
            default:
                general_ajax(serialize,page);
            break;

        }

    }
    function general_ajax(serialize,page){
        url = 'ajax-'+$('#list').val();
        $.ajax({
            url: $('#base_admin').val()+"/"+url,
            type: 'POST',
            data:serialize+'&page='+page,
            success:function(data){
               $('#ajax-rows').html(data);
            }
        });
    } 
});
function escapeRegExp(str) {
    return str.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "\\$1");
}
function replaceAll(str, find, replace) {
    return str.replace(new RegExp(escapeRegExp(find), 'g'), replace);
}
function isset(str) {
    return window[str] !== undefined;
}

function validateForm(form) {
    form.removeClass('error');
    form.find('.form-group').removeClass('has-error').find('small.help-block').remove();

    form.find('input, select').each(function () {
        if($(this).hasClass('required') && $(this).val() == ''){
            form.addClass('error');
            $(this).parents('.form-group').addClass('has-error').append('<small class="help-block">This field is required.</small>');
        }

        if($(this).hasClass('email') && !pattern_email.test($(this).val())){
            form.addClass('error');
            $(this).parents('.form-group').addClass('has-error').append('<small class="help-block">This email is not valid.</small>');
        }

        if($(this).hasClass('equal') && $(this).val() != $('#'+$(this).data('equal')).val() ){
            form.addClass('error');
            $(this).parents('.form-group').addClass('has-error').append('<small class="help-block">This field is diferent from '+$(this).data('equal')+'.</small>');
        }
    });
}

function deleteFAQ() {
    $('.delete-faq').unbind('click');

    $('.delete-faq').click(function (e) {
        e.preventDefault();

        $item = $(this);

        swal({
            title: "Are you sure?",
            text: "Once deleted it will not be able to recover",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d9006b",
            confirmButtonText: "Next",
            closeOnConfirm: true
        }, function(){
            $.ajax({
                url: $item.attr('href'),
                success: function(res) {
                    $item.parents('form').remove();
                }
            });
        });
    });
}