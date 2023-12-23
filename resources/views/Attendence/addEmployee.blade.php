@extends('layout.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
</head>

<body>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Added!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif

    <div class="container">
        <div class="row">
            <!-- Add Employee Button -->
            <div class="col-6 text-right ms-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Employee
                </button>
            </div>
        </div><br>

        <!-- Modal for Adding Employee -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('PostAddEmployee') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="employeeName" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter employee name"
                                    name="name">
                            </div>

                            <div class="mb-3">
                                <label for="employeeContact" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="contact_no"
                                    placeholder="Enter contact Number" name="contact_no">
                            </div>

                            <div class="mb-3">
                                <label for="employeeSalary" class="form-label">Employee Salary</label>
                                <input type="number" class="form-control" id="salary"
                                    placeholder="Enter employee salary" name="salary_per_day">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Beneficiary</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table with Edit Column -->
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Employee Name</th>
                        {{-- <th>Salary</th> --}}
                        <th>Edit</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($Employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->name }}</td>
                            {{-- <td>{{ $employee->salary_per_day }}</td> --}}
                            <td>
                                <button class="btn" data-bs-toggle="modal"
                                    data-bs-target="{{ '#editModal' . $employee->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <!-- Edit Modal (You may need to create similar modals for each row) -->
                            <div class="modal fade" id="{{ 'editModal' . $employee->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Employee Salary</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('PostEditEmployee', ['id' => $employee->id]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="name"
                                                        value="{{ $employee->name }}" name="name">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="contact" class="form-label">Contact No</label>
                                                    <input type="number" class="form-control" id="contact_no"
                                                        value="{{ $employee->contact_no }}" name="contact_no">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="salary" class="form-label">Salary Per Day</label>
                                                    <input type="number" class="form-control" id="salary"
                                                        value="{{ $employee->salary_per_day }}" name="salary_per_day">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap 5 dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- Font Awesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
@endsection
