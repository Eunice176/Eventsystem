<html>
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
      <title>Event website</title>  
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

      <link rel="stylesheet" type="text/css"href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
      <style>
        body {

            margin: 0;
            padding: 0;
        }
        #slider-container {
            width: 80%;
            padding: 0%;
            height:30%;
            margin: auto;
            overflow: hidden;
        }

        #slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            box-sizing: border-box;
        }

        .image {
            width: 100%;
            height: auto;
        }

        .btn {
           position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            cursor: pointer;
        }

        #prevBtn {
         margin-top: 30%;
            left: 10px;
        }

        #nextBtn {
          margin-top: 30%;
            right: 10px;
        }
        .display{
          margin-bottom: 10px;
        }
       
        *{
    padding: 0%;
    margin: 0%;
}

nav {
    width: 100%;
    background-color: purple;
    overflow: hidden;
}

nav a {
    float: left;
    /*display: block;*/
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

nav a:hover {
    background-color: #ddd;
    color: black;
}
nav ul li{
  text-decoration-line: none;
}
body{
    min-height: 100vh;
  display: flex;
  flex-direction: column;
}
/*.bcimage {
    background-image: url("C:\Users\njoki\OneDrive\Desktop\eventproject\images (2).jpg");
    background-repeat: no-repeat;
    background-size: contain;
    height:100vh;
}*/
.bcimage img{
    float: left;
    position: left;
}
footer{
margin-bottom: 30px;
position: bottom;
bottom: 0;
height: 20px;
}
.grid-container{
    display: grid;
    grid-template-columns: repeat(2, 600px);
    justify-content: start;
    row-gap:20px;
    max-width: 1000px;
    margin:3% ;
}
.bcimage{
    padding-left: 0px;
    margin: 0px;
    left: 0;
}
.info h1{
    float: left;
    color: purple;
}
button{
    padding: 10px;
    border-radius:10px ;
    background-color:purple;
    color: white;
    font-weight: bold;
    font-size: 16px;
    
}
.row{
    display: flex;
    flex-wrap: wrap;
}
 footer ul{
    list-style: none;
 }
 .foot{
    background-color: purple;
    padding: 70px 0;
 }
 .footer-col{
    width: 25%;
    padding: 0 15px;

 }
.footer-col h4{
    font-size: 18px;
    color: #f2f2f2;
    text-transform: capitalize;
    margin-bottom: 30px;
    font-weight: 500;
    position: relative;
}
.footer-col h4::before{
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    background-color: black;
    height: 2px;
    box-sizing: border-box;
    width:50px;
}
.footer-col ul li:not(:last-child){
    margin-bottom:10px;
}
.footer-col ul li a {
    font-size: 16px;
    text-transform: capitalize;
    color: white;
     text-decoration: none;
     font-weight: 300;
     display: block;
     transform: all 0.3s ease;
}
.footer-col ul li a:hover{
    color: #ffffff;
    padding-left: 8px;

}
.footer-col .social-links a{
    display:inline-block;
    height: 40px;
    width: 40px;
   background-color: rgba(255,255,255,0.2);
    margin-right:10px;
    margin:0 10px 10px 0;
    text-align: center;
    line-height: 40px;
    border-radius: 50%;
    color: white;
    transition: all 0.5s ease;
    padding-top: 10px;

}
.footer-col .social-links a:hover{
    color:#24262b;
    background-color: #ffffff;
}
@media(max-width: 574px) {
    .footer-col{
    width: 50%;
    margin-bottom: 30px;
}}
button a{
    text-decoration:none;
    color: white;
}
      </style>
      <script>
        document.getElementsById("loginButton").addEventListenem6r("click", function() {
        // Redirect to the login page
        window.location.href = "login.html";
        });
      </script> 
    </head>
    <body>
        <nav>
            <a><img src="event2.PNG" height="40px" width="60px"></a>
             <a href="index.php">HOME</a> 
                <a href="about.html">ABOUT</a>
                <a href="contactus.html">CONTACT US</a>
                <a href="eventpage.php">EVENT PAGE</a>
                <a href="create.php">CREATE EVENT</a>
                <!--<a href="reminder.html">REMINDER</a>-->
                
                
                
        </nav>
        <div class="grid-container">
            <div class="bcimage">
          <img src="imagesanime-removebg-preview.png" height="400px" width="400px"/>
        </div>
          <div class="info">
              <h1>WELCOME TO OUR EVENT SYSTEM</h1>
              <p>
              🎉 Welcome to <b>EVENTEXPO</b> – Your Portal to Unforgettable Events! Discover, Experience, and Connect with Premier Events Near You! 🌟 Prepared for an exhilarating journey of entertainment? EVENTEXPO is your ultimate destination for discovering thrilling and memorable events in your city.
🎊 Whether you're a music enthusiast, foodie, art lover, or explorer, we have something special for everyone. Our thoughtfully curated events guarantee a tailored experience for your interests.

Why Choose EVENTEXPO?

✨ **Comprehensive Listings:** Explore a range of events, from concerts to workshops – we've got it all!

📍 **Local and Global:** Dive into events in your neighborhood or broaden your horizons globally.

Ready to Elevate Your Event Experience? Start exploring now, and let the adventure unfold! 🚀 Your next remarkable experience is just a click away.
✨ 
              </p>
              <h4><i>login if you have  an acount and and a sign up if you have no account</i> </h4><br><br>
              <button class="buttonlog" id="loginButton" href="login.html"><a href="login.php">login</a></button>
              <button><a href="signup.html">Sign up</a></button>
              <!--<button><a href="regadmin.html">admin</a></button>-->
            </div>
        
        </div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ul>

        <!-- Slides -->
        <div class="carousel-inner">
            
            <div class="carousel-item">
                <img src="display2.jpg" class="d-block w-100" alt="Camera">
            </div>
            <div class="carousel-item active">
                <img src="party1.jpg" class="d-block w-100" alt="Wild Landscape">
            </div>
            <div class="carousel-item">
                <img src="displayi.jpg" class="d-block w-100" alt="Exotic Fruits">
            </div>
            <div class="carousel-item">
                <img src="display4.jpg" class="d-block w-100" alt="Exotic Fruits">
            </div>
            <div class="carousel-item">
                <img src="display5.jpg" class="d-block w-100" alt="Exotic Fruits">
            </div>
        </div>

        <!-- Controls -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


        
  </div>
<div class="cards">
<div class="card"></div>
<div class="card"></div>
<div class="card"></div>
</div>
    <footer>
       <div class="foot">
        <div class="cont">
            <div class="row">
                <div class="footer-col">
               <h4>Company</h4>
               <ul>
                <li><a href="#">about us</a></li>
                <li><a href="#">service</a></li>
                <li><a href="#">privacy policy</a></li>
                <li><a href="#">affliate program</a></li>
               </ul>
                </div>
                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                     <li><a href="#">FAQ</a></li>
                     <li><a href="#">events</a></li>
                     <li><a href="#">payment options</a></li>
                     <li><a href="#">booking status</a></li>

                    </ul>
                     </div>
                     <div class="footer-col">
                        <h4>follow us</h4>
                        <div class="social-links">
                         <a href="#"><i class="fab fa-facebook-f"></i></a>
                         <a href="#"><i class="fab fa-twitter"></i></a>
                         <a href="#"><i class="fab fa-instagram"></i></a>
                         <a href="#"><i class="fab fa-linkedin-in"></i></a>
                         </div>
            </div>
            </div>
        </div>
    </div>
    </footer>
    <script>
      
      let currentSlide = 0;
  
      function showSlide(index) {
          const slider = document.getElementById('slider');
          const slides = document.getElementsByClassName('slide');
  
          if (index >= slides.length) {
              currentSlide = 0;
          } else if (index < 0) {
              currentSlide = slides.length - 1;
          } else {
              currentSlide = index;
          }
  
          const translateValue = -currentSlide * 100 + '%';
          slider.style.transform = 'translateX(' + translateValue + ')';
      }
  
      function prevSlide() {
          showSlide(currentSlide - 1);
      }
  
      function nextSlide() {
          showSlide(currentSlide + 1);
      }
  
      // Auto play the slider (optional)
      // setInterval(() => {
       //  nextSlide();
      // }, 3000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
</html>