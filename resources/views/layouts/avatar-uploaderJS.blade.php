<script type="text/javascript">
	
	//script that trigger the upload of a file
	$(function(){
		$("#avatar_selector").on('click', function(e){
			e.preventDefault();
			$("#avatar").trigger('click');
		});
	});

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$image_crop = $('#image_demo').croppie({
		enableExif: true,
		viewport: {
			width:200,
			height:200,
			type:'circle'},
			boundary:{
				width:300,
				height:300
			}
		});

	$('#avatar').on('change', function(){
		var reader = new FileReader();
		reader.onload = function (event) {
			$image_crop.croppie('bind', {
				url: event.target.result
			}).then(function(){
				console.log('jQuery bind complete');
			});
		}
		reader.readAsDataURL(this.files[0]);
		$('#uploadimageModal').modal('show');
	});

	$('.crop_image').click(function(event){
		$image_crop.croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function(response){
			$.ajax({
				url:"{{route('upload.image', [Auth::user()->id])}}",
				type: "POST",
				data:{"image": response},
				success:function(data)
				{
					$('#uploadimageModal').modal('hide');
					$('#uploaded_image').html(data);
					location.reload();
				}
			});
		})
	});


</script>