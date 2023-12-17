<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Allowance added!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif

    <div class="container">
        <button class="btn btn-primary text-center">
            <a href="{{ route('attendence.index') }}" class="text-white text-decoration-none">←</a>
        </button>
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Deposits</h1><br>
            </div>
        </div>

        <!-- Table with Edit Column -->
        <div class="table-responsive">
            <table id="depositsTable" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>SR</th>
                        <th>Employee</th>
                        <th>Portfolio</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($Employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->name }}</td>
                            <td class="@if ($employee->amount_portfolio < 0) text-danger @else text-success @endif">
                                <b>{{'₹ '. number_format(round(abs($employee->amount_portfolio))) }}</b>
                            </td>

                            <td>
                                <button class="btn" data-toggle="modal"
                                    data-target="{{ '#exampleModal' . $employee->id }}"><i class="fas fa-plus"></i></button>
                            </td>

                            <!-- Modal for Adding Employee -->
                            <div class="modal fade" id="{{ 'exampleModal' . $employee->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ $employee->name }}'s Allowance
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('Post_deposits', ['id' => $employee->id]) }}"
                                                method="POST">
                                                @csrf

                                                <div class="mb-3">
                                                    <h3
                                                        class="text-center @if ($employee->amount_portfolio < 0) text-danger @else text-success @endif">
                                                        {{ abs($employee->amount_portfolio) }}
                                                    </h3>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="amount" class="form-label">Deposits</label>
                                                    <input type="number" class="form-control" id="amount" name="amount"
                                                        placeholder="Write the amount..">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="message" class="form-label">Message</label>
                                                    <textarea class="form-control" id="message" name="message"
                                                        >I Deposited</textarea>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Font Awesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>
