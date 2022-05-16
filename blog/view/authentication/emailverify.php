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
            <div class="col-md-5">
             <form action="../../controller/UserController.php?email" method="post">
                <div class="card">
                    <div class="card-header">
                        <h4>Email Verify</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="Email">Email</label>
                            <input id="email" class="form-control" type="email" name="email" placeholder="Enter Email Address">
                        </div>

                        <div class="form-group mb-3">
                            <input type="submit" class="btn btn-primary"></input>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
