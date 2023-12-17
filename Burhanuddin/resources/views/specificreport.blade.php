<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee's Master Table</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Use the slim version of jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</head>


<body><br>

    <div class="container">
        <button class="btn btn-primary text-center">
            <a href="{{ route('attendence.index') }}" class="text-white text-decoration-none">←</a>
        </button>

        <h2 class="text-center text-primary">{{ $MyEmployee->name }}'s Report</h2><br>

        <form action="{{ route('report.final', ['id' => $MyEmployee->id]) }}" method="GET">
            <div class="form-group">
                <label for="start_date">Select Month and Year:</label>
                <input type="month" id="start_date" name="date" class="form-control form-control-sm">
                <button type="submit" class="btn btn-primary btn-sm mt-4">Fetch Data</button>
            </div>
        </form>
        <br>

    


        {{-- <div id="responseDiv"></div> --}}

    </div>


    {{-- <script>
        function fetchData() {
            var employeeId = $('#employeeId').val(); // Assuming you have an input with the employee ID
            var formData = document.getElementById("start_date").value;
            $.ajax({
                url: '/myfinalreport/' + employeeId + '/' + formData, // Concatenate employeeId to the URL
                method: 'GET',
                success: function(response) {
                    $('#responseDiv').html(response);
                },
                error: function(error) {
                    console.error('Ajax request failed:', error);
                }
            });
        }
    </script> --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
