		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © <?= date('Y') ?>. All right reserved.</p>
		</footer>



		<form method="post">
										<div class="modal fade" id="searchuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Search User</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
													
															<label>User ID </label>
															<input type="text" name="fid" class="form-control" placeholder="User ID or Username">
													
													</div>
													<div class="modal-footer">
														<a href="" class="btn btn-secondary">Reset</a>
														<button type="submit" class="btn btn-primary" name="SearchUser">Search User</button>
													</div>
												</div>
											</div>
										</div>
										</form>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>