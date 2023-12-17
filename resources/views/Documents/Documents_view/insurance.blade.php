@extends('layout.app')

@section('content')

<!doctype html>
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
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 800px;
            margin: auto;
            animation: fadeIn 1s ease-in-out;
        }

        h2 {
            color: #007bff;
            border: 1px solid black;
            padding: 10px;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-primary {
            color: #007bff;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .text-danger {
            color: #dc3545;
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

    <title>Insurance Documents..</title>


</head>

<body><br>

    <div class="container">
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary"><a href="/documents/showrecords/{{ $data->id }}"
                    class="text-decoration-none text-white">&#8592;</a></button>
        </div><br>

        <h2 class="text-center">
            {{ $data->numberplate }}
        </h2><br>

        <h2 class="text-center" style="border:1px solid black;">
            INSURANCE DOCUMENTS
        </h2><br>

        <div>
            <div>
                <h3 class="text-center">1</h3><br>
                @if ($data->insurance_first != '')
                <div class="text-center">
                    <a class="btn btn-primary" href="{{ route('download', $data->insurance_first) }}" role="button">
                        Download
                    </a>
                </div>
                <img src="{{ asset('assets/' . $data->insurance_first) }}" alt="Your Image Alt Text" class="img-fluid">
                @else
                <h3 class="text-center text-danger">Not Uploaded</h3>
                @endif

            </div><br><br>

            <div>
                <h3 class="text-center">2</h3><br>
                @if ($data->insurance_second != '')
                <div class="text-center">
                    <a class="btn btn-primary" href="{{ route('download', $data->insurance_second) }}" role="button">
                        Download
                    </a>
                </div>
                <img src="{{ asset('assets/' . $data->insurance_second) }}" alt="Your Image Alt Text" class="img-fluid">
                @else
                <h3 class="text-center text-danger">Not Uploaded</h3>
                @endif
            </div><br><br>

            <div>
                <h3 class="text-center">3</h3><br>
                @if ($data->insurance_third != '')
                <div class="text-center">
                    <a class="btn btn-primary" href="{{ route('download', $data->insurance_third) }}" role="button">
                        Download
                    </a>
                </div>
                <img src="{{ asset('assets/' . $data->insurance_third) }}" alt="Your Image Alt Text" class="img-fluid">
                @else
                <h3 class="text-center text-danger">Not Uploaded</h3>
                @endif
            </div><br><br>

            <div>
                <h3 class="text-center">4</h3><br>
                @if ($data->insurance_fourth != '')
                <div class="text-center">
                    <a class="btn btn-primary" href="{{ route('download', $data->insurance_fourth) }}" role="button">
                        Download
                    </a>
                </div>
                <img src="{{ asset('assets/' . $data->insurance_fourth) }}" alt="Your Image Alt Text" class="img-fluid">
                @else
                <h3 class="text-center text-danger">Not Uploaded</h3>
                @endif
            </div><br><br>

            <div>
                <h3 class="text-center">5</h3><br>
                @if ($data->insurance_fifth != '')
                <div class="text-center">
                    <a class="btn btn-primary" href="{{ route('download', $data->insurance_fifth) }}" role="button">
                        Download
                    </a>
                </div>
                <img src="{{ asset('assets/' . $data->insurance_fifth) }}" alt="Your Image Alt Text" class="img-fluid">
                @else
                <h3 class="text-center text-danger">Not Uploaded</h3>
                @endif
            </div><br>

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
