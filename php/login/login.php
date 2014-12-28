<?php

?>
<style>
	table td{
		text-align: center;
	}
</style>
<div style="height:100%;width:100%;">
	<form action="index.php" method="post">
		<table style="margin-left:35%;">
			<tr>
				<td colspan="2">
					<h1 style="margin:0px;padding:0px;">Login</h1>
				</td>
			</tr>
			<tr>
			<td colspan="2">
				&nbsp;
			</td>
			</tr>
			<tr>
				<td>
					Benutzername:
				</td>
				<td>
					<input type="text" name="txtUser" required/>
				</td>
			</tr>
			<tr>
				<td>
					Passwort:
				</td>
				<td>
					<input type="password" name="txtPass" required/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					&nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Einloggen"/>
				</td>
			</tr>
		</table>
	</form>
</div>