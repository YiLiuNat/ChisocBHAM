jQuery(document).ready(function() {
	jQuery(document).find('.grab-form').each(function(index, el) {
		var form = jQuery(this);
		jQuery(this).on('click', '.button', function(event) {
			var data = jQuery(form).serializeArray(),
				btn = jQuery(this),
				bname = jQuery(btn).val(),
				urls = new Array();
			for (var i = 0; i < data.length; i++) {
				if(data[i]['name'] == 'dfoxw_urls'){
					urls = data[i]['value'];
				}
			}
			// for (var i = 0; i < urls.length; i++) {
				console.log(urls);
			// }
			// jQuery(form).ajaxSubmit({
			// 	type:'POST',
   //              dataType:'json',
   //              url:dfox_wp_local.ajax_url,
   //              data:{
			// 		'action': 'dfoxw_ajax_grabform',
			// 		'event':btn.attr('name'),
			// 		'data':data
			// 	},
			// 	beforeSend:function(){
			// 		btn.val('请稍等...');
			// 	},
			// 	success: function(response) {
			// 		if(response.errors){
			// 			for (var i = 0; i < response.errors.length; i++) {
			// 				alert(response.errors[i]);
			// 			}
			// 		}else{
			// 			if(response == 'refresh'){
			// 				window.location.reload();
			// 			}
			// 		}
			// 		jQuery(btn).val(bname);
					
			// 	}
			// });
			return false;
		});
	});
});