
<div class="col-sm-10 maincontent user-setting">
	<div class="page-title">
		Add New User
	</div>
	<table>
		<tr>
			<td>Username (Required)</td>
			<td><input type="text" name="username" required></td>
		</tr>
		<tr>
			<td>Email (Required)</td>
			<td><input type="email" name="email" required></td>
		</tr>
		<tr>
			<td>Name (Required)</td>
			<td><input type="name" name="name" required></td>
		</tr>
		<tr>
			<td>Password (Required)</td>
			<td><input type="Password" name="Password" required></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="Address" required></td>
		</tr>
		<tr>
			<td>Role</td>
			<td><select class="role-control" id="role-control">
				<option>Customer</option>
				<option>Shipper</option>
				<option>Administrator</option>
			</select></td>
		</tr>
	</table>
	<button type="button" class="btn btn-primary">Create User</button>
</div>