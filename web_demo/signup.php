
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Modal Header</h4>
			</div>
			<div class="alert alert-danger" style="display:none;" id="div-error">
				
			</div>
			<div class="modal-body">
				<form id="form_signup" method="post">
					Tên
					<input class="style-input" type="text" name="name">
					<br>
					Email
					<input class="style-input" type="text" name="email">
					<br>
					Số điện thoại
					<input class="style-input" type="text" name="phone_customer">
					<br>
					Địa chỉ
					<input class="style-input" type="text" name="address_customer">
					<br>
					Mật khẩu
					<input class="style-input" type="password" name="password">
					<br>
					<button>submit</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#form_signup").submit(function(event) {
			event.preventDefault();
			$.ajax({
				url: 'process_signup.php',
				type: 'POST',
				dataType: 'html',
				data: $(this).serializeArray(),
			})
			.done(function(responsive) {
				if(responsive !== "1"){
					$("#div-error").text(responsive);
					$("#div-error").show();
				
				}else{
					
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
			/* Act on the event */
		});
	});
</script>