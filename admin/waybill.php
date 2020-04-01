<div id="cont1" class="example">
	<fieldset class="scheduler-border">
		<div class="container">
			<div class="form-row">
				<div class="col-12"><b>WAYBILL</b></div>
				<p id="para"></p>
			</div>
			<form action="../scripts/gen_waybill.php" method="POST">
				<div class="form-row">
					<div class="col">
						<div class="form-row" style="margin-top: 5px;">
							<div class="col-12">
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text">M&nbsp;</span></div><input class="form-control" type="text" name="name">
								</div>
							</div>
							<div class="col-12" style="margin-top: 5px;">
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text">Reference</span></div><input class="form-control" type="text" name="address">
								</div>
							</div>
							<div class="col-12" style="margin-top: 5px;">
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text">Driver's Name</span></div><input class="form-control" type="text" name="dname">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4" style="margin-top: 5px;">
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text">Date</span></div><input class="form-control" type="date" name="date">
						</div>
						<div class="input-group" style="margin-top: 5px;">
							<div class="input-group-prepend"><span class="input-group-text">Vehicle Number</span></div><input class="form-control" type="text" name="vnum">
						</div>
					</div>
				</div>
				<div class="form-row" style="margin-top: 5px;">
					<div class="col-12">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>DESCRIPTION OF GOODS</th>
										<th>QTY</th>
										<th>REMARKS</th>
									</tr>
								</thead>
								<tbody id="tbdy" class="">
									<tr id="tr" class="package-row">
										<td><input type="text" placeholder="description" name="dsc[]" class="form-control form-control-plaintext description"></td>
										<td><input type="text" placeholder="quantity" name="qty[]" class="form-control form-control-plaintext quantity" onkeyup="getSum()"></td>
										<td><select type="text" placeholder="remark" name="rem[]" class="form-control form-control-plaintext remark">
												<option></option>
												<option name="intact">INTACT</option>
												<option name="tampered">TAMPERED</option>
											</select></td>
									</tr>
								</tbody>
								<tfoot>
									<td>
										<button onclick="return nrow()" type="button" class="btn"><i class="fas fa-plus"></i></button>
										<button onclick="return myFunction1()" type="button" class="btn"><i class="fas fa-minus"></i></button>
									</td>
									<td><input id="total" type="text" placeholder="Total" name="total" class="form-control form-control-plaintext amount" readonly></td>
									<td></td>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				<div class="form-row" style="margin-top: 5px;">
					<div class="col">
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text">Amount in Words</span></div><input id="words" class="form-control" type="text" name="words" readonly>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6" style="margin-top: 5px;">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Customer's Sign</span>
							</div>
							<input class="form-control" type="text" name="csign" readonly="">
						</div>
					</div>
					<div class="col-md-6" style="margin-top: 5px;">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">ITTJWIMS Sign</span>
							</div>
							<input class="form-control" type="text" name="isign" readonly="">
						</div>
					</div>

				</div>
				<div class="form-row" style="margin-top: 5px;">
					<div class="col">
						<button type="submit" class="btn btn-primary" name="gen_wbl" onclick="getSum()" style="float: right">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</fieldset>
</div>