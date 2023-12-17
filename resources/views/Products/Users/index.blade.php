@extends('layout.app')

@section('content')

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .text-center {
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-white {
            color: #fff;
        }

        .table {
            width: 100%;
            margin-top: 20px;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .button {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
        }

        .bg-success {
            background-color: #28a745;
            color: #fff;
        }

        .bg-success:hover {
            background-color: #218838;
        }

        #container {
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 800px;
            margin: auto;
            animation: fadeIn 1s ease-in-out;
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
    </style>

    <title>Users Home Page</title>
</head>

<body>
    <br>

    <div class="text-center">
        <button class="btn btn-primary">
            <a href="{{ route('products.admin') }}" class="text-white text-decoration-none">GO TO ADMIN PANEL</a>
        </button>
    </div><br>

    <div id="container">
        <div id="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" id="col-1">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    @foreach ($twoItems as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $item->name }}
                                            </td>

                                            <td class="text-center">
                                                <button class="button bg-success">
                                                    <a href="{{ route('products.user.displaytwo', ['id' => $item->id]) }}" class="text-white text-decoration-none">OPEN</a>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @foreach ($fourItems as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $item->name }}
                                            </td>

                                            <td class="text-center">
                                                <button class="button bg-success">
                                                    <a href="{{ route('products.user.displayfour', ['id' => $item->id]) }}" class="text-white text-decoration-none">OPEN</a>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
</body>

</html>

@endsection
