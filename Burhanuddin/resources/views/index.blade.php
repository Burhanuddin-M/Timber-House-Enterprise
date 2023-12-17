<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Timber House Enterprise</title>
</head>

<body class="bg-light">

    <div class="container text-center mt-5">
        <h1 class="text-center text-primary mb-4">Attendance Module</h1>

        <div class="d-grid gap-2">
            <a href="{{route('addEmployee')}}" class="btn btn-outline-primary btn-block fw-bold mb-2">Add Beneficiary</a>
            <a href="{{route('attendence')}}" class="btn btn-outline-primary btn-block fw-bold mb-2">Attendance</a>
            <a href="{{route('masterTable')}}" class="btn btn-outline-primary btn-block fw-bold mb-2">Master Table</a>
            <a href="{{route('deposits')}}" class="btn btn-outline-primary btn-block fw-bold mb-2">Deposit</a>
            <a href="{{route('transaction.show')}}" class="btn btn-outline-primary btn-block fw-bold mb-2">Transaction</a>
            <a href="{{route('reports.show')}}" class="btn btn-outline-primary btn-block fw-bold mb-2">Report</a>
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
