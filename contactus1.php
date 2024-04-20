<html>
    <head>
      <title>Event website</title>  
      <link rel="stylesheet" href="contact.css">
    </head>
    <body>
        <nav>

            <a href="index.php">HOME</a>  
            <a href="about.html">ABOUT</a>
            <a href="contactus1.php">CONTACT US</a>
            <!--<a href="signup.php">Sign up</a>
            <a href="login.html"> LOGIN</a>-->
            <a href="eventpage.php">EVENT PAGE</a>
            <a href="create.php">CREATE EVENT</a>
            
    </nav>
        <div class="container">
            
            <div class="info">
            <form action="contactusprocessing.php" method="POST" enctype="multipart/form-data">
                    
                    <h3>GET IN TOUCH</h3>
                    <hr>
                   <?php
                    $message="";
                    if(isset($_GET['error']))
                    {
                        $message='please fill in the blanks';
                        echo'<div class="alert danger">'.$message.'</div>';
                    }
                    if(isset($_GET['success']))
                    {
                        $message='message sent';
                        echo'<div class="alert danger">'.$message.'</div>';
                    }
                 
                    ?>
                    <!--<input type="hidden" name="access_key" value="523d1921-8ca1-4b93-8a58-439259aca299">-->    
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required><br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br>
                     <label for="message">phoneNO:</label>
                    <input type="text" id="phone" name="phone"  required><br>
                    <label for="message">message</label>
                    <textarea id="message" rows="4" placeholder="how can we help you?"> </textarea><br>
            
                    <button type="submit" value="Submit">  send</button>
                </form>
            </div>
            <div class="image">
                <img src="contact-removebg-preview.png" height="30%"/>
                 </div>
        </div>
        
        <div class="alert danger"></div>

        </div>
          
                       
     
    </body>
</html>