<?php # Script 18.6 - register.php

// This is the registration page for the site.

$p_title = 'Register | Eureka';

include('header.php');

// if(isset($_SESSION['id'])){

// 	header('Location: https://eureka.ches.in/dashboard.php');

// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.



    // Need the database connection:

    require('mysqli_connect.php');



    $query1 = "SELECT id FROM eureka2020 ORDER BY time DESC LIMIT 1";

    $is = mysqli_query($dbc, $query1);

    if ($is === FALSE) {

        die(mysqli_error($dbc));

    }



    $row = mysqli_fetch_assoc($is);

    $prev_id = $row["id"];

    $current_id = $prev_id + 1;



    echo '<script type="text/javascript">';

    echo 'alert($' . $current_id . ')';

    echo '</script>';







    $teamid = $current_id;

    $teampass = mysqli_real_escape_string($dbc,$_POST['tpass']);

    $teamname1 = $_POST['tname'];
$teamname = mysqli_real_escape_string($dbc, $teamname1);

    $topic1 = $_POST['topic'];
$topic = mysqli_real_escape_string($dbc, $topic1);


    $brief1 = $_POST['brief'];

	$brief = mysqli_real_escape_string($dbc, $brief1);



    $mem1 = $_POST['mem1'];

    $mem2 = $_POST['mem2'];

    $mem3 = $_POST['mem3'];

    $mem4 = $_POST['mem4'];

    $mem5 = $_POST['mem5'];

    $mentor1 = $_POST['men1'];

    $mentor2 = $_POST['men2'];

    $mentor3 = $_POST['men3'];

    





    $mem1i = $_POST['mem1id'];

    $mem2i = $_POST['mem2id'];

    $mem3i = $_POST['mem3id'];

    $mem4i = $_POST['mem4id'];

    $mem5i = $_POST['mem5id'];

    $mentor1i = $_POST['men1id'];

    $mentor2i = $_POST['men2id'];

    $mentor3i = $_POST['men3id'];



    $mem1e = $_POST['mem1email'];

    $mem2e = $_POST['mem2email'];

    $mem3e = $_POST['mem3email'];

    $mem4e = $_POST['mem4email'];

    $mem5e = $_POST['mem5email'];

    $mentor1e = $_POST['men1email'];

    $mentor2e = $_POST['men2email'];

    $mentor3e = $_POST['men3email'];



    $mem1p = $_POST['mem1ph'];

    $mem2p = $_POST['mem2ph'];

    $mem3p = $_POST['mem2ph'];

    $mem4p = $_POST['mem4ph'];

    $mem5p = $_POST['mem5ph'];

    $mentor1p = $_POST['men1ph'];

    $mentor2p = $_POST['men2ph'];

    $mentor3p = $_POST['men3ph'];







    if (isset($teampass) && isset($teamname) && isset($topic) && isset($brief) && isset($mem1) && isset($mem1e) && isset($mem1i) && isset($mem1p) && isset($mentor1) && isset($mentor1e) && isset($mentor1i) && isset($mentor1p)) {



        $q1 = "INSERT INTO eureka2020 (id, password, team_name, topic, brief, name1, add_no1, email1, phone1, name2, add_no2, email2, phone2, name3, add_no3, email3, phone3, name4, add_no4, email4, phone4, name5, add_no5, email5, phone5, name6, add_no6, email6, phone6, name7, add_no7, email7, phone7, name8, add_no8, email8, phone8) VALUES ('$teamid','$teampass', '$teamname', '$topic', '$brief', '$mem1', '$mem1i', '$mem1e', '$mem1p', '$mem2', '$mem2i', '$mem2e', '$mem2p', '$mem3', '$mem3i', '$mem3e', '$mem3p', '$mem4', '$mem4i', '$mem4e', '$mem4p', '$mem5', '$mem5i', '$mem5e', '$mem5p', '$mentor1', '$mentor1i', '$mentor1e', '$mentor1p', '$mentor2', '$mentor2i', '$mentor2e', '$mentor2p', '$mentor3', '$mentor3i', '$mentor3e', '$mentor3p')";



        if (mysqli_query($dbc, $q1)) {

           



            $body = "Thank you for registering for Eureka. We are very much pleased to have you with us on this new venture. We hope that you enjoy this journey wholeheartdly. Your login details will be emailed once every team has registered for Eureka 2020\n\nBelow are the Registration Details:\n\n";

            $body .= "Team: $teamname1\nTopic: $topic1\nBrief Description: $brief1\nTeam Members: $mem1, $mem2, $mem3, $mem4, $mem5\nTeam Mentors: $mentor1, $mentor2, $mentor3\n\nFind your Eureka moment!\n\nFeel free to contact us for any necessary help or guidance.\n\nRegards,\nWeb Team | ChES-SVNIT\n\nContact:\nSheetal: +91 9828490088 ( For Project related Queries.)\nSahil: +91 7023766904 ( For Web related queries.)\n";

            mail($_POST['mem1email'], 'Registration Confirmation', $body, 'From: ches.svnit@gmail.com');

            mail($_POST['men1email'], 'Registration Confirmation', $body, 'From: ches.svnit@gmail.com');

            if (mail($_POST['mem1email'], 'Registration Confirmation', $body) == TRUE) {

                echo '<script type="text/javascript">';

                echo 'alert("Thank you for registering! A confirmation email has been sent on email of the First Member and first mentor.")';

                echo '</script>';



            

                include('./footer.php'); // Include the footer.

                exit();

            }

        } else {

            echo "ERROR: Nahi hua execute statement. You might have to type the description. Or else, contact Sahil, 3rd year!";

        }

    }

}

?>

<!-- Breadcrumb Area Start -->

