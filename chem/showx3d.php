<?php

if (isset($_GET["submit"])) 
{
    $pdbfilename = $_GET['pdbFileName'];
    $contact1filename = $_GET['contact1FileName'];
    $contact2filename = $_GET['contact2FileName'];

    echo "you uploaded pdb file <br>" .
         "\t &nbsp&nbsp&nbsp" . $pdbfilename . "  and<br>" . 
         "contact files: <br>" .
         "\t &nbsp&nbsp&nbsp" . $contact1filename . "  and<br>" . 
         "\t &nbsp&nbsp&nbsp" . $contact2filename ;

    echo "<br>\n<br>please give the server sometime to render<br>\n<br>";

    print_r(shell_exec("Rscript r_script/run_bar.r"));
    print_r( shell_exec("ls") );
    
    #vmd is like commands 
    $vmd_file_content = file_get_contents("bar.vmd") . "\n";
    $vmd_file_content = preg_replace('/^.+\n/', '', $vmd_file_content);

    $vmd_script_content =
        "mol new bar.pdb \n" .
        "mol modstyle 0 0 Ribbons 0.3 12 2 \n" .

        "axes location Off \n".

        $vmd_file_content.
    
        "color Display Background 8 \n".
        "display projection Orthographic \n".

        "render X3DOM uploads/rendered.x3d" . "\n" .
        "exit" . "\n" ;

    file_put_contents("uploads/vmd_script", $vmd_script_content);

    /*
    $output = shell_exec("ls");
    $output = shell_exec("df -lh");
    $output = shell_exec("vmd --help");
    $output = shell_exec('./opt/lampp/htdocs/chem_vis/uploads/renderrrrr.sh');
    $output = shell_exec("rm uploads/free");
    //$output = shell_exec("vmd -e uploads/vmd_script");
    */
    $output = shell_exec("ls");
    print_r("<pre>$output</pre>") ;

    $output = shell_exec("whoami");
    print_r("<pre>$output</pre>") ;


    $output = shell_exec("./a.out");
//    sleep(10);
    print_r("<pre>$output</pre>") ;
    

//    header( "Location: showx3d.html" );
    
}
else
{
    echo "nothing to show";
}



    //$_3dfilename = "rendered.x3d";
    //echo $_3dfilename;



?>

