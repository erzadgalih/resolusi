<!-- CEO -->

<div class="row">
	<div class="col-xs-12">
		<div class="box box-default">

			<div class="box-header with-border">
				<div class="col-xs-12">
					<h3 class="box-title">
						LIST MASTER SUPPLIER
					</h3>
				</div>
			</div>
			<div class="box-body table-responsive">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Pencarian..." id="keyword">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="button" id="btn-search">Cari</button>
								<a href="" class="btn btn-warning">Reset</a>
							</span>
						</div>
					</div>
				</div>
				<div id="view"><?php include "sup-view.php"; ?></div>
			</div>

	</div>
</div>

<script src="/rzcell/model/form/ssup/sup.js"></script>