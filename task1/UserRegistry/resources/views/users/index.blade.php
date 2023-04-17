<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Freelancer - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <!--
    <link href="css/app.css" rel="stylesheet" />
    -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
<!-- Masthead-->
<header class="masthead bg-primary text-white text-center" style="background-image: url('assets/img/background.png'); background-repeat: no-repeat, repeat; height: 467px;">
</header>
<!-- Contact Section-->
<section class="page-section" id="contact">
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="col-md-12 mb-4 pull-right">
            <button class="btn btn-dark" onclick="addUser()">Add new user</button>
        </div>
        <div class="col-md-12">
            <table class="table table-lg table-striped ta">
                <tbody>
                @foreach($users as $user)
                    <tr class="px-5 md-5">
                        <td class="px-5 md-5">{{$user->name}} {{$user->surname}}</td><td>{{$user->email}}</td><td class="pull-right"><a style="cursor: pointer;" onclick="deleteUser({{$user->id}})"><i class="fa fa-trash color-red"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Copyright Section-->
<div class="copyright py-4 text-center text-white">
    <div class="container"><small>Copyright User Listing App</small></div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Please confirm that you would like to delete this user.
            </div>
            <div class="modal-footer">
                <form id="deleteForm" name="deleteForm" action="" method="POST">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                    <button type="button" class="btn btn-dark" style="width: 100px;">
                        <div class="spinner-border" role="status" style="height: 20px; width: 20px;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-dark">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add new user</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="user/store" method="post">
                <div class="modal-body">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="name" class="mb-2">Name</label>
                        <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="surname" class="mb-2">Surname</label>
                        <input type="text" class="form-control mb-3" id="surname"  name="surname" placeholder="Enter your surname" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="mb-2">Email</label>
                        <input type="email" class="form-control mb-3" id="email"  name="email" aria-describedby="emailHelp" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="position" class="mb-2">Position</label>
                        <input type="text" class="form-control mb-3" id="position"  name="position" placeholder="Enter your position" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" style="width: 100px;">
                        <div class="spinner-border" role="status" style="height: 20px; width: 20px;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-dark">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="js/app.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
