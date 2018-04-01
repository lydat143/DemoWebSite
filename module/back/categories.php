
			<div class="col-sm-10 maincontent">
				<div class="page-title">
					Categories (5)
				</div>
				<div class="row">
					<div class="add-cat col-sm-4">
						<h5>Add new category</h5>
						<h6>Name</h6>
						<input type="text" name="product-title" placeholder="Name of product category">
						<h6>Parent</h6>
						<select class="parent-control" id="parent-control">
							<option>None</option>
							<option>Sơn nội thất</option>
							<option>Sơn ngoại thất</option>
							<option>Sơn lót</option>
							<option>Bột trét</option>
						</select>
						<br>
						<button type="button" class="btn btn-primary">Add New Category</button>
					</div>
					<div class=" col-sm-8">
						<div class="category-action">
							<select class="bulk-control" id="bulk-control">
								<option>Bulk Actions</option>
								<option>Delete</option>
							</select>
							<button type="button" class="btn btn-default">Apply</button>
						</div>
						<div class="page-table">
							<table class="table product-table">
								<thead>
									<tr>
										<th><input type="checkbox" onClick="toggle(this)" /></th>
										<th>ID </th>
										<th>Name </th>
										<th>Count </th>
										<th>Option </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><input type="checkbox" name="id" value=""></td>
										<td>1 </td>
										<td>Sơn ngoại thất </td>
										<td>15 </td>
										<td><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
										<a href=""><i class="fa fa-times" aria-hidden="true"></i></a></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="id" value=""></td>
										<td>2 </td>
										<td>Sơn nội thất </td>
										<td>15 </td>
										<td><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
										<a href=""><i class="fa fa-times" aria-hidden="true"></i></a></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="id" value=""></td>
										<td>3 </td>
										<td>Sơn lót </td>
										<td>15 </td>
										<td><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
										<a href=""><i class="fa fa-times" aria-hidden="true"></i></a></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="id" value=""></td>
										<td>4 </td>
										<td>Bột trét </td>
										<td>15 </td>
										<td><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
										<a href=""><i class="fa fa-times" aria-hidden="true"></i></a></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="id" value=""></td>
										<td>5 </td>
										<td>Chống thấm </td>
										<td>15 </td>
										<td><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
										<a href=""><i class="fa fa-times" aria-hidden="true"></i></a></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>