<section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(img/bg-img/37.jpg);">

    <div class="container h-100">

        <div class="row h-100 align-items-center">

            <div class="col-12">

                <div class="breadcrumb-content">

                    <h2 class="page-title">Register</h2>

                    <nav aria-label="breadcrumb">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Register For Eureka 3.0</li><br>

                            

                        </ol>

                    </nav>

                    

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Breadcrumb Area End -->



<!-- Contact Us Area Start -->

<section class="contact--us-area section-padding-100-0">

    <div class="container">

        <div class="row">

            <!-- Contact Us Thumb -->

            <div class="col-12 col-lg-6">

                <div class="contact-us-thumb mb-100">

                    <img src="img/bg-img/44.jpg" alt="">

                </div>

            </div>



            <!-- Contact Form -->

            <div class="col-12 col-lg-6">

                <div class="contact_from_area mb-100 clearfix">

                    <!-- Contact Heading -->

                    <div class="contact-heading">

                        <h4>Register your team</h4>

                        <p>Fill out the details of your team with a brief Description about your project</p>

                        <p style='color:red;'>Last Date is 29th September, 2020</p>

                    </div>

                    <div class="contact_form">

                        <form action="register.php" method="post">

                            <div class="contact_input_area">

                                <div class="row">



                                    <div class="col-12">

                                        <div class="form-group">

                                            <input type="text" class="form-control lg-6" name="tpass" id="tpass" placeholder="Password">

                                        </div>

                                    </div>

                                    <!-- Form Group -->

                                    <div class="col-12">

                                        <div class="form-group">

                                            <input type="text" class="form-control mb-30" name="tname" id="tname" placeholder="Team Name">

                                        </div>

                                    </div>

                                    <!-- Form Group -->

                                    <div class="col-12">

                                        <div class="form-group">

                                            <input type="text" class="form-control mb-30" name="topic" id="topic" placeholder="Problem Statement">

                                        </div>

                                    </div>

                                    <!-- Form Group -->

                                    <div class="col-12">

                                        <div class="form-group">

                                            <textarea name="brief" class="form-control mb-30" id="brief" cols="30" rows="6" placeholder="Description here"></textarea>

                                        </div>

                                    </div>



                                </div>

                                <p>Member 1</p>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem1" id="mem1" placeholder="Full Name" autocapitalize="none">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem1id" id="mem1id" placeholder="Admission Number">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="email" class="form-control mb-30" name="mem1email" id="mem1email" placeholder="E-mail">

                                    </div>

                                </div>





                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem1ph" id="mem1ph" placeholder="Phone Number">

                                    </div>

                                </div>



                                <p>Member 2</p>



                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem2" id="mem2" placeholder="Full Name">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem2id" id="mem2id" placeholder="Admission Number">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="email" class="form-control mb-30" name="mem2email" id="mem2email" placeholder="E-mail">

                                    </div>

                                </div>





                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem2ph" id="mem2ph" placeholder="Phone Number">

                                    </div>

                                </div>



                                <p>Member 3 (optional)</p>



                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem3" id="mem3" placeholder="Full Name">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem3id" id="mem3id" placeholder="Admission Number">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="email" class="form-control mb-30" name="mem3email" id="mem3email" placeholder="E-mail">

                                    </div>

                                </div>





                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem3ph" id="mem3ph" placeholder="Phone Number">

                                    </div>

                                </div>



                                <p>Member 4 (optional)</p>



                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem4" id="mem4" placeholder="Full Name">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem4id" id="mem4id" placeholder="Admission Number">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="email" class="form-control mb-30" name="mem4email" id="mem4email" placeholder="E-mail">

                                    </div>

                                </div>



                             



                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem4ph" id="mem4ph" placeholder="Phone Number">

                                    </div>

                                </div>



                                <p>Member 5 (Optional)</p>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem5" id="mem5" placeholder="Full Name" autocapitalize="none">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem5id" id="mem5id" placeholder="Admission Number">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="email" class="form-control mb-30" name="mem5email" id="mem5email" placeholder="E-mail">

                                    </div>

                                </div>



                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="mem5ph" id="mem5ph" placeholder="Phone Number">

                                    </div>

                                </div>





                                <p>Mentor 1</p>



                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="men1" id="men1" placeholder="Full Name">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="men1id" id="men1id" placeholder="Admission Number">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="email" class="form-control mb-30" name="men1email" id="men1email" placeholder="E-mail">

                                    </div>

                                </div>





                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="men1ph" id="men1ph" placeholder="Phone Number">

                                    </div>

                                </div>

                                <p>Mentor 2 (optional)</p>



                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="men2" id="men2" placeholder="Full Name">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="men2id" id="men2id" placeholder="Admission Number">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="email" class="form-control mb-30" name="men2email" id="men2email" placeholder="E-mail">

                                    </div>

                                </div>





                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="men2ph" id="men2ph" placeholder="Phone Number">

                                    </div>

                                </div>



                                <p>Mentor 3 (optional)</p>



                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="men3" id="men3" placeholder="Full Name">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="men3id" id="men3id" placeholder="Admission Number">

                                    </div>

                                </div>

                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="email" class="form-control mb-30" name="men3email" id="men3email" placeholder="E-mail">

                                    </div>

                                </div>





                                <!-- Form Group -->

                                <div class="col-12 col-lg-6">

                                    <div class="form-group">

                                        <input type="text" class="form-control mb-30" name="men2ph" id="men2ph" placeholder="Phone Number">

                                    </div>

                                </div>



                                <!-- Button -->

                                <div class="col-12">

                                    <button type="submit" class="btn confer-btn">Register Now <i class="zmdi zmdi-long-arrow-right"></i></button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Contact Us Area End -->

<?

include('footer.php');

?>