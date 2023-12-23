<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-color: #f0f5ff;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        .card-img-top {
            border-bottom: 1px solid #dee2e6;
        }

        .card-body {
            padding: 20px;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1, h3 {
            text-align: center;
            color: #0077cc;
            animation: slideIn 1s ease-in-out;
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-primary {
            width: 100%;
            height: 40px;
            font-size: 16px;
            background-color: #0077cc;
            border-color: #0077cc;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #005b99;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.2}s`;
            });
        });
    </script>

    <title>Timber House Enterprise</title>
</head>

<body>

    <div class="container">
        <h1>Timer House Enterprise</h1>

        <div class="row mt-4">
            <!-- Documents Module Card -->
            <div class="col-md-6">
                <div class="card">
                    <img src="https://media.istockphoto.com/id/868379756/vector/document-or-letter-with-a-seal-vector-illustration-of-a-flat-style-with-shadow-isolated-on-a.jpg?s=612x612&w=0&k=20&c=Qj3GtMmorCEUoHqj2NYfUCBER8140m3Ai1kzPBw6noI=" height="200px" width="200px" class="card-img-top img-fuild" alt="Documents Image">
                    <div class="card-body text-center">
                        <a href="{{route('showplates')}}" class="btn btn-primary">Vehicle Documents</a>
                    </div>
                </div>
            </div>

            <!-- Products Module Card -->
            <div class="col-md-6">
                <div class="card">
                    <img src="https://media.istockphoto.com/id/622323488/photo/stacked-wood-pine-timber-for-construction-buildings.jpg?s=612x612&w=0&k=20&c=4NySfnHS3WgetqJaO0t0zSiFdVA5F6vEqqNWrxYAsTk=" class="card-img-top img-fluid" height="200px" width="200px" alt="Products Image">
                    <div class="card-body text-center">
                        <a href="{{route('products.admin')}}" class="btn btn-primary">Timber Products</a>
                    </div>
                </div>
            </div>

            <!-- Attendence Module Card -->
            <div class="col-md-6">
                <div class="card">
                    <img src="https://thumbs.dreamstime.com/b/woman-hand-writing-attendance-marker-blue-background-professionally-79573891.jpg" class="card-img-top img-fluid" height="200px" width="200px" alt="Products Image">
                    <div class="card-body text-center">
                        <a href="{{route('attendence.index')}}" class="btn btn-primary">Employee attendence</a>
                    </div>
                </div>
            </div>

            <!-- Calculator Module Card -->
            <div class="col-md-6">
                <div class="card">
                    <img src="https://cdn1.byjus.com/wp-content/uploads/2020/01/Online-free-math-calculator.jpg" height="200px"  alt="Products Image">
                    <div class="card-body text-center">
                        <a href="{{route('calculator.index')}}"" class="btn btn-primary">CF Calculator</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->

    <script>
