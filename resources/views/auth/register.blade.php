<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Register</title>
    <link rel="icon" href="{{asset('/')}}asset/front/favicon/favicon.svg">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{asset('/')}}asset/admin/bootstrap/css/bootstrap.css">
</head>
<body>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="card-title text-center text-dark">Register</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="" class="form-label">Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="" class="form-label">Email</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="" class="form-label">Password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="" class="form-label">Confirm Password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-success" value="Register"/>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('/')}}asset/admin/bootstrap/js/jquery-3.6.0.js"></script>
<script src="{{asset('/')}}asset/admin/bootstrap/js/bootstrap.js"></script>
</body>
</html>
