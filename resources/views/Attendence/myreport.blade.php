<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports of the Employee</title>

    <!-- Include necessary stylesheets and scripts here -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap4.min.css">

    <!-- Add additional styles for color and animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            padding-top: 20px;
            font-size: 14px;
            background-color: #f8f9fa; /* Light gray background */
        }

        .container {
            padding: 20px;
            overflow-x: auto;
            /* Enable horizontal scroll on small screens */
            background-color: #ffffff; /* White container background */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle lift */
        }

        h2 {
            margin-bottom: 20px;
            color: #007bff; /* Blue header text */
        }

        table {
            width: 100%;
            margin-top: 20px;
            /* Add spacing on top of the table */
            border-collapse: collapse;
        }

        th,
        td {
            text-align: center;
            padding: 8px;
            border: 1px solid #ddd;
            /* Add borders to cells */
            background-color: #ffffff; /* White cell background */
        }

        .table-responsive {
            overflow-x: auto;
        }

        .dt-buttons {
            margin-top: 20px;
        }

        .btn-pdf,
        .btn-print,
        .btn-primary {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            background-color: #28a745; /* Green button background */
            color: #ffffff; /* White button text */
            border: 1px solid #218838; /* Darker green border */
            transition: background-color 0.3s ease;
        }

        .btn-pdf:hover,
        .btn-print:hover,
        .btn-primary:hover {
            background-color: #218838; /* Darker green on hover */
        }

        @media only screen and (max-width: 600px) {
            /* Add specific styles for smaller screens */
            th,
            td {
                font-size: 12px;
            }

            .btn-pdf,
            .btn-print,
            .btn-primary {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <div class="container animated fadeIn"> <!-- Adding fadeIn animation class -->
        <h2 class="text-center">{{ $employeeData->name }}'s Report</h2>
        <div class="table-responsive">
            <table id="example" class="display nowrap">
                <thead>
                    <tr>
                        <th class="text-center">Date</th>
                        <th class="text-center">Present</th>
                        <th class="text-center">Overtime</th>
                        <th class="text-center">Withdraw</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        use Carbon\Carbon;
                        $temp_date = $start_date;
                        $cross = '<div>&#10060</div>';
                    @endphp

                    @while ($temp_date->lessThanOrEqualTo($end_date) && $temp_date->lessThanOrEqualTo(Carbon::now()))
                        <tr>
                            @if (count($attendance) > 0)
                                @if ($temp_date->equalTo(Carbon::parse($attendance[0]['date'])))
                                    <td>{{ Carbon::parse($attendance[0]['date'])->format('jS M Y') }}</td>
                                    <td class="fw-bold">
                                        @if ($attendance[0]['is_half_day'] == 1)
                                            1/2
                                        @else
                                            {{ $attendance[0]['type'] == 'PRESENT' ? 'P' : 'A' }}
                                        @endif
                                    </td>
                                    <td>{{ $attendance[0]['extra_hours'] }}</td>
                                    {{-- <td>{{ $attendance[0]['total_amount'] }}</td> --}}
                                    <td>
                                        @php
                                            $withdrawForDate = $date_withdraw
                                                ->filter(function ($item) use ($temp_date) {
                                                    return Carbon::parse($item->created_at)->isSameDay($temp_date);
                                                })
                                                ->first();
                                        @endphp
                                        @if ($withdrawForDate)
                                            {{ $withdrawForDate->amount }}
                                        @else
                                            -
                                        @endif
                                    </td>

                                    @php
                                        array_shift($attendance);
                                    @endphp
                                @else
                                    <td>{{ Carbon::parse($temp_date)->format('jS M Y') }}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                @endif
                            @else
                                <td>{{ Carbon::parse($temp_date)->format('jS M Y') }}</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            @endif
                        </tr>
                        @php
                            $temp_date = $temp_date->addDay();
                        @endphp
                    @endwhile
                </tbody>

                <tfoot>
                    <tr>
                        <td class="text-center @if ($employeeData->amount_portfolio < 0) text-danger @else text-success @endif">
                            <h5>({{ '₹ ' . number_format(round($employeeData->amount_portfolio)) }})</h5>
                        </td>
                        <td class="text-center"><b>{{ $total_present }}</b></td>
                        <td class="text-center"><b>{{ $total_overtime }}</b></td>
                        <td class="text-center"><b>{{ $total_withdraw }}</b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Include necessary scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
</body>

</html>
