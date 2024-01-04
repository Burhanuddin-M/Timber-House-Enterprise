<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include DataTables CSS and Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">
    <title>Result</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Add any additional styles or scripts if needed -->
</head>

<body>

    <script>
        Swal.fire({
            title: "Calculated!",
            text: "Now, You can Download!",
            icon: "success"
        });
    </script>

    <div class="container mt-3">
        <br>
        <!-- Back button -->
        <a href="{{ url()->previous() }}" class="btn btn-primary">New</a>
        @if (!$name == '' && !$place == '')
            <h3 class="text-center">
                {{ $name }} at {{ $place }}
            </h3>
        @endif

        <br>

        <table id="resultTable" class="table table-striped table-bordered" style="width:100%">
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
                @foreach ($tableData as $data)
                    @if (!empty($data['length']) && !empty($data['breadth']) && !empty($data['width']))
                        <tr>
                            <td>{{ $data['serialNumber'] }}</td>
                            <td>{{ $data['length'] }}</td>
                            <td>{{ $data['breadth'] }}</td>
                            <td>{{ $data['width'] }}</td>
                            <td>{{ number_format($data['area'], 2) }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right">Answer</td>
                    <td class="text-center"><strong style="font-size:12px;"
                            class="text-center">{{ number_format($totalArea, 2) }}</strong></td>
                </tr>
            </tfoot>
        </table>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <!-- Include DataTables Buttons, JSZip, pdfmake, and buttons.html5 -->
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable without paging and search
            $('#resultTable').DataTable({
                paging: false,
                searching: false, // Disable search
                dom: 'Bfrtip',
                buttons: [
                    'pdf'
                ]
            });
        });
    </script>




    <!-- Add any additional scripts if needed -->
</body>

</html>
