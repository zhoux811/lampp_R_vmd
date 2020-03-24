<head>
	<title>PHP test</title>
</head>

<body>

	<form action="upload.php" method="POST" enctype="multipart/form-data">
		Select pdb file to upload:
		<input type="file" name="pdbfileToUpload" id="pdbfileToUpload" required="required">
		<br>
		Select 1st contact file to upload:
		<input type="file" name="contactfile1ToUpload" id="contactfile1ToUpload" required="required">
		<br>
		Select 2nd contact file to upload:
		<input type="file" name="contactfile2ToUpload" id="contactfile2ToUpload" required="required">
		<br>
		<input type="submit" value="Upload all" name="submit">
	</form>

</body>

</html>