<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            font-family: 'Arial', sans-serif;
            color: #333;
            overflow: hidden;
            position: relative;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
            z-index: 2;
            position: relative;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-container h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
            color: #444;
        }
        .form-control {
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 10px 40px; /* Padding untuk ikon kiri dan kanan */
            border: 1px solid #ddd;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus {
            border-color: #6c5ce7;
            box-shadow: 0 0 8px rgba(108, 92, 231, 0.3);
        }
        .btn-primary {
            width: 100%;
            border-radius: 5px;
            background-color: #6c5ce7;
            border: none;
            padding: 10px;
            font-size: 1rem;
            color: #fff;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn-primary:hover {
            background-color: #5a4ad1;
            transform: translateY(-2px);
        }
        .btn-primary:active {
            transform: translateY(0);
        }
        .input-icon {
            position: relative;
        }
        .input-icon i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
        }
        .input-icon i.fa-eye,
        .input-icon i.fa-eye-slash {
            left: auto;
            right: 10px;
            cursor: pointer;
        }
        .input-icon i.fa-eye:hover,
        .input-icon i.fa-eye-slash:hover {
            color: #6c5ce7;
        }
        .alert-danger {
            background-color: #ffebee;
            border-color: #ffcdd2;
            color: #c62828;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .alert-danger ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <!-- Container Login -->
    <div class="login-container">
        <h1>Login</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-icon">
                <i class="fas fa-user"></i>
                <input type="text" name="identifier" id="identifier" class="form-control" placeholder="Masukan NIP">
            </div>
            <div class="input-icon">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
                <i class="fas fa-eye password-toggle" id="togglePassword"></i>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script>
        // JavaScript untuk toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            // Toggle type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>