 
<?php include 'connection.php' ?>


<!doctype html>
<html lang="en">



<head>

    <meta charset="utf-8" />
    <title>Seller Registration</title>
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
        .input-group .btn{
            position: absolute;
            top: 8px;
            right: 8px;
            padding: 0;
        }

        .input-group input.form-control{
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
                                <h4 class="mb-sm-0 font-size-18">Seller Registration</h4>

                                 

                            </div>
                        </div>
                    </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">

                        <?php

                                    if (isset($_POST["btnsubmit"])) {

                                        $name = $_POST["name"];
                                        $sname = $_POST["sname"];
                                        $cno = $_POST["cno"];
                                        $mail = $_POST["mail"];
                                        $pass = $_POST["pass"];
                                        $cid = $_POST["cid"];
                                        $address = $_POST["address"];
                                        $pincode = $_POST["pincode"];
                                        // $photo = "pqr.png";
                                        // $logo = "abc.png";
                                        // $certi = "xyz.png";
                                        $gstno = $_POST["gstno"];
                                        $weburl = $_POST["weburl"];
                                        $date = $_POST["date"];
                                        $landmark = $_POST["landmark"];
                                        // $proof = $_POST["proof"];
                                        $fpage = $_POST["fpage"];
                                        $about = $_POST["about"];
                                        $insta = $_POST["insta"];
                                        


                                        $ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
                                        $filename1 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                        move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/product/" . $filename1);

                                        $ext = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
                                        $filename2 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                        move_uploaded_file($_FILES["logo"]["tmp_name"], "uploads/product/" . $filename2);

                                        $ext = pathinfo($_FILES["certi"]["name"], PATHINFO_EXTENSION);
                                        $filename3 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                        move_uploaded_file($_FILES["certi"]["tmp_name"], "uploads/product/" . $filename3);



                                        $result = mysqli_query($conn, "insert into tbl_seller (city_id,name,shop_name,contact,email,password,cover_photo,logo,website_url,gst_no,gst_certi_photo,regi_datetime,about,facebook_page,insta_id,address,landmark,pincode) values ('$cid','$name','$sname','$cno','$mail','$pass','$filename1','$filename2','$weburl','$gstno','$filename3','$date','$about','$fpage','$insta','$address','$landmark','$pincode') ") or die(mysqli_error($conn));

                                        if ($result == true) {
                                    ?>
                                           echo "<script>window.location='Sellerlogin.php'</script>";
                                        <?php

                                        } else {

                                        ?>
                                            <div class="alert alert-warning mb-0" role="alert">
                                                Error!
                                            </div>
                                    <?php
                                        }
                                    }

                                    ?>

                                    <form method="POST" enctype="multipart/form-data" id="frm">

                                        <div class="row">
                                            
                                            <div class="col-lg-6">
                                                <div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">Seller Name</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="name" id="name">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">Contact Number</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="cno" id="cno">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">Create Your Password</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="pass" id="pass">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">Address</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="address" id="address">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">cover photo</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="file" name="photo" id="photo">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md  col-form-label">gst certificate photo</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="file" name="certi" id="certi">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">website url</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="weburl" id="weburl">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">Landmark</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="landmark" id="landmark">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">facebook page</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="fpage" id="fpage">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">instagram page / id</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="insta" id="insta">
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mt-3 mt-lg-0">
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">shop name</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="sname" id="sname">
                                                        </div>
                                                    </div>


                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md  col-form-label">e-mail</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="mail" id="mail">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md  col-form-label">city name</label>
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

                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md  col-form-label">Pincode</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="pincode" id="pincode">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">logo</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="file" name="logo" id="logo">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">gst number</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="gstno" id="gstno">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">register date & time</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="datetime-local" name="date" id="date">
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">about seller</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="about" id="about">
                                                        </div>
                                                    </div>







                                                </div>
                                            </div>

                                            <div>
                                                <!-- <a type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                <a href="sellerlogin.php" type="submit" class="btn btn-danger waves-effect waves-light">Cancel</a> -->
                                                

                                                <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                <a href="sellerlogin.php" type="submit" class="btn btn-danger waves-effect waves-light">Cancel</a>
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