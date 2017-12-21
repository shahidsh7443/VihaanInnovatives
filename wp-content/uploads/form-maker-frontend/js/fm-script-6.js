    var fm_currentDate = new Date();
    var FormCurrency_6 = '';
    var FormPaypalTax_6 = '0';
    var check_submit6 = 0;
    var check_before_submit6 = {};
    var required_fields6 = ["2","4","25","18","31","33"];
    var labels_and_ids6 = {"2":"type_name","4":"type_text","25":"type_address","18":"type_own_select","31":"type_text","32":"type_text","33":"type_submitter_mail","34":"type_submit_reset"};
    var check_regExp_all6 = {"31":["%5E%5B789%5D%5Cd%7B9%7D%24","","Invalid mobile number ,Please enter  a valid 10 digit mobile number"],"32":["%5E%28%5C+%29%3F%5B0-9%5D+%28-%5B0-9%5D+%29%3F%28-%5B0-9%5D+%29%3F%28-%5B0-9%5D+%29%3F%24","","Invalid Phone Number"]};
    var check_paypal_price_min_max6 = [];
    var file_upload_check6 = [];
    var spinner_check6 = [];
    var scrollbox_trigger_point6 = '20';
    var header_image_animation6 = 'none';
    var scrollbox_loading_delay6 = '0';
    var scrollbox_auto_hide6 = '1';
         function before_load6() {	
}	
 function before_submit6() {
	 }	
 function before_reset6() {	
}
    function onload_js6() {
    }
    function condition_js6() {
    }
    function check_js6(id, form_id) {
    if (id != 0) {
    x = jQuery("#" + form_id + "form_view"+id);
    }
    else {
    x = jQuery("#form"+form_id);
    }    }
    function onsubmit_js6() {
    
  var disabled_fields = "";	
  jQuery("div[wdid]").each(function() {
    if(jQuery(this).css("display") == "none") {
      disabled_fields += jQuery(this).attr("wdid");
      disabled_fields += ",";
    }
    if(disabled_fields) {
      jQuery("<input type=\"hidden\" name=\"disabled_fields6\" value =\""+disabled_fields+"\" />").appendTo("#form6");
    }
  });    }
    jQuery(window).load(function () {
    formOnload(6);
    });
    form_view_count6 = 0;
    jQuery(document).ready(function () {
    fm_document_ready(6);
    });
    