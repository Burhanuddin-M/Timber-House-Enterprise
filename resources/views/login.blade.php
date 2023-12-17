<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-color: #f0f5ff;
        }

        .login-container {
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            margin: auto;
            animation: fadeIn 1s ease-in-out;
        }

        .login-form {
            padding: 20px;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #0077cc;
            text-align: center;
            animation: slideIn 1s ease-in-out;
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-label {
            font-size: 14px;
            color: #495057;
            animation: fadeIn 1s ease-in-out;
        }

        .form-control {
            height: 40px;
            font-size: 16px;
            background-color: #edf2fb;
            border-color: #aed4fb;
            color: #495057;
            animation: fadeIn 1s ease-in-out;
        }

        .btn-primary,
        .btn-danger {
            width: 100%;
            height: 40px;
            font-size: 16px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary {
            background-color: #0077cc;
            border-color: #0077cc;
        }

        .btn-danger {
            background-color: #ff6b6b;
            border-color: #ff6b6b;
        }

        .btn-primary:hover {
            background-color: #005b99;
        }

        .btn-danger:hover {
            background-color: #e74a4a;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
    </style>

    <title>Timber House Enterprise</title>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 login-container">
                <div class="login-form">
                    <h1>Login to Timber House Enterprise</h1>
                    <form action="{{ route('Login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Password" class="form-label">Enter Your Password</label>
                            <input type="password" class="form-control" name="password" required>
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="btn-group">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
