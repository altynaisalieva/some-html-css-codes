<!DOCTYPE html>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Registration Form</title>
        <style type = "text/css">
            p       {margin: 0px;}
            .error  {color: red}
            p.head  {font-weight: bold; margin-top:10px;}
            label   {width: 5em; float: left;}
        </style>
    <body>
        <?php
        $fname = isset($_POST["fname"]) ? $_POST["fname"] : "";
        $lname = isset($_POST["lname"]) ? $_POST["lname"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
        $book = isset($_POST["book"]) ? $_POST["book"] : "";
        $os = isset($_POST["os"]) ? $_POST["os"] : "";
        $iserror = false;
        $formerrors = array("fnameerror" => false, "lnameerror" => false,
                "emailerror" =>false, "phoneerror" => false);
        $booklist = array("Internet and WWW How to Program",
            "Visual Basic How to Program");
        $systemlist = array("Windows", "Mac OS X", "Linux", "Other");
        $inputlist = array("fname" => "First Name", 
            "lname" => "Last Name", "email" => "Email",
            "phone" => "Phone" );
        if ( isset($_POST["submit"]))
        {
            if($fname == "")
            {
                $formerrors["fnameerror"] = true;
                $iserror = true;
            }


            if($lname == "")
            {
                $formerrors["lnameerror"] = true;
                $iserror=true;
            }
            if($email == "")
            {
                $formerrors["emailerror"] = true;
                $iserror=true;
            }
            if(!preg_match("/^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/" ,
                $phone ) )
            {
                $formerrors["phoneerror"] = true;
                $iserror = true;
            }
            if(!$iserror)
            {
                    $query = "INSERT INTO contacts" .
                        "(LastName, FirstName, Email, Phone, Book, OS)" .
                        "VALUES ('$lname', '$fname','$email', " .
                        "'". mysql_real_escape_string( $phone) .
                        "','$book', '$os')";
            
            
                if(!($database=mysql_connect("localhost",
                    "iw3htp", "password" ) ) )
                    die("<p>Could not open MailingList database</p>");
                if(!($resul=mysql_query($query,$database ) ) )
                {
                    print("<p>Could not execute query!</p>");
                    die( mysql_error());
                }

                mysql_close($database);
                print( "<p>Hi $fname. Thank you for completing the survey.
                    You have been added to the $book mailing list.</p>
                    <p class= 'head'>The following information has been
                    saved in our database:</p>
                    <p>Name: $fname $lname</p>
                    <p>Email: $email</p>
                    <p>Phone: $phone </p>
                    <p>OS: $os</p>
                    <p><a href = 'formDatabase.php'>Click here to view
                        entire database.</a></p>
                    <p class='head'>Thşs şs only a sample form.
                        You have not been added to a mailing list.</p>
                    </body></html>");
            }    die();
        }
        print("<hl>Sample Registration Form</hl>
            <p>Please fill in all fields and click Register.</p>");
        if($iserror)
        {
            print("<p class = 'error'>Fields with * need to be filled
                in properly.</p>");
        }
        print("<!--post form data to dynamicForm.php -->
            <form method = 'post' action='dynamicForm.php'
            <h2>User Information</h2>
            
            <!-- create four text boxes for user input -->");
        foreach($inputlist as $inputname =>$inputalt)
        {
            print( "<div><label>$inputalt:</label><input type = 'text'
                name='$inputname' value = '" . $$inputname . "'>");
            if($formerrors[($inputname)."error"]==true)
                print("<span class = 'error'>*</span>");
            print("</div>");
        }
        if($formerrors["phoneerror"])
            print(<p class = 'error'>Must be in the form
            (555)555-5555);
        print("<h2>Publications</h2>
            <p>Which book would you like information about?</p>
            <!-- create drop-down list containing book names -->
            <select name='book'>");
        foreach($booklist as $currbook)
        {
            print("option".
                ($currbook==$book?"selected>":">"). 
                $currbook. "</option>");
        }
        print("</select>
            <h2>Operating System</h2>
            <p>Which operating system do you use?</p>
            
            !--create five radio buttons -->");
        $counter=0;
        foreach($systemlist as $currsystem)
        {
            print("<input type='radio' name='os'
                value='$currsystem' ");
            if((!$os && $counter ==0)||($currsystem==$os ) )
                print("checked");
            print(">$currsystem");
            ++$counter
        }
        print("<!-- create a submit button -->
            <p class = 'head'><input type='submit' name='submit'
            value='Register'></p></form></body></html>");   

    ?>