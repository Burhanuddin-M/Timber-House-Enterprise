@extends('layout.app')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee's Master Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.10/css/dataTables.bootstrap5.min.css">
    <style>
        body {
            padding-top: 20px;
        }

        .container {
            padding: 20px;
        }

        h1, h3 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        th, td {
            text-align: center;
        }

        .portfolio {
            font-weight: bold;
        }

        .portfolio.negative {
            color: red;
        }

        .portfolio.positive {
            color: green;
        }

        .back-button {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h3 class="text-center">{{ \Carbon\Carbon::now()->format('jS F Y') }}</h3>

        <table id="employeeTable" class="table table-hover table-striped">
            <thead>
                <tr>
                    <th class="text-center">Employee</th>
                    <th class="text-center">1/2</th>
                    <th class="text-center">P</th>
                    <th class="text-center">A</th>
                    <th class="text-center">Portfolio</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($Employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->attendance->where('is_half_day', 1)->count() }}</td>
                        <td>{{ $employee->attendance->where('type', 'PRESENT')->count() }}</td>
                        <td>{{ $employee->attendance->where('type', 'ABSENT')->count() }}</td>

                        <td class="portfolio @if ($employee->amount_portfolio < 0) negative @else positive @endif">
                            {{'₹ '. number_format(round(abs($employee->amount_portfolio))) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap 5 dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- DataTables script -->
    <script src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.10/js/dataTables.bootstrap5.min.js"></script>
    <!-- Font Awesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $('#employeeTable').DataTable({
                ordering: false
            });
        });
    </script>

</body>

</html>

@endsection
