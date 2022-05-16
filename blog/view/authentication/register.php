<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Dashboard</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
 <body>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 ">
                <div class="card">
                    <div class="card-header border border-dark">
                        <h4 class="text-center card-header">Registration</h4>
                    </div>
                    <div class="card-body border border-dark">
                        <form action="../../controller/UserController.php?create" id="myform" enctype="multipart/form-data" method="POST">
                            <div class="form-group mb-3">
                                <label for="First Name">First Name</label><br>
                                <span id="error_fname"></span>
                                <input id="fname" class="form-control" required type="text" name="fname" placeholder="Enter First Name">
                                
                            </div>
                            <div class="form-group mb-3">
                                <label for="Last Name">Last Name</label><br>
                                <span id="error_lname"></span>
                                <input id="lname" class="form-control"  required type="text" name="lname" placeholder="Enter Last  Name">
                                

                            </div>

                            <div class="form-group mb-3">
                                <label for="Email">Email</label><br>
                                <span id="error_email"></span>
                                <input id="email" class="form-control" required type="email" name="email" placeholder="Enter Email Address">
                            
                            </div>

                            <div class="form-group mb-3">
                                <label for="Mobile_no">Mobile_no</label><br>
                                <span id="error_mobile"></span>
                                <input id="mobile" class="form-control" required type="mobile" name="mobile" placeholder="Enter Mobile Number">
                            
                            </div>

                            <div class="form-group mb-3">
                                <label for="Password">Password</label><br>
                                <span id="error_pass"></span>
                                <input id="pwd" class="form-control" required type="password" name="password" placeholder="Enter Your Password">
                                

                            </div>

                            <div class="form-group mb-3">
                                <label for="Confirm Password">Confirm Password</label><br>
                                <span id="error_cpass"></span>
                                <input id="cpwd" class="form-control" required type="password" placeholder="Enter Your Confirm Password">
                            </div>

                            <div class="form-group mb-3">
                            <label for="Upload Image">Upload Image</label><br>
                            <input type="file" name="image" id="image" >

                            </div>

                            <div class="form-group mb-3">
                                <input type="submit" class="btn btn-primary" id="savebtn"></input>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="../../assets/js/validation.js"> 
   
</script>
 </body>
 </html>    