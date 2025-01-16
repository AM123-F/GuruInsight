<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #6a11cb, #2575fc);
            overflow: hidden;
        }
        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        .background-animation span {
            position: absolute;
            display: block;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: animate 15s linear infinite;
        }
        .background-animation span:nth-child(1) {
            top: 20%;
            left: 15%;
            animation-delay: 0s;
        }
        .background-animation span:nth-child(2) {
            top: 50%;
            left: 60%;
            animation-delay: 3s;
        }
        .background-animation span:nth-child(3) {
            top: 70%;
            left: 30%;
            animation-delay: 6s;
        }
        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0);
                opacity: 1;
            }
            100% {
                transform: translateY(-1000px) rotate(360deg);
                opacity: 0;
            }
        }
        .login-container {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .login-container h1 {
            font-size: 2rem;
            color: #343a40;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-group {
            position: relative;
            margin-bottom: 20px;
        }
        .form-control {
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            padding-left: 40px;
            font-size: 0.95rem;
            background: #f7f7f7;
        }
        .form-control:focus {
            background: #ffffff;
            border: 2px solid #2575fc;
            outline: none;
        }
        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        .btn-primary {
            background: linear-gradient(120deg, #6a11cb, #2575fc);
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: #ffffff;
            transition: all 0.3s ease-in-out;
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(42, 112, 245, 0.4);
        }
        .forgot-password {
            font-size: 0.85rem;
            margin-top: 10px;
        }
        .forgot-password a {
            text-decoration: none;
            color: #2575fc;
        }
        .forgot-password a:hover {
            color: #6a11cb;
            text-decoration: underline;
        }
        .footer-text {
            margin-top: 20px;
            font-size: 0.85rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="background-animation">
        <span></span>
        <span></span>
        <span></span>
    </div>
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
            <div class="form-group">
                <i class="bi bi-person form-icon"></i>
                <input type="text" name="identifier" id="identifier" class="form-control" placeholder="Masukan NIP">
            </div>
            <div class="form-group">
                <i class="bi bi-lock form-icon"></i>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
