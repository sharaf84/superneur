//Cool ios7 switch - Beta version
//Done using pure Javascript
//var Switch = require('ios7-switch')
//        , checkbox = document.querySelector('.ios')
//        , mySwitch = new Switch(checkbox);
// mySwitch.toggle();
//      mySwitch.el.addEventListener('click', function(e){
//        e.preventDefault();
//        mySwitch.toggle();
//      }, false);
////creating multiple instances
//var Switch2 = require('ios7-switch')
//        , checkbox = document.querySelector('.iosblue')
//        , mySwitch2 = new Switch2(checkbox);
//
//      mySwitch2.el.addEventListener('click', function(e){
//        e.preventDefault();
//        mySwitch2.toggle();
//      }, false);
//	  
$(document).ready(function(){
	  //Dropdown menu - select2 plug-in
          if($("#select").length >0 )
	  $(".select").select2();
	  
	  //Multiselect - Select2 plug-in
          if($("#multi").length >0 )
	  $("#multi").val(["Jim","Lucy"]).select2();
	  
	  //Date Pickers
	  $('.input-append.date').datepicker({
                                format: "yyyy-mm-dd",
				autoclose: true,
				todayHighlight: true
	   });
	 
	 $('#dp5').datepicker();
	 
	 $('#sandbox-advance').datepicker({
			format: "dd/mm/yyyy",
			startView: 1,
			daysOfWeekDisabled: "3,4",
			autoclose: true,
			todayHighlight: true
    });
	
	//Time pickers
	$('.timepicker-default').timepicker();
    $('.timepicker-24').timepicker({
                minuteStep: 1,
                showSeconds: true,
                showMeridian: false
     });
	//Color pickers
        if($('.my-colorpicker-control').length > 0)
	$('.my-colorpicker-control').colorpicker()
	
	//Input mask - Input helper
	$(function($){
            if($('#date').length > 0)
	   $("#date").mask("99/99/9999");
       if($('#phone').length > 0)
	   $("#phone").mask("(999) 999-9999");
       if($('#tin').length > 0)
	   $("#tin").mask("99-9999999");
       if($('#ssn').length > 0)
	   $("#ssn").mask("999-99-9999");
	});
	
	//Autonumeric plug-in - automatic addition of dollar signs,etc controlled by tag attributes
        if($('.auto').length > 0)
	$('.auto').autoNumeric('init');
	
	//HTML5 editor
        if($('#text-editor').length > 0)
	$('#text-editor').wysihtml5();
	
	//Drag n Drop up-loader
        if($('div#myId').length > 0)
	$("div#myId").dropzone({ url: "/file/post" });
	
	//Single i
        //nstance of tag inputs  -  can be initiated with simply using data-role="tagsinput" attribute in any input field
        if($('#source-tags').length > 0)
	$('#source-tags').tagsinput({
		typeahead: {
			source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
		}	
	});
});