<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .login-container {
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            width: 100%;
            max-width: 350px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .login-container h1 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            text-align: center;
            color: #555;
        }
        .form-control {
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .btn-primary {
            width: 100%;
            border-radius: 4px;
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .footer-text {
            margin-top: 15px;
            font-size: 0.85rem;
            text-align: center;
        }
        .footer-text a {
            color: #007bff;
            text-decoration: none;
        }
        .footer-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="text" name="identifier" id="identifier" class="form-control" placeholder="Masukan NIP">
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="footer-text">
            {{-- <p>Belum punya akun? <a href="#">Daftar</a></p> --}}
        </div>
    </div>
</body>
</html>
