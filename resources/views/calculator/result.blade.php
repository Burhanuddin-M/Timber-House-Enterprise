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
            /* padding-top: 20px; */
            font-size: 14px;
            background-color: #f8f9fa;
            color: #495057;
        }

        .container {
            /* padding: 20px; */
            overflow-x: auto;
            /* background-color: #ffffff; */
            /* border-radius: 10px; */
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        }

       

        th, td {
            text-align: center;
            padding: 8px;
            border: 1px solid #ddd;
            background-color: #ffffff;
        }

        .table-responsive {
            margin-top: 20px;
        }

        @media only screen and (max-width: 600px) {
            body {
                /* padding-top: 10px; */
                font-size: 12px;
            }

            .container {
                /* padding: 10px; */
            }

        

            th, td {
                font-size: 10px;
                padding: 6px;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        @if(!$name == '' && !$place == '')

        <h3 class="text-center">
            {{ $name }} at {{ $place }}
        </h3>
        @endif
        <div class="table-responsive">
            <table id="resultTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Length</th>
                        <th>Breadth</th>
                        <th>Width</th>
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
                        <td class="text-center"><strong style="font-size:12px;" class="text-center">{{ number_format($totalArea, 2) }}</strong></td>
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
            var table = $('#resultTable').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('color', '#777');
                            $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                        }
                    }
                ],
                searching: false,
                paging: false,
                info: false,
                ordering:false
            });
        });
    </script>
</body>

</html>
