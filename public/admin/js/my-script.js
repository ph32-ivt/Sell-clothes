$("div.alert").delay(5000).slideUp();

function accessDelete(message)
{
	if (window.confirm(message)) {
		return true;
	}
	return false;
}

$(document).ready(function() {
	$("#addImages").click(function() {
		$("#insert").append('<div class="form-group"><input type="file" class="form-control-file" name="image_detail[]"></div>');
	});
});

$(document).ready(function() {
	$('a#del_img').on('click', function() {
		var url = "http://shop.com/admin/products/del-image/";
		var _token = $("form[name='formEditProduct']").find("input[name='_token']").val();
		var idHinh = $(this).parent().find('img').attr('idHinh');
		var img = $(this).parent().find('img').attr('src');
		var rid = $(this).parent().find('img').attr('id');
		// alert(idHinh);
		$.ajax({
			url: url + idHinh,
			type: 'GET',
			case: false,
			data: {"_token":_token, "idHinh":idHinh, "urlHinh":img},	
			success: function(data) {
				if (data == "Oke") {
					$("#"+rid).remove();
				} else {
					alert('Error ! Please contact admin.');
				}
			}
		});
	});
});