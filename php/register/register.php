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
					<input type="text" name="txtRegister_Benutzername" required/>
				</td>
			</tr>
			<tr>
				<td>
					Passwort:
				</td>
				<td>
					<input type="password" name="txtRegister_Password" required/>
				</td>
			</tr>
			<tr>
				<td>
					Passwort-Bestätigung:
				</td>
				<td>
					<input type="password" name="txtRegister_Password_Confirmation" required/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					&nbsp;
				</td>
			</tr>
			<tr>
				<td>
					Vorname:
				</td>
				<td>
					<input type="text" name="txtRegister_first_name" required/>
				</td>
			</tr>
			<tr>
				<td>
					Nachname:
				</td>
				<td>
					<input type="text" name="txtRegister_last_name" required/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					&nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Registrieren"/>
				</td>
			</tr>
		</table>
	</form>
</div>