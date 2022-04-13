/*
Product Name: Neomail contact form builder
Description: A smart responsive contact form builder
License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Tags: neomail, neomail contact form builder, neomail contact form builder 5, contact form, contact form bulider, contact form constructor, easy form maker, form maker, forms, modern forms, responsive form, simple contact form
*/
"use strict";

function initNeomailFormBuilder(){
	window.neomailFormBuilder = new NeomailFormBuilder();
}

function NeomailFormBuilder(){
	var _this = this;
	_this.callDatepicker();
  _this.uploadPre();

	$('input, textarea').placeholder(); //old browsers placeholder

  //On submit form function
  $('#neomail_form_submit').on('click', 'button', function() {
    var btn = $(this).button('loading');
    $('#neomail_form_alert').fadeOut(100);
    _this.checkedVals(); //prepare checked values
    var data = new Array();

    // Validate form inputs 
    function validation() { 
      var return_data, inp_leng = $('.form-control').length;
      $('.form-control').each(function() {
        var selector = $(this),
            validation = selector.attr('data-validation'),
            msg = selector.attr('data-err-msg'),
		        name = selector.attr('name'),
		        value = selector.val();

        switch (validation) {
          case 'email':
            var atpos = selector.val().indexOf("@"),
                dotpos = selector.val().lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= selector.val().length) { //email validation
              _this.alerting({ 'error': 1, 'message': msg });
              selector.focus();
              return_data = 1;
              return false;
            }
            break;
          case 'empty-value':
            if (selector.val() === null || selector.val() === "") { //empty value validation
              _this.alerting({ 'error': 1, 'message': msg });
              selector.focus();
              return_data = 1;
              return false;
            }
            break;
          case 'radio':
         		var check = 0
            selector.parent().find('input[type=radio]').each(function() { //radio button validation
              if (this.checked) {
                check = 1;
                return false;
              }
            });
            if (check == 0) {
              _this.alerting({ 'error': 1, 'message': msg });
              selector.parent().find('input[type=radio]').focus();
              return_data = 1;
              return false;
            }
            break;
        } //End switch

      });
      if (return_data != 1) return true;
    };
    if (!validation()) return false;

    //Transfer submited parameters into 'dataToMail.php' to send message
    $.ajax({ 
      type: 'POST',
      url: 'dataToMail.php',
      data: new FormData($(".neomail_form").get(0)),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        _this.ressetCaptcha(false);
        _this.alerting(data);
      },
      error: function (xhr, ajaxOptions, thrownError) {
      	var data = {
      		"error" : 1,
      		"message" : 'Error: status code:'+xhr.status+', thrown error: '+thrownError 
      	}
      	_this.alerting(data);
      }
    });

  });
}

//Load date and time picker
NeomailFormBuilder.prototype.callDatepicker = function(){
	$('.neomail_module.date').each(function() {
    var elem = '#' + $(this).attr('id'),
        format = $('input', this).attr('data-format'),
        lang = $('input', this).attr('data-locale');
    $(elem).datetimepicker();
    $(elem).data("DateTimePicker").destroy();
    $.getScript("js/datetimeLanguages/" + lang + ".js?" + Math.random()).done(function() {
      $(elem).datetimepicker({
        locale: moment.locale(lang),
        format: (format)
      });
      $('.date').on('click', 'input', function() {
        $(this).parent().data("DateTimePicker").show()
      });
    })
  });
}


//Join checkbox values
NeomailFormBuilder.prototype.checkedVals = function() {
	var vals = '';
  $('.neomail_module input[type=checkbox]').each(function() {
    if (this.checked) {
      var coma = (vals == '' ? "" : ",");
      vals += coma + $(this).closest('.checkbox').find('label').html()
    }
    $(this).closest('.neomail_module').find('.cvals').val(vals);
  });

}

//Prepare selected file
NeomailFormBuilder.prototype.uploadPre = function() { 
  var sec = $('section.neomail_module');
  sec.off('click', '.attach_bt')
  sec.off('change', '.attach')

  sec.on('click', '.attach_bt', function() {
    $(this).parent().find('.attach').click();
  });

  sec.on('change', '.attach', function(e) {
    var files = e.target.files;
    for (var i = 0, file; file = files[i]; i++) {
      $(this).parent().find('.attach_h').html(file['name']);
    }
  });
}

NeomailFormBuilder.prototype.ressetCaptcha = function(focus){
	$("#neomail_captcha_pic").attr("src", "captcha/captcha.php?"+(new Date()).getTime());
	$('#neomail_captcha-form').val('');
	if(focus){
		$("#neomail_captcha-form").focus();
	}
}

// Alerting data function
NeomailFormBuilder.prototype.alerting = function(data) {
  var custom_alert = $('#neomail_form_alert'),
      custom_alert_strong = $('#neomail_form_alert strong'),
      custom_alert_span = $('#neomail_form_alert span'),
      icon = "";
  //Error message
  if (data['error'] == '1') { 
    custom_alert.removeClass('alert-success').addClass('alert-danger');
    icon = '<i class="fa fa-exclamation-triangle"></i>' // error icon
    custom_alert_strong.html(icon);
    custom_alert_span.html(data['message']); //set error message
    custom_alert.fadeIn(300);
    $('#neomail_form_submit button').button('reset');
  }
  //Success message
  if (data['error'] == '0') { 
    custom_alert.fadeOut(100);
    $('#neomail_form_submit button').button('reset');
    if(data.method == 'popup'){
    	$('#neomailModal').modal('show');
    	$('#neomailModalLabelTitle').html(data['title']);
    	$('.modal-body p').html(data['message']);
    	$('#neomailModal').on('hidden.bs.modal', function() {
      	$('.neomail_form')[0].reset();
    	})
    }else{
    	window.location.href = data.redirect_url;
    }
    
  }
}

function distroyNeomailFormBuilder(){
	$('#neomail_form_submit').unbind();
	window.neomailFormBuilder = {};
}

$(document).ready(function() {
	initNeomailFormBuilder();
});

