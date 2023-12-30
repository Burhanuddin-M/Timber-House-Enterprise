<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            padding-top: 20px;
            font-size: 14px;
            background-color: #f8f9fa; /* Light gray background */
            color: #495057; /* Dark text color */
        }

        .container {
            padding: 20px;
            overflow-x: auto;
            background-color: #ffffff; /* White container background */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle lift */
        }

        h1, h2 {
            color: #007bff; /* Blue header text color */
        }

        th, td {
            text-align: center;
            padding: 8px;
            border: 1px solid #ddd;
            background-color: #ffffff; /* White table cells */
        }

        .table-responsive {
            margin-top: 20px;
        }

        @media only screen and (max-width: 600px) {
            body {
                padding-top: 10px;
                font-size: 12px;
            }

            .container {
                padding: 10px;
            }

            h1, h2 {
                font-size: 18px;
            }

            th, td {
                font-size: 10px;
                padding: 6px;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">

        
            <h3 class="text-center">
                {{ $name }} at {{ $place }}
            </h3>
        
        <div class="table-responsive">
            <table id="resultTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>L</th>
                        <th>B</th>
                        <th>W</th>
                        <th>Area</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tableData as $data)
                        <tr>
                            <td>{{ $data['serialNumber'] }}</td>
                            <td>{{ $data['length'] }}</td>
                            <td>{{ $data['breadth'] }}</td>
                            <td>{{ $data['width'] }}</td>
                            <td>{{ number_format($data['area'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right">Answer</td>
                        <td class="text-center"><h5>{{ number_format($totalArea, 2) }}</h5></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#resultTable').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                searching: false, // Disable search feature
                paging: false, // Disable pagination
                info: false // Disable showing "1 of 1 entries" information
            });
        });
    </script>
</body>

</html>
