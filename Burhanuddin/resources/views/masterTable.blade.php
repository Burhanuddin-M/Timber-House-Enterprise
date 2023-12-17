<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee's Master Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
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
        <button class="btn btn-primary text-center">
            <a href="{{ route('attendence.index') }}" class="text-white text-decoration-none">←</a>
        </button>

        <h3 class="text-center">{{ \Carbon\Carbon::now()->format('jS F Y') }}</h3>

        <table id="employeeTable" class="table table-hover table-striped">
            <thead>
                <tr>
                    <th class="text-center">Employee</th>
                    <th class="text-center">P</th>
                    <th class="text-center">A</th>
                    <th class="text-center">Portfolio</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($Employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#employeeTable').DataTable({
                ordering: false
            });
        });
    </script>
    
</body>

</html>
