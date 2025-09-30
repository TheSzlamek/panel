<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja Strona</title>
    <style>
        /* Reset podstawowy */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(to bottom right, #2c3e50, #4ca1af);
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: rgba(0,0,0,0.5);
            padding: 20px;
            text-align: center;
            font-size: 2em;
            font-weight: bold;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        main h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        main p {
            font-size: 1.2em;
            max-width: 600px;
            margin-bottom: 30px;
        }

        .button {
            background-color: #e74c3c;
            color: #fff;
            padding: 15px 30px;
            font-size: 1em;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #c0392b;
        }

        footer {
            background-color: rgba(0,0,0,0.5);
            text-align: center;
            padding: 15px;
        }
    </style>
</head>
<body>
    <header>
        Moja Strona
    </header>

    <main>
        <h1>Witaj na stronie!</h1>
        <p>To jest przykładowa strona z HTML i CSS. Możesz tu dodać dowolne treści, sekcje, obrazy, formularze lub przyciski.</p>
        <a href="#" class="button">Kliknij mnie</a>
    </main>

    <footer>
        © 2025 Moja Strona. Wszelkie prawa zastrzeżone.
    </footer>
</body>
</html>


