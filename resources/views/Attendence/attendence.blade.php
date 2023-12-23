<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-light"><br>

    <div class="container">
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary">
                <a href="{{ route('attendence.index') }}" class="text-white text-decoration-none">←</a>
            </button>
            <div class="text-center">
                <h1>{{ \Carbon\Carbon::now()->format('jS F') }} Attendance</h3>
            </div>
        </div><br>

        @if (session('success'))
            <script>
                Swal.fire({
                    title: "Marked!",
                    text: "{{ session('success') }}",
                    icon: "success"
                });
            </script>
        @endif

        <!-- Table with Edit Column -->
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Name</th>
                        <th>{{ \Carbon\Carbon::now()->format('jS') }}</th>
                        <th class="halfday-header" style="display:none;">Half Day</th>
                        <th class="overtime-header" style="display:none;">Overtime</th>
                        <th class="withdraw-header" style="display:none;">Withdraw</th>
                        <th>Submit</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($employees as $employee)
                        <form action="{{ route('attendencePost', ['id' => $employee->id]) }}" method="POST"
                            id="myForm">
                            @csrf
                            <input type="hidden" name="name" value="{{ $employee->name }}">
                            <tr>
                                <td>
                                    @if (count($employee->attendance) > 0)
                                        ✅
                                    @else
                                        ❌
                                    @endif
                                </td>
                                <td>

                                    @if (count($employee->attendance) > 0)
                                        @if ($employee->attendance[0]->type == 'PRESENT')
                                            {{ $employee->name }}
                                        @else
                                            {{ $employee->name }}
                                        @endif
                                    @else
                                        {{ $employee->name }}
                                    @endif
                                </td>

                                <td>
                                    @if (!(count($employee->attendance) > 0))
                                        <div class="form-check form-switch">
                                            <input class="form-check-input attendance-switch" type="checkbox"
                                                name="attendance" value="absent"
                                                id="attendanceSwitch_{{ $loop->index }}">
                                            <label class="form-check-label"
                                                for="attendanceSwitch_{{ $loop->index }}">Absent</label>
                                        </div>
                                    @else
                                        @if ($employee->attendance[0]->type == 'PRESENT')
                                            <p class="text-success">Present</p>
                                        @else
                                            <p class="text-danger">Absent</p>
                                        @endif
                                    @endif
                                </td>

                                <td class="halfday-row" style="display:none;">
                                    @if ($CanHalfDay->contains($employee) && $employee->attendance->where('is_half_day', 1)->count() < 2)
                                    <div class="form-check form-halfday d-inline-block">
                                        <input class="form-check-input attendance-halfday" type="checkbox"
                                            name="is_half_day" value="1"
                                            id="attendanceSwitch_{{ $loop->index }}">
                                        <label class="form-check-label"
                                            for="attendanceHalfday_{{ $loop->index }}"></label>
                                    </div>
                                    @else
                                        <p>NA</p>
                                    @endif
                                </td>
                                
                                <td class="overtime-row" style="display:none;">
                                    <select class="form-select form-select-sm" id="numberSelect" name="hours">
                                        @for ($i = 0; $i <= 6; $i++)
                                            <option name="hour">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                                <td class="withdraw-row" style="display:none;">
                                    <select class="form-select form-select-sm" id="amount" name="withdraw">
                                        @for ($value = 0; $value <= 100000; $value += 1000)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endfor
                                    </select>
                                </td>
                                
                                <td>
                                    @if (!(count($employee->attendance) > 0))
                                        <button type="submit" class="btn btn-sm bg-primary text-white">Save</button>
                                    @endif

                                </td>

                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add more edit modals as needed -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- Font Awesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let switches = document.querySelectorAll('.attendance-switch');
            let overtimeHeader = document.querySelector('.overtime-header');
            let withdrawHeader = document.querySelector('.withdraw-header');

            switches.forEach(function(switchElem) {
                // Set the initial state to "Absent"
                switchElem.checked = false;
                switchElem.parentElement.classList.add('text-danger');
                switchElem.parentElement.classList.remove('text-success');

                updateRowVisibility(switchElem);

                switchElem.addEventListener('change', function() {
                    let label = switchElem.nextElementSibling; // Get the label element
                    let overtimeRow = switchElem.closest('tr').querySelector('.overtime-row');
                    let withdrawRow = switchElem.closest('tr').querySelector('.withdraw-row');

                    if (switchElem.checked) {
                        label.innerText = 'Present';
                        switchElem.parentElement.classList.remove('text-danger');
                        switchElem.parentElement.classList.add('text-success');
                        overtimeRow.style.display = 'table-cell';
                        withdrawRow.style.display = 'table-cell';
                        overtimeHeader.style.display = 'table-cell';
                        withdrawHeader.style.display = 'table-cell';
                    } else {
                        label.innerText = 'Absent';
                        switchElem.parentElement.classList.remove('text-success');
                        switchElem.parentElement.classList.add('text-danger');
                        overtimeRow.style.display = 'none';
                        withdrawRow.style.display = 'none';
                        overtimeHeader.style.display = 'none';
                        withdrawHeader.style.display = 'none';
                    }

                    updateRowVisibility(switchElem);
                });
            });

            function updateRowVisibility(switchElem) {
                let halfDayRow = switchElem.closest('tr').querySelector('.halfday-row');
                let halfDayHeader = document.querySelector('.halfday-header');

                if (switchElem.checked) {
                    halfDayRow.style.display = 'table-row';
                    halfDayHeader.style.display = 'table-cell';
                } else {
                    halfDayRow.style.display = 'none';
                    halfDayHeader.style.display = 'none';
                }
            }
        });
    </script>
</body>

</html>
