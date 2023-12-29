<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.2/css/buttons.dataTables.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Result</h1>

        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $name }}</p>
                <p><strong>Place:</strong> {{ $place }}</p>
            </div>
        </div>

        <h2 class="mt-4">Table Data</h2>
        <div class="table-responsive">
            <table id="resultTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Serial Number</th>
                        <th>Length</th>
                        <th>Breadth</th>
                        <th>Width</th>
                        <th>Area (in sq. ft)</th>
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
                        <td colspan="4" class="text-right"><strong>Answer</strong></td>
                        <td class="text-center">{{ number_format($totalArea, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
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
                ]
            });
        });
    </script>
</body>

</html>
