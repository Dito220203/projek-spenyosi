<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {

            background: url('') no-repeat center center fixed;
            /* Ganti dengan path foto Anda */
            background-size: cover;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.5);
            /* Memberi efek terawang */
            font-family: Arial, sans-serif;
            background-size: contain;
            max-width: 100%;

        }


        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .login-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #4267B2;
        }

        .login-container label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-size: 14px;
            color: #333;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
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
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="siswa" method="POST">
            @csrf
            <ul>
                <li>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>
