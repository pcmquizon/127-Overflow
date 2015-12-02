	<!-- modal on top of page-->
	<div class="modal fade" id="signInModal" role="dialog" data-toggle="modal" data-backdrop="static">
		<div class="modal-dialog modal-sm" role="document" data-backdrop="false" data-toggle="modal">
			<div class="modal-content">
					@include('auth.signin')
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- modal on top of page-->
	<div class="modal fade" id="signUpModal" role="dialog" data-toggle="modal" data-backdrop="static">
		<div class="modal-dialog modal-sm" role="document" data-backdrop="false" data-toggle="modal">
			<div class="modal-content">
					@include('auth.signup')
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<script>
		function nie(){
			$("#signUpModal").modal('hide');
		}
		function pot(){
			$("#signInModal").modal('hide');
		}
	</script>