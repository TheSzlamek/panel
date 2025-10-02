<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #1e1e1e;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #2a2a2a;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.6);
            text-align: center;
            width: 350px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #f44336;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background: #e53935;
        }
    </style>
</head>
<body onload="checkLogin()">
    <div class="container">
        <h2>Panel</h2>
        <p>Witaj! Jesteś zalogowany.</p>
        <button onclick="logout()">Wyloguj</button>
    </div>

    <script>
        function checkLogin() {
            if (localStorage.getItem("logged") !== "true") {
                window.location.href = "login.html";
            }
        }

        function logout() {
            localStorage.removeItem("logged");
            window.location.href = "login.html";
        }
    </script>
</body>
</html>





