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

        h1, h3 {
            color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        table {
            margin-top: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        .btn-secondary {
            background-color: #dc3545;
        }

        .btn-secondary:hover {
            background-color: #c82333;
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

    <title>Showing number plates</title>
</head>

<body>

    <div class="container">

        <div class="d-flex justify-content-center">
            <button class="btn btn-primary"><a href="{{route('showplates')}}"
                    class="text-decoration-none text-white">&#8592;</a></button>
        </div>

        <table class="table text-center">
            @foreach ($platesrecords as $records)
                <tr>
                    <th colspan="3" style="border:3px dotted black;">{{ $records->numberplate }}</th><br>
                </tr>

                <tr>

                    <th>RC BOOK</th>

                    <td>
                        @php
                            $rc_num = 0;
                        @endphp

                        @if ($records->rcbook_first)
                            @php
                                $rc_num += 1;
                            @endphp
                        @endif

                        @if ($records->rcbook_second)
                            @php
                                $rc_num += 1;
                            @endphp
                        @endif

                        @if ($records->rcbook_third)
                            @php
                                $rc_num += 1;
                            @endphp
                        @endif

                        @if ($records->rcbook_fourth)
                            @php
                                $rc_num += 1;
                            @endphp
                        @endif

                        @if ($records->rcbook_fifth)
                            @php
                                $rc_num += 1;
                            @endphp
                        @endif

                        <strong>({{ $rc_num }})</strong>

                    </td>

                    <td>
                        <button class="btn btn-success btn-sm"><a class="text-white text-decoration-none"
                                href="{{ route('Viewrcbook', $records->id) }}">Show</a></button>
                    </td>
                </tr>

                <tr>
                    <th>INSURANCE</th>


                    <td>
                        @php
                            $ins_num = 0;
                        @endphp

                        @if ($records->insurance_first)
                            @php
                                $ins_num += 1;
                            @endphp
                        @endif

                        @if ($records->insurance_second)
                            @php
                                $ins_num += 1;
                            @endphp
                        @endif


                        @if ($records->insurance_third)
                            @php
                                $ins_num += 1;
                            @endphp
                        @endif

                        @if ($records->insurance_fourth)
                            @php
                                $ins_num += 1;
                            @endphp
                        @endif

                        @if ($records->insurance_fifth)
                            @php
                                $ins_num += 1;
                            @endphp
                        @endif

                        <strong>({{ $ins_num }})</strong>

                    </td>
                    <td>
                        <button class="btn btn-success btn-sm"><a class="text-white text-decoration-none"
                                href="{{ route('Viewinsurance', $records->id) }}">Show</a></button>
                    </td>

                </tr>

                <tr>

                    <th>PUC</th>

                    <td>
                        @php
                            $puc_num = 0;
                        @endphp

                        @if ($records->puc_first)
                            @php
                                $puc_num += 1;
                            @endphp
                        @endif

                        @if ($records->puc_second)
                            @php
                                $puc_num += 1;
                            @endphp
                        @endif


                        @if ($records->puc_third)
                            @php
                                $ins_num += 1;
                            @endphp
                        @endif

                        @if ($records->puc_fourth)
                            @php
                                $puc_num += 1;
                            @endphp
                        @endif

                        @if ($records->puc_fifth)
                            @php
                                $puc_num += 1;
                            @endphp
                        @endif

                        <strong>({{ $puc_num }})</strong>

                    </td>

                    <td>
                        <button class="btn btn-success btn-sm"><a class="text-white text-decoration-none"
                                href="{{ route('Viewpuc', $records->id) }}">Show</a></button>
                    </td>

                </tr>

                <tr>
                    <th>FITNESS</th>


                    <td>
                        @php
                            $fit_num = 0;
                        @endphp

                        @if ($records->fitness_first)
                            @php
                                $fit_num += 1;
                            @endphp
                        @endif

                        @if ($records->fitness_second)
                            @php
                                $fit_num += 1;
                            @endphp
                        @endif


                        @if ($records->fitness_third)
                            @php
                                $fit_num += 1;
                            @endphp
                        @endif

                        @if ($records->fitness_fourth)
                            @php
                                $fit_num += 1;
                            @endphp
                        @endif

                        @if ($records->fitness_fifth)
                            @php
                                $fit_num += 1;
                            @endphp
                        @endif

                        <strong>({{ $fit_num }})</strong>

                    </td>

                    <td>
                        <button class="btn btn-success btn-sm"><a class="text-white text-decoration-none"
                                href="{{ route('Viewfitness', $records->id) }}">Show</a></button>
                    </td>
                </tr>

                <tr>
                    <th>NATIONAL PERMIT</th>
                    <td>
                        @php
                            $nat_num = 0;
                        @endphp

                        @if ($records->national_first)
                            @php
                                $nat_num += 1;
                            @endphp
                        @endif

                        @if ($records->national_second)
                            @php
                                $nat_num += 1;
                            @endphp
                        @endif

                        @if ($records->national_third)
                            @php
                                $nat_num += 1;
                            @endphp
                        @endif

                        @if ($records->national_fourth)
                            @php
                                $nat_num += 1;
                            @endphp
                        @endif

                        @if ($records->national_fifth)
                            @php
                                $nat_num += 1;
                            @endphp
                        @endif

                        <strong>({{ $nat_num }})</strong>

                    </td>
                    <td>
                        <button class="btn btn-success btn-sm"><a class="text-white text-decoration-none"
                                href="{{ route('Viewnational', $records->id) }}">Show</a></button>
                    </td>
                </tr>

                <tr>
                    <th>ROAD TAX</th>


                    <td>
                        @php
                            $road_num = 0;
                        @endphp

                        @if ($records->roadtax_first)
                            @php
                                $road_num += 1;
                            @endphp
                        @endif

                        @if ($records->roadtax_second)
                            @php
                                $road_num += 1;
                            @endphp
                        @endif


                        @if ($records->roadtax_third)
                            @php
                                $road_num += 1;
                            @endphp
                        @endif

                        @if ($records->roadtax_fourth)
                            @php
                                $road_num += 1;
                            @endphp
                        @endif

                        @if ($records->roadtax_fifth)
                            @php
                                $road_num += 1;
                            @endphp
                        @endif

                        <strong>({{ $road_num }})</strong>

                    </td>

                    <td>
                        <button class="btn btn-success btn-sm"><a class="text-white text-decoration-none"
                                href="{{ route('Viewroadtax', $records->id) }}">Show</a></button>
                    </td>
                </tr>

                <tr>
                    <th>DRIVING LICENSE</th>

                    <td>
                        @php
                            $driv_num = 0;
                        @endphp

                        @if ($records->license_first)
                            @php
                                $driv_num += 1;
                            @endphp
                        @endif

                        @if ($records->license_second)
                            @php
                                $driv_num += 1;
                            @endphp
                        @endif


                        @if ($records->license_third)
                            @php
                                $driv_num += 1;
                            @endphp
                        @endif

                        @if ($records->license_fourth)
                            @php
                                $driv_num += 1;
                            @endphp
                        @endif

                        @if ($records->license_fifth)
                            @php
                                $driv_num += 1;
                            @endphp
                        @endif

                        <strong>({{ $driv_num }})</strong>

                    </td>

                    <td>
                        <button class="btn btn-success btn-sm"><a class="text-white text-decoration-none"
                                href="{{ route('Viewlicense', $records->id) }}">Show</a></button>
                    </td>
                </tr>
            @endforeach
        </table>

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
