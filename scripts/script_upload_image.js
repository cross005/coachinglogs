$(document).ready(function (e) {
	$("#uploadimage").on('submit',(function(e) {
		
		e.preventDefault();
		$("#message").empty();
		$('#loading').show();

		$.ajax({
			url: "ajax_php_file.php", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
				$('#loading').hide();
				$("#message").html(data);
			}
		});
	}));


	// Function to preview image after validation
	$(function() {
		//Viewing uploaded file for Motivational Feedback
		$("#file").change(function() {
			$("#message").empty(); // To remove the previous error message
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];

			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
			{
				$('#previewing').attr('src','noimage.png');
				$("#message").html("<p id='error'>Please select a valid image file for Motivational Feedback</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
				return false;
			}

			else
			{
				var reader = new FileReader();
				reader.onload = imageIsLoaded;
				reader.readAsDataURL(this.files[0]);
			}
		});

		//Viewing uploaded file for Developmental Feedback
		$("#file1").change(function() {
			$("#message").empty(); // To remove the previous error message
			var file1 = this.files[0];
			var imagefile1 = file1.type;
			var match1 = ["image/jpeg","image/png","image/jpg"];

			if(!((imagefile1==match1[0]) || (imagefile1==match1[1]) || (imagefile1==match1[2])))
			{
				$('#previewing1').attr('src','noimage.png');
				$("#message").html("<p id='error'>Please select a valid image file for Developmental Feedback</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
				return false;
			}

			else
			{
				var reader = new FileReader();
				reader.onload = imageIsLoaded1;
				reader.readAsDataURL(this.files[0]);
			}
		});
	});

	function imageIsLoaded(e) {
		$('#image_preview').css("display", "block");
		$('#previewing').attr('src', e.target.result);
		//$('#previewing').attr('width', '650px');
		//$('#previewing').attr('height', '430px');
	};

	function imageIsLoaded1(e) {
		$('#image_preview1').css("display", "block");
		$('#previewing1').attr('src', e.target.result);
		//$('#previewing1').attr('width', '650px');
		//$('#previewing1').attr('height', '430px');

	};
});