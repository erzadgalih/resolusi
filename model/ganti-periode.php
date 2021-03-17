<!-- /.box-body -->
<div class="row">
	<div class="col-xs-12">
		<div class="box box-default">
			<form method="POST">
				<div class="box-header with-border">
					<div class="col-xs-12">
						<h3 class="box-title">
							Ganti Password
						</h3>
						<button href="" type="submit" name="ganti_per" class="pull-right btn btn-danger" ><i class="fa fa-check-square"></i>
							Simpan
						</button>
					</div>
				</div>
				<div class="box-body table-responsive">
					<table id="example10" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<td>Periode</td>
								<td>:</td>
								<td><input type="text" name="periode" class="form-control pull-right" value="<?php echo $_SESSION['periode']; ?>" >
								</td>
							</tr>
						</thead>

					</table>
			</form>
		</div>
	</div>
</div>
<!-- /.box-body -->

<?php
if(isset($_POST["ganti_per"])) {
	// $username				= $_SESSION['username'];
	$_SESSION['periode'] = $_POST['periode'];
	header('Location: ' . $_SERVER['HTTP_REFERER']);

}
?>