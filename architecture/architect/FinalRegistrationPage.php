 <?php include 'connection.php' ?>


 <!doctype html>
 <html lang="en">



 <head>

     <meta charset="utf-8" />
     <title>Architect Registration</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
     <meta content="Themesbrand" name="author" />
     <!-- App favicon -->
     <link rel="shortcut icon" href="assets/images/favicon.ico">

     <!-- Bootstrap Css -->
     <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
     <!-- Icons Css -->
     <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
     <!-- App Css-->
     <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

     <style>
         .input-group .btn {
             position: absolute;
             top: 8px;
             right: 8px;
             padding: 0;
         }

         .input-group input.form-control {
             width: 100%;
         }
     </style>

 </head>

 <body>
     <div class="account-pages my-5 pt-sm-5">
         <div class="container">


             <div class="row">
                 <div class="col-12">
                     <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                         <h4 class="mb-sm-0 font-size-18">Architect Registration</h4>



                     </div>
                 </div>
             </div>
             <div class="row justify-content-center">
                 <div class="col-12">
                     <div class="card overflow-hidden">
                         <div class="card-body pt-0">

                             <?php

                                if (isset($_POST["btnsubmit"])) {

                                    // echo "inserted";


                                    // echo $cname;
                                    // echo $sid;
                                    
                                    $name = $_POST["name"];
                                    $contact = $_POST["contact"];
                                    $mail = $_POST["mail"];
                                    $pass = $_POST["pass"];
                                    $cid = $_POST["cid"];
                                    $about = $_POST["about"];
                                    $address = $_POST["address"];
                                    // $cover = $_POST["cover"];
                                    // $profile = "abc.png";
                                    $qua = $_POST["qua"];
                                    $fname = $_POST["fname"];
                                    $wed = $_POST["web"];
                                    $fcontact = $_POST["fcontact"];
                                    // $addharpic = "pqr.png";
                                    $fmail = $_POST["fmail"];
                                    $addharno = $_POST["addharno"];
                                    // $certi = "xyc.png";
                                    $spc = $_POST["spc"];
                                    $cname = $_POST["cname"];
                                    $exp = $_POST["exp"];
                                    $landmark = $_POST["landmark"];
                                    $pincode = $_POST["pincode"];
                                    $reg = $_POST["reg"];


                                    //duplication

                                    $sql = mysqli_query($conn, "select * from tbl_architect where name='$name' and city_id='$cid' ");

                                    if (mysqli_num_rows($sql) <= 0) {


                                        $ext = pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION);
                                        $filename = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                        move_uploaded_file($_FILES["profile"]["tmp_name"], "uploads/architect/" . $filename);

                                        $ext = pathinfo($_FILES["addharpic"]["name"], PATHINFO_EXTENSION);
                                        $filename2 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                        move_uploaded_file($_FILES["addharpic"]["tmp_name"], "uploads/architect/" . $filename2);

                                        $ext = pathinfo($_FILES["certi"]["name"], PATHINFO_EXTENSION);
                                        $filename3 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                        move_uploaded_file($_FILES["certi"]["tmp_name"], "uploads/architect/" . $filename3);

                                        $ext = pathinfo($_FILES["cover"]["name"], PATHINFO_EXTENSION);
                                        $filename4 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                        move_uploaded_file($_FILES["cover"]["tmp_name"], "uploads/architect/" . $filename4);



                                        $result = mysqli_query($conn, " insert into tbl_architect(city_id,name,contact,email,profile_photo,firm_name,firm_contact,firm_mail,website,addhar_card_photo,addhar_card_number,qualification,experience,specialization,certificate_photo,certificate_name,regi_date_time,cover_photo,address,landmark,pincode,about_us,password) values ('$cid','$name','$contact','$mail','$filename','$fname','$fcontact','$fmail','$wed','$filename2','$addharno','$qua','$exp','$spc','$filename3','$cname','$reg','$filename4','$address','$landmark','$pincode','$about','$pass') ") or die(mysqli_error($conn));


                                        if ($result == true) {
                                ?>
                                         <div class="alert alert-info mb-0" role="alert">
                                            <?php echo "<script> window.location = 'architectlogin.php ' </script>"; ?>
                                         </div>

                                     <?php

                                        } else {
                                        ?>
                                         <div class="alert alert-warning mb-0" role="alert">
                                             Error !
                                         </div>
                                     <?php
                                        }
                                    } else {
                                        ?>
                                     <div class="alert alert-warning mb-0" role="alert">
                                         architect already exists !
                                     </div>
                             <?php
                                    }
                                }

                                ?>

                             <form method="POST" enctype="multipart/form-data" id="frm">

                                 <div class="row">
                                     <div class="col-lg-6">
                                         <div>
                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="name" id="name">
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col-md-2 col-form-label">E-mail</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="mail" id="mail">
                                                 </div>
                                             </div>
                                             <div class="mb-3 row">
                                                 <label for="example-text-input" class="col-md- col-form-label">City</label>
                                                 <div class="col-md-12">
                                                     <select class="form-control" name="cid" id="cid">

                                                         <option value="">Select City Name</option>
                                                         <?php
                                                            $count = "1";
                                                            $result = mysqli_query($conn, "select * from tbl_city") or die(mysqli_error($conn));

                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                             <option value="<?php echo $row["city_id"] ?>"><?php echo $row["city_name"] ?></option>
                                                         <?php
                                                            }
                                                            ?>
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col-md col-form-label">Address</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="textarea" name="address" id="address">
                                                 </div>
                                             </div>

                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col-md col-form-label">Profile Photo</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="file" name="profile" id="profile">
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col col-form-label">Firm name </label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="fname" id="fname">
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col-md col-form-label">Firm Contact</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="fcontact" id="fcontact">
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col-md col-form-label">Firm E-mail</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="fmail" id="fmail">
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col-md col-form-label">Certificate Photo</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="file" name="certi" id="certi">
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col-md col-form-label">Cerfiticate Name</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="cname" id="cname">
                                                 </div>
                                             </div>
                                             <div class="mb-3 row">
                                                 <label for="example-text-input" class="col-md- col-form-label">Landmark</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="landmark" id="landmark">
                                                 </div>
                                             </div>
                                             
                                             <div class="mb-3 row">
                                                 <label for="example-text-input" class="col-md  col-form-label">Register Date & Time</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="datetime-local" name="reg" id="reg">
                                                 </div>
                                             </div>

                                         </div>
                                     </div>

                                     <div class="col-lg-6">
                                         <div class="mt-3 mt-lg-0">
                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col-md- col-form-label">Conatct Number</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="contact" id="contact">
                                                 </div>
                                             </div>

                                             <div class="mb-3 row">
                                                 <label for="example-text-input" class="col-md- col-form-label">Password</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="pass" id="pass">
                                                 </div>
                                             </div>

                                             <div class="mb-3 row">
                                                 <label for="example-text-input" class="col-md- col-form-label">About Architect</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="about" id="about">
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col-md-2 col-form-label">Cover Photo</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="file" name="cover" id="cover">
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col-md col-form-label">Qualification</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="qua" id="qua">
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col-md-2 col-form-label">Website</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="web" id="web">
                                                 </div>
                                             </div>

                                             <div class="mb-3">
                                                 <label for="example-text-input" class="col-md  col-form-label">Addhar Card Photo</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="file" name="addharpic" id="addharpic">
                                                 </div>
                                             </div>
                                             <div class="mb-3 row">
                                                 <label for="example-text-input" class="col-md col-form-label">Addhar Card Number</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="addharno" id="addharno">
                                                 </div>
                                             </div>
                                             <div class="mb-3 row">
                                                 <label for="example-text-input" class="col-md  col-form-label">Specialization</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="spc" id="spc">
                                                 </div>
                                             </div>
                                             <div class="mb-3 row">
                                                 <label for="example-text-input" class="col-md  col-form-label">Experience</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="text" name="exp" id="exp">
                                                 </div>
                                             </div>
                                             <div class="mb-3 row">
                                                 <label for="example-text-input" class="col-md col-form-label">Pincode</label>
                                                 <div class="col-md-12">
                                                     <input class="form-control" type="textarea" name="pincode" id="pincode">
                                                 </div>
                                             </div>
                                            

                                         </div>
                                     </div>

                                     <div>
                                         <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                         <a href="architectlogin.php" type="submit" class="btn btn-danger waves-effect waves-light">Cancel</a>

                                     </div>
                                 </div>
                         </div>

                         </form>



                     </div>
                 </div>


             </div>
         </div>
     </div>
     </div>
     <!-- end account-pages -->

     <!-- JAVASCRIPT -->
     <script src="assets/libs/jquery/jquery.min.js"></script>
     <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="assets/libs/metismenu/metisMenu.min.js"></script>
     <script src="assets/libs/simplebar/simplebar.min.js"></script>
     <script src="assets/libs/node-waves/waves.min.js"></script>

     <script src="assets/js/jquery.validate.min.js"></script>
     <script src="assets/js/additional-methods.min.js"></script>

     <!-- App js -->
     <script src="assets/js/app.js"></script>

     <script>
         $(document).ready(function() {

             $("#frm").validate({

                 rules: {
                     username: {
                         required: true
                     },
                     pwd: {
                         required: true,

                     }
                 },

                 messages: {

                     username: {
                         required: "please enter your username"
                     },
                     pwd: {
                         required: "please enter your password",


                     }

                 }

             });


         });
     </script>
 </body>


 </html>