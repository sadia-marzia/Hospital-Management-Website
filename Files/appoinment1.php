<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="appoinment.css">
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Welcome to our service</title>
      </head>
      <body>
    
      <header class="header">
        <h1 class="logo"><img src="pics/logo.png" alt="Hospital logo"><p>MedCare Hospital</p></h1>
        <nav class="bar">
            <a href="home.html">Home</a>
            <a href="aboutus.html">About Us</a>
            <a href="doctor.html">Doctors</a>
            <div class="dropdown">
                <button class="dropbtn"><a href="home.html#Serve">Services</a></button>
                <div class="dropdown-content">
                  <a href="department.html">Departments</a>
                  <a class="active" href="appoinment1.php">Appoinment</a>
                  <a href="services.html">Diagnostic Services</a>
                  <a href="service-fees.html">Service Fees</a>
                </div>
              </div>
            
            <a href="contactus.html">Contact</a>
            
        </nav>
    </header>

    <section class="book" id="book">
        <div class="row">


        <?php
        include("php/config.php");
        if(isset($_POST['submit'])){
            $username = $_POST['Name'];
            $Gender = $_POST['Gender'];
            $dept = $_POST['dept'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $date = $_POST['date'];
            $time = $_POST['timing'];
            
//verifying unique time
$verify_query1 = mysqli_query($con, "SELECT * FROM booking WHERE time='$time' AND date='$date'AND dept='$dept'");






//   $verify_query2 = mysqli_query($con, "SELECT date FROM booking WHERE date='$date'");
//   $verify_query3 = mysqli_query($con, "SELECT dept FROM booking WHERE dept='$dept'");


//    if(mysqli_num_rows($verify_query3)!=0){
//       if(mysqli_num_rows($verify_query2)!=0 ){
//           if(mysqli_num_rows($verify_query1)!=0){
//                echo "<div class='message'>
//      <p>This time slot has been booked.  Please try another time slot Please!</p>
//       </div><br>";
//      echo "<a href='javascript:self.history.back()'><button class='btn1'>Go Back</button>";
//           }
//          else{
//               mysqli_query($con,"INSERT INTO booking(Name,Gender,dept,email,number,date,time) VALUES('$username','$Gender','$dept','$email','$number','$date','$time')") or die("Error Occured");
//               echo "<div class='message'>
//               <p>Appoinment Booked Successfull!</p>
//               </div><br>";
//             echo "<a href='home.html'><button class='btn2'>Go Back</button>";
//           }
//       }
//   else{
//       mysqli_query($con,"INSERT INTO booking(Name,Gender,dept,email,number,date,time) VALUES('$username','$Gender','$dept','$email','$number','$date','$time')") or die("Error Occured");
//       echo "<div class='message'>
//       <p>Appoinment Booked Successfull!</p>
//       </div><br>";
//       echo "<a href='home.html'><button class='btn2'>Go Back</button>";
//   }
 



// }  
//  else{
//      mysqli_query($con,"INSERT INTO booking(Name,Gender,dept,email,number,date,time) VALUES('$username','$Gender','$dept','$email','$number','$date','$time')") or die("Error Occured");
//      echo "<div class='message'>
//      <p>Appoinment Booked Successfull!</p>
//      </div><br>";
//      echo "<a href='home.html'><button class='btn2'>Go Back</button>";
//  }











if(mysqli_num_rows($verify_query1)!=0 ){
    echo "<div class='message'>
         <p>This time slot is not available.  Please try another time slot !</p>
         </div><br>";
         echo "<a href='javascript:self.history.back()'><button class='btn1'>Go Back</button>";
             }
            else{
                 mysqli_query($con,"INSERT INTO booking(Name,Gender,dept,email,number,date,time) VALUES('$username','$Gender','$dept','$email','$number','$date','$time')") or die("Error Occured");
                 echo "<div class='message'>
                 <p>Appointment Booked Successfull!</p>
                 </div><br>";
                 echo "<a href='home.html'><button class='btn2'>Go Back</button>";
             }





        }




        else{

         ?>











            <h1><b>Book Appointment</b></h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
               







                <div class="info">
                    <span>Your Name :</span>
                    <input type="text" name="Name" placeholder="Enter Your Name" class="box" required>
                </div>
                <div class="info">
                    <span>Gender :</span>
                    <input list="gend" name="Gender" placeholder="Select Gender" class="box" required>
                    <datalist id="gend">
                    <option value="Male">
                    <option value="Female">
                    <option value="Others">
                    </datalist>
                </div>
                <div class="info">
                    <span>Select Department :</span>
                    <input list="depts" name="dept" placeholder="Select Department" class="box" required>
                </div>
                 <datalist id="depts">
                    <option value="Cardiology">
                    <option value="Burn and Plastic Surgery">
                    <option value="ENT">
                    <option value="Gynacology">
                    <option value="Neurology">
                    <option value="Orthopedic">
                    <option value="Pediatric">
                    <option value="Internal Medicine">
                  </datalist>
                <div class="info">
                    <span>E-mail :</span>
                    <input type="email" name="email" placeholder="Enter Your Email" class="box" required>
                </div>
                <div class="info">
                    <span>Your Number :</span>
                  <input type="number" name="number" placeholder="Enter Your Number" class="box" required>
                </div>
                <div class="info">
                    <span>Select Date:</span>
                  <input type="date" name="date" class="box" required>
                </div>
                <!-- <div class="info">
                    <span>Select Time:</span>
                  <input type="time" name="time" class="box" required>
                </div>  -->
                <div class="info">
                    <span>Select Time :</span>
                    <input list="time" name="timing" placeholder="Select Time" class="box" required>
                </div>
                <datalist id="time">
                    <option value="5.00-5.30">
                    <option value="5.30-6.00">
                    <option value="6.00-6.30">
                    <option value="6.30-7.00">
                    <option value="7.00-7.30">
                    <option value="7.30-8.00">
                    <option value="8.00-8.30">
                    <option value="8.30-9.00">
                  </datalist>
                <input type="submit" value="Make Appointment" name="submit" class="btn"> 
                <!-- <button>Make Appoinment</button>-->
            </form>
            <?php } ?>
        </div>
      </section>







      <section class="footer">     
    <div id="footer">
        <div class="name">
            <h1 class="logo"><img src="pics/logo.png" alt="Hospital logo"><p>MedCare Hospital</p></h1>
        </div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="home.html">Home</a></li>
            <li class="list-inline-item"><a href="aboutus.html">About</a></li>
            <li class="list-inline-item"><a href="news-events.html">News & Events </a></li>
            <li class="list-inline-item"><a href="terms.html">Terms</a></li>
            <li class="list-inline-item"><a href="privacy.html">Privacy Policy</a></li>
        </ul>
    <div class="vl"></div>
    <div class="social">
                 
        <a href="https://www.facebook.com/ChevronLab"><i class="fab fa-facebook-f"></i></a>
       <a href="https://www.instagram.com/chevronlab/"><i class="fab fa-instagram"></i></a>
       <a href="https://twitter.com/i/flow/login?redirect_after_login=%2FChevronBD"><i class="fab fa-twitter"></i></a>
       <a href="https://bd.linkedin.com/company/chevronlab"><i class="fa-brands fa-linkedin"></i></a>
   </div>
   <div class="vl"></div>
   <div class="loc">
       <a href="https://www.google.com/maps/place/Chevron+Clinical+Laboratory+(Pte.)+Ltd./@22.363367,91.830107,16z/data=!4m6!3m5!1s0x30acd88246"><ion-icon name="location"></ion-icon></a>

 </div>
    </div> 
    <p class="copyright">© Copyright 2023. All Rights Reserved by MedCare Hospital.</p>
</section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      </body>
</html>