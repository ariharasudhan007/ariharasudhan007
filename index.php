<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Add your CSS styles for the page here */
        body {
            font-family: Arial, sans-serif;
            background-color: #4287f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            padding: 20px;
            width: 90%;
            max-width: 350px;
            text-align: center;
            animation: fade 0.6s ease-in-out;
        }

        @keyframes fade {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: #4287f5;
        }

        label {
            display: block;
            text-align: left;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #4287f5;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #3661b3;
        }

        @media (max-width: 768px) {
            .login-container {
                width: 90%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="login-container"> 
	<h2>Welcome to Jayam Hospital</h2>
        <form action="login.php" method="post">
            <?php if (isset($_GET['error'])) { ?>
                <p style="color: red;"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label for="uname">User Name</label>
            <input type="text" name="uname" placeholder="User Name" required>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
