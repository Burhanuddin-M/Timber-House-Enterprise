<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Bootstrap Form in Table</title>
    <style>
       
        /* Add some additional styling for better mobile display */
        body {
            padding-top: 20px;
        }

        .container {
            max-width: 800px;
            /* Set a maximum width for better readability on larger screens */
        }

        table {
            width: 100%;
        }

        input[type="number"] {
            width: 100%;
            box-sizing: border-box;
        }

        /* Add media query for small screens */
        @media only screen and (max-width: 600px) {
            .form-row {
                flex-direction: column;
            }

            input[type="number"] {
                margin-bottom: 10px;
            }

            #name,
            #place {
                width: 100%;
                /* Display "Name" and "Place" in one row on mobile */
            }
        }
    </style>
</head>

<body>
    <!-- Back button -->
    <a href="{{ route('calculator.index') }}" class="btn btn-primary">Back</a>

    <form action="{{ route('calculate') }}" method="POST" id="myForm">
        @csrf
        <div class="container mt-3">
            <h3 class="text-center text-primary">
                {{ \Carbon\Carbon::now()->format('jS F Y') }}
            </h3><br>

            <div class="form-row mb-3">
                <div class="form-group col-12 col-md-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                required>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="place" id="place" placeholder="Place"
                                required>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="text-center">L</th>
                        <th class="text-center">B</th>
                        <th class="text-center">W</th>
                        <th class="text-center" colspan="2">action</th>
                    </tr>
                </thead>    
                <tbody id="dataTable">
                    <!-- Existing rows or dynamically added rows will go here -->
                </tbody>
            </table>

            <script>
                var serialNumber = 1;

                function addRow() {
                    var dataTable = document.getElementById('dataTable');
                    var newRow = document.createElement('tr');
                    newRow.innerHTML = `
          <td>${serialNumber}</td>
          <td><input class="form-control"  type="number" name="length[]" placeholder="" required></td>
          <td><input class="form-control" type="number" name="breadth[]" placeholder="" required></td>
          <td><input class="form-control" type="number" name="width[]" placeholder="" required></td>
          <td>
            <button type="button" class="btn btn-sm btn-success btn-block" onclick="saveRow(this)">Save</button>
            </td>
            <td>

                <button type="button" class="btn btn-sm btn-danger btn-block" onclick="deleteRow(this)">
    <i class="fas fa-trash-alt"></i> 🗑
</button>

                </td>
        `;
                    dataTable.appendChild(newRow);
                    serialNumber++;
                }

                function saveRow(button) {
                    var row = button.closest('tr');
                    var inputs = row.getElementsByTagName('input');
                    var saveButton = row.querySelector('.btn-success');
                    var deleteButton = row.querySelector('.btn-danger');

                    // Check if any input field in the row has a value
                    var hasContent = Array.from(inputs).some(input => input.value.trim() !== '');

                    if (hasContent) {
                        if (saveButton.innerText === 'Save') {
                            // If it's the first save, add a new row for the next entry
                            addRow();
                        }

                        for (var i = 0; i < inputs.length; i++) {
                            inputs[i].disabled = !inputs[i].disabled;
                        }

                        saveButton.innerText = 'E';
                        deleteButton.style.display = 'block';
                    } else {
                        alert('Please enter data in the row before saving.');
                    }
                }

                function deleteRow(button) {
                    var row = button.closest('tr');
                    row.remove();
                }

                // Initial row
                addRow();
            </script>

            <div class="form-group text-center mt-3">
                <button type="button" class="btn btn-success" onclick="prepareAndSubmit()">Calculate</button>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function prepareAndSubmit() {
            // Enable all inputs before submitting the form
            enableAllInputs();

            // Submit the form
            document.getElementById('myForm').submit();
        }

        function enableAllInputs() {
            var dataTable = document.getElementById('dataTable');
            var rows = dataTable.getElementsByTagName('tr');

            for (var i = 0; i < rows.length; i++) {
                var inputs = rows[i].getElementsByTagName('input');
                for (var j = 0; j < inputs.length; j++) {
                    inputs[j].disabled = false;
                }
            }
        }
    </script>

</body>

</html>
