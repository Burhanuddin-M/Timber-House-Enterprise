<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee's Master Table</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 20px;
        }

        div.dataTables_wrapper {
            width: 95%;
            margin: 0 auto;
        }

        .container {
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <button class="btn btn-primary text-center">
            <a href="{{ route('attendence.index') }}" class="text-white text-decoration-none">←</a>
        </button>
        
        <table class="table table-hover table-striped" id="employeeTable">
            <thead>
                <tr>
                    <th>SR</th>
                    <th>Employee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Employees as $employee)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>
                        <a href="{{route('report.specific',['id'=>$employee->id])}}" class="btn btn-sm btn-primary">OPEN</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#employeeTable').DataTable();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
