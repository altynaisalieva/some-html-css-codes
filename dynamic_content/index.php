<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <title>Dynamic content</title>
    <style type="text/css">
        p{
             margin: 0;
         }
       .error{
            color: red;
        }
        p.head{
            font-weight: 700;
            margin-top: 10px;
        }
        label{
            width: 5em;
            float: left;
        }
    </style>

</head>
<body>
    <?php 
         $fname = isset($_POST["fname"]) ? $_POST["fname"]  : "";
         $lname = isset($_POST["lname"]) ? $_POST["lname"]  : "";
         $email = isset($_POST["email"]) ? $_POST["email"]  : "";
         $phone = isset($_POST["phone"]) ? $_POST["phone"]  : "";
         $country = isset($_POST["country"]) ? $_POST["country"]  : "";
         $os = isset($_POST["os"]) ? $_POST["os"]  : "";

         $iserror = false;
         $formerrors = array( "fnameerror" => false, "lnameerror" => false, "emailerror" => false, 
                             "phoneerror" => false);

        $countrylist = array("Bangladesh", "Turkey", "Indonesia","Japan",
                              "Ukraine");
                              

        $systemlist = array("JavaScript", "Swift", "Python",  "Ruby","Other");
        $inputlist = array("fname" =>"First Name", "lname"=>"Last Name", "email" =>"Email", "phone" => "Phone");
        
        
        if(isset($_POST["submit"]))
        {
           

            if($fname == "")
            {
                $formerrors["fnameerror"] = true;
                $iserror = true;
            }

            if($lname == "")
            {
                $formerrors["lnameerror"] = true;
                $iserror = true;
            }

            if($email == "")
            {
                $formerrors["emailerror"] = true;
                $iserror = true;
            }

            if(!preg_match("/^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/", $phone))
            {
                $formerrors["phoneerror"] = true;
                $iserror = true;
            }

            if(!$iserror)
            {
                $query = "Insert Into contacts" . 
                 "(LastName, FirstName, Email, Phone, Country, OS)". 
                 "VALUES ('$lname', '$fname', '$email'," . 
                  "'". mysql_real_escape_string($phone). 
                  "', '$country', '$os')";
            

            if(!($database = mysql_connect ("localhost", "iw3htp", "password")))
               die("<p>Could not connect to database </p>");
            
            if(!mysql_select_db("MailingList", $database))
               die("<p>Could not open MailinggList database</p>");
            
            if (!($result = mysql_query($query, $database)))
            {
                print ("<p> Could not execute query </p>" );
                    die(mysql_error());
            }   
           
             msql_close($database);  
             print("<p> Hi $fname. Thank you for completing the survey. 
                        You have been added to the $book mailing list. </p>
                        <p class='head'> The following information has been saved in our database:</p> 
                         <p> Name: $fname $lname</p>
                         <p> Email: $email</p>
                         <p> Phone: $phone</p>
                         <p> OS: $os</p>
                         <p> <a href='formDatabase.php'> Click here to view entire database.</a> </p>
                         <p class='head'> This is only a sample form.
                                         You have not been added to a mailing list </p>
                        </body></html>");

             die();
        }
    }


    print("<h1> Sample Registration Form</h1>
           <p> Please fill in all fields and click Register.</p>");

    if ($iserror)
    {
        print("<p class='error'> Fields with * need to be filled in properly. </p>");
    }      
    
    print("<form method = 'post' action = 'dynamicForm.php'>
           <h2>  </h2>");

    
    foreach($inputlist as $inputname => $inputalt)     
    {
        print(" <div><label>$inputalt:</label><input type='text' name ='$inputname' value='" . $$inputname . "'>");
        if ($formerrors[($inputname) . "error"] == true)
             print("<span class= 'error'>*</span>");
        print("</div>");        
    }   

    if($formerrors["phoneerror"])
       print("<p class='error'> Must be in the form (555) 888-8888");
    
    print("<h2> </h2>
           <p> Choose your country:</p>
        <select name ='country'>");
    foreach($countrylist as $currcountry)
    {
        print("<option" .
                ($currcountry == $country ? "selected>" : ">") . 
                 $currcountry . "</option>");
    }
   
    

    print("</select>
          <h2></h2>
           <p> What programming languages do you know?? </p>");
    $counter = 0;
    
    foreach($systemlist as $currsystem)
    {
        print("<input type = 'radio' name = 'os' value = '$currsystem' ");
        if((!$os && $counter == 0) || ($currsystem == $os) )
            print("checked");

        print(">$currsystem");
        ++$counter;    
    }

    print("<!--create a submit button--> 
            <p class = 'head'><input type = 'submit' name = 'submit' value = 'Register'>
            </p></form></body></html>");
?>