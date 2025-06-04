<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <style>
        body {
              padding: 10px;
            /*
            background: url('') no-repeat center center fixed; */
            /* Ganti dengan path foto Anda */
            background-size: cover;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.5);
            /* Memberi efek terawang */
            font-family: Arial, sans-serif;
            background-size: contain;
            /* max-width: 100%; */

        }



        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            /* min-height: 100vh; */
            margin: 0 auto 0px auto;

        }

        /* Tambah lebar saat tampilan desktop (min-width: 1024px) */
@media (min-width: 1024px) {
    .login-container {
        width: 400px;
    }
}


        .login-container img {
            max-width: 200px;
            height: auto;
            margin-bottom: 8apx;
        }


        .login-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #4267B2;
        }

        .login-container label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #4267B2;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #365899;
        }

        .login-container ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .login-container li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
        <div class="alert alert-danger mt-3" style="font-size: 14px;">
            Masukkan Username dan Password<br>(Menggunakan username & password)
        </div>
        {{-- <h1>Login</h1> --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        <form action="{{ route('login.admin') }}" method="POST">

            @csrf
            <ul>
                <li>
                    <label for="username">Username:</label>
                    <input type="text" name="email" id="username">
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </li>


                <li>
                    <button type="submit" name="login">Login</button>
                </li>

            </ul>
        </form>
           <script>
            document.querySelector('form').addEventListener('submit', function(e) {
                const loginButton = document.querySelector('button[type="submit"]');

                // Ubah isi tombol jadi loading spinner + teks
                loginButton.innerHTML =
                    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`;

                // Disable tombol agar tidak diklik dua kali
                loginButton.disabled = true;
            });
        </script>
    </div>
</body>

</html>
