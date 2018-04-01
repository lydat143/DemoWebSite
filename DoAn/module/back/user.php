
			<div class="col-sm-10 maincontent">
				<div class="page-title">
					User (3) <button type="button" class="btn btn-default">Add New</button>
				</div>
				<div class="product-action">
					<select class="bulk-control" id="bulk-control">
						<option>Bulk Actions</option>
						<option>Move To Trash</option>
						<option>Set to not publish</option>
						<option>Set to publish</option>
					</select>
					<button type="button" class="btn btn-default">Apply</button>
					<select class="category-control" id="category-control">
						<option>Change Role To</option>
						<option>Administrator</option>
						<option>Shipper</option>
						<option>Customer</option>
					</select>
					<button type="button" class="btn btn-default">Change</button>
					<select class="role-control" id="role-control">
						<option>Role</option>
						<option>Administrator</option>
						<option>Shipper</option>
						<option>Customer</option>
					</select>
					<select class="numbers-control" id="numbers-control">
						<option>Number user</option>
						<option>10</option>
						<option>20</option>
						<option>50</option>
						<option>100</option>
					</select>
					<button type="button" class="btn btn-default">Filter</button>
				</div>
				<div class="page-table">
					<table class="table product-table">
						<thead>
							<tr>
								<th style="width: 4%"><input type="checkbox" onClick="toggle(this)" /></th>
								<th style="width: 4%">ID </th>
								<th style="width: 21%">User name </th>
								<th style="width: 24%">Name </th>
								<th style="width: 24%">Email </th>
								<th style="width: 15%">Role </th>
								<th style="width: 8%">Action </th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox" name="id" value=""></td>
								<td> 1 </td>
								<td>admin</td>
								<td>admin </td>
								<td>admin@hoanglammoc.com</td>
								<td>Administrator</td>
								<td><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a href=""><i class="fa fa-times" aria-hidden="true"></i></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" name="id" value=""></td>
								<td> 2 </td>
								<td>congsida</td>
								<td>Công Sida </td>
								<td>congsida@hoanglammoc.com</td>
								<td>Customer</td>
								<td><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a href=""><i class="fa fa-times" aria-hidden="true"></i></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" name="id" value=""></td>
								<td> 3 </td>
								<td>congsida</td>
								<td>Công Sida </td>
								<td>congsida@hoanglammoc.com</td>
								<td>Shipper</td>
								<td><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a href=""><i class="fa fa-times" aria-hidden="true"></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
	