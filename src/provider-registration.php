<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"
        />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="icon" href="./img/icon.png" />
        <title>Basic - Bootstrap 4 with Gulp 4</title>
    </head>
    
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top"> <a class="navbar-brand" href="index.html">Home</a>
                <button class="navbar-toggler"
                type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto justify-content-end">
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a>

                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a>

                        </li>
                        <li class="nav-item"><a class="nav-link" href="index.html#register">Register</a>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <main role="main" class="container mt-5">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                     <h1 class="display-4 text-center">Become a Mentor Today!</h1>
                    <p class="lead text-center">Please fill out this application as honestly as possible to continue</p>
                </div>
            </div>
            <div class="card p-3 ">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"> <span class="input-group-text">First and last name</span>
                        </div>
                        <input type="text" aria-label="First name" class="form-control" placeholder="First Name"
                        name="fname" required>

                <input type="text " aria-label="Last name " class="form-control
                        " placeholder="Last Name " name="lname" required>

            </div>



            <div class="input-group mb-3 ">

                <div class="input-group-prepend ">

                    <span class="input-group-text ">Email and Phone Number</span>

                </div>

                <input type="text " aria-label="Email " class="form-control
                        " placeholder="Email " name="email" required>

                <input type="text " aria-label="Phone " class="form-control
                        " placeholder="Phone " name="phone" required>

            </div>



            <div class="input-group mb-3 ">

                <div class="input-group-prepend ">

                    <span class="input-group-text ">Password</span>

                </div>

                <input type="text " aria-label="Password " class="form-control
                        " name="password" id="password" placeholder="Password " onchange="check_pass()" required>

            </div>



            <div class="input-group mb-3 ">

                <div class="input-group-prepend ">

                    <span class="input-group-text ">Confirm Password</span>

                </div>

                <input type="text " aria-label="cfPassword " class="form-control
                        " name="cfpassword" id="cfpassword" placeholder="Confirm Password" onchange="check_pass()" required>

            </div>



            <div class="input-group mb-3 ">

                <div class="input-group-prepend ">

                    <span class="input-group-text ">College</span>

                </div>

                <input type="text " aria-label="College " class="form-control
                        " placeholder="College " name="college" required>

                <div class="input-group-prepend ">

                    <span class="input-group-text ">Major</span>

                </div>

                <input type="text " aria-label="Major " class="form-control
                        " placeholder="Major " name="major" required>

                


            </div>



                <p>need to add a terms of service later on</p>



            <input type="submit" class="btn btn-primary" id="submit">

        </form>

    </div>
<script>
    
    function check_pass() {

    if (document.getElementById('password').value ==
            document.getElementById('cfpassword').value) {
        document.getElementById('submit').disabled = false;
		        document.getElementById('submit').value="Submit";
    } else {
        document.getElementById('submit').disabled = true;
        document.getElementById('submit').value="Passwords do not match!";
		
    }
    if (document.getElementById('password').value.length<8){
        document.getElementById('submit').disabled = true;
        document.getElementById('submit').value="Make sure password has >=8 characters!";
    }
}
</script>
	
<div style="height:1200px;width:1200px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
<?php
echo "This is just for testing purposes. Will redirect to login page once it is ready lol";
$db = new SQLite3('Users_Mentor.db') or die('Unable to open database');

if(!empty($_POST)){
    
       $query = <<<EOD
     CREATE TABLE IF NOT EXISTS profile_mentor(id integer PRIMARY KEY, first text, last text, email text, password text, phone text, college text, major text);

EOD;
 $db->exec($query) or die("Unable to create table");

if (isset($_POST['fname'])){
        //INPUTTING
        $first=$_POST['fname'];
        $last=$_POST['lname'];
        $email=$_POST['email'];
		$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
		$phone=$_POST['phone'];
		$college=$_POST['college'];
        $major=$_POST['major'];
        
        $query="insert into profile_mentor(first, last, email, password, phone, college, major) values('$first', '$last', '$email', '$password','$phone', '$college', '$major');";
        $db->exec($query) or die("Unable to create entry");
        echo "INputted";
        $result = $db->query('SELECT * FROM profile_mentor') or die('Query failed');
        
        while ($row = $result->fetchArray())
{
    //irst,last,college,major,interests,athlete,price_base,special_price,about_me_small,about_me_big,achievements,service_skills,review_num,review_text
echo nl2br("------------------------------------------------------------------ \n");
  echo nl2br($row['first'] . "\n");
  echo nl2br($row['last'] . "\n");
  echo nl2br($row['email'] . "\n");
  echo nl2br($row['password'] . "\n");
  echo nl2br($row['phone'] . "\n");
  echo nl2br($row['college'] . "\n");
  echo nl2br($row['major'] . "\n");

}
    
//   $text=$_POST['message']; 

}
}else{
    echo "here";
$result = $db->query('SELECT * FROM profile_mentor') or die('Query failed');
        
        while ($row = $result->fetchArray())
{
    //irst,last,college,major,interests,athlete,price_base,special_price,about_me_small,about_me_big,achievements,service_skills,review_num,review_text
echo nl2br("------------------------------------------------------------------ \n");
  echo nl2br($row['first'] . "\n");
  echo nl2br($row['last'] . "\n");
  echo nl2br($row['email'] . "\n");
  echo nl2br($row['password'] . "\n");
  echo nl2br($row['phone'] . "\n");
  echo nl2br($row['college'] . "\n");
  echo nl2br($row['major'] . "\n");

}
}



?>
</div>
</main><!-- /.container -->



<footer class="footer container text-center mt-5 ">
    <p>&copy; CTC</p>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js
                        " integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n "
crossorigin="anonymous "></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js "
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo "
crossorigin="anonymous "></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js "
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 "
crossorigin="anonymous "></script>
<script src="js/all.js "></script>
</body>

</html>
