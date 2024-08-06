<?php
require_once 'tripcode/tripcode.php';
require_once 'tripcode/account.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inferno - Tripcode System</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="img/logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/logo/favicon-16x16.png">
    <link rel="manifest" href="img/logo/site.webmanifest">
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const toggleButton = document.getElementById('togglePassword');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleButton.textContent = 'Hide Password';
            } else {
                passwordField.type = 'password';
                toggleButton.textContent = 'Show Password';
            }
        }
    </script>
</head>
<body>

<div class="container">
        <pre>
           T
         .-"-.
        |  ___|
        | (.\/.)
        |  ,,,'   Inferno - Tripcode System
        | '###
         '----'
        </pre>
    <h2>Session Information</h2>

    <?php if (!empty($errors)): ?>
        <ul class="error-list">
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post" action="">
        <div class="form-group">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>"
                       required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
        </div>
        <button type="button" id="togglePassword" onclick="togglePasswordVisibility()">Show Password</button>
        <button type="submit">Generate Tripcode</button>
    </form>
    <hr>
    <h2>Generated</h2>
    <?php if ($success): ?>
        <table class="result-table">
            <tr>
                <th>Username</th>
                <th>Tripcode</th>
                <th>Color</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($username); ?></td>
                <td><?php echo htmlspecialchars($tripcode); ?></td>
                <td style="background-color: <?php echo htmlspecialchars($color); ?>;"><?php echo htmlspecialchars($color); ?></td>
            </tr>
        </table>
    <?php endif; ?>
</div>

<div class="container">
    <p>Key information</p>
    <?php echo "<pre>Secret key: <strong>" . htmlspecialchars(SECRET_KEY) . "</strong></pre>"; ?>
</div>

<div class="container">
    <h2>Account Information</h2>
    <em>IP-based ID generation</em>
    <h2><?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <p>You are identified by your IP: <?php echo htmlspecialchars($ip); ?></p>
    <p>Login Time: <?php echo htmlspecialchars($_SESSION['login_time']); ?></p>
</div>

</body>
</html>