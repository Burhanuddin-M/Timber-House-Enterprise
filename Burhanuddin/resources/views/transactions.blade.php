<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee's Master Table</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">

    <!-- Use the slim version of jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</head>

<style>
    div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
</style>

<body class="bg-light"><br>

    <div class="container">
        <button class="btn btn-primary text-center">
            <a href="{{ route('attendence.index') }}" class="text-white text-decoration-none">←</a>
        </button>
        <div class="text-center mb-4">
            <table class="table table-bordered">
                <tr>
                    <td colspan="4" class="text-center"><b>Today: {{ \Carbon\Carbon::now()->format('jS F') }}</b></td>
                </tr>
                <tr>
                    <th>Given</th>
                    <th>Received</th>
                    <th>Portfolio</th>
                </tr>
                <tr>
                    <td class="text-danger font-weight-bold"><h5>{{'₹ '. number_format(round($DebitsAmount)) }}</h5></td>
                    <td class="text-success font-weight-bold"><h5>{{'₹ '. number_format(round($CreditsAmount)) }}</h5></td>
                    <td class="{{ $Portfolio < 0 ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' }}">
                        <h5>{{ '₹ '.number_format(round(abs($Portfolio))) }}</h5>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Customize Date Button -->
        <div class="row justify-content-center">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#customDateModal">
                Customize Date
            </button>
        </div>

        <!-- Modal -->
        <div class="modal" id="customDateModal" tabindex="-1" role="dialog" aria-labelledby="customDateModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customDateModalLabel">Customize Date</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Custom Date Form -->
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" id="start_date" name="start_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">End Date:</label>
                                        <input type="date" id="end_date" name="end_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mt-3">Fetch Data</button>
                        </form>
                        <!-- End Custom Date Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <br>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Time</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->Employee->name }}</td>
                            <td>
                                @if ($transaction->type == 'DEBIT')
                                    <b class="text-danger">{{'₹ '. number_format(round($transaction->amount))}}</b>
                                @elseif($transaction->type == 'CREDIT')
                                    <b class="text-primary">{{'₹ '. number_format(round($transaction->amount)) }}</b>
                                @else
                                    <b class="text-success">{{'₹ '. number_format(round($transaction->amount))}}</b>
                                @endif
                            </td>
                            <td>{{ $transaction->created_at->diffForHumans() }}</td>
                            <td>{{ $transaction->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var dataTable = $('#example').DataTable({
                responsive: true,
                columnDefs: [{
                    targets: [0, 3],
                    orderable: false
                }],
                order: []
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
