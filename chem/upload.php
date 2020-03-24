<body>
    <a href="/chem_vis/index.php">back</a>
    <br><br>

<?php

    $target_dir = "uploads/";
    $pdb_file_basename = basename($_FILES["pdbfileToUpload"]["name"]);
    $pdb_file_location = $target_dir . basename($_FILES["pdbfileToUpload"]["name"]);

    $contact1_file_basename =  basename($_FILES["contactfile1ToUpload"]["name"]);
    $contact1_file_location = $target_dir . basename($_FILES["contactfile1ToUpload"]["name"]);

    $contact2_file_basename =  basename($_FILES["contactfile2ToUpload"]["name"]);
    $contact2_file_location = $target_dir . basename($_FILES["contactfile2ToUpload"]["name"]);
    
    $uploadOk = 1;

//if_pdb file validation
/*
    $pdbFileType = strtolower(pathinfo($pdb_file_location, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) 
    {
        // Allow certain file formats
        if ($pdbFileType != "pdb") 
        {
            echo "<br>You are uploading a file that is not pdb.
            what are you trying to do????????????????<br>";
            $uploadOk = 0;
        } else 
        {
            echo "<br>ok, i see pdb extension...well<br>";
            $uploadOk = 1;
        }
    }
*/

// Check if file already exists
/*
    if (file_exists($pdb_file) ||
        file_exists($contact1_file) ||
        file_exists($contact2_file) 
        ) 
    {
        echo "<br>Sorry, file already exists.<br>";
        $uploadOk = 0;
    }
*/

/*
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
*/


    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) 
    {
        echo "<br>So, your file was not uploaded.<br>";
        // if everything is ok, try to upload file
    } 
    else 
    {
        if(
            move_uploaded_file($_FILES["pdbfileToUpload"]["tmp_name"], $pdb_file_location) &&
            move_uploaded_file($_FILES["contactfile1ToUpload"]["tmp_name"], $contact1_file_location) &&
            move_uploaded_file($_FILES["contactfile2ToUpload"]["tmp_name"], $contact2_file_location)  
        ) 
        {
            echo "<br>The file <br><br>" . 
                    basename($_FILES["pdbfileToUpload"]["name"]) ."<br>" .
                    basename($_FILES["contactfile1ToUpload"]["name"]) ."<br>" .
                    basename($_FILES["contactfile2ToUpload"]["name"]) ."<br>" .
                    "<br>have been uploaded.<br>";
        } 
        else 
        {
            echo "<br>Sorry, there was an error uploading your file.<br>";
        }
    }

?>

    <br><br>

    <form action="showx3d.php" method="get">
        Let's compute:
        <input type="hidden" name="pdbFileName" value="<?php echo $pdb_file_basename; ?>">
        <input type="hidden" name="contact1FileName" value="<?php echo $contact1_file_basename; ?>">
        <input type="hidden" name="contact2FileName" value="<?php echo $contact2_file_basename; ?>">
        <input type="submit" value="COMPUTATION" name="submit">
    </form>

</body>