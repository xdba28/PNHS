<html>

<body>

<form action="test_excel.php" method="post" enctype="multipart/form-data">
		Select excel file to upload:
		<br>
		<select name="action" id="action">
		<option value="add">Add Student</option>
		<option value="transfer_in">Transfer In</option>
		</select>
		<br>
		<select name="section" id="section">
		<option value="Benevolent">Benevolent</option>
		</select>
		<br>
		<input type="file" name="excel_file" id="excel_file"><br><br>
		<input type="submit" value="upload" name="submit">
</form>

</body>

</html>