	function ajax_csrf_setup(){
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
	}

	function toastr_success(message){
	        toastr.success(message);
	}

	function toastr_info(message){
		toastr.info(message);
	}

	function blog_data_load(response){
		$(".blog_data").html(response);
		$(".blog_title").val('');
		$(".blog_description").val('');
	}

	function displaySelectedPhoto(upload_photo_id,img_id){
	    var fileSelected=document.getElementById(upload_photo_id).files;
	    var image_ui=document.getElementById(img_id);
	    if(fileSelected.length>0){
	        var fileToLoad=fileSelected[0];
	        if(fileToLoad.type.match("image.*")){
	            var fileReader=new FileReader();
	            fileReader.onload=function(fileLoadedEvent){
	                image_ui.src=fileLoadedEvent.target.result;
	            };
	            fileReader.readAsDataURL(fileToLoad);
	        }
	    }
	}