<?php
require_once 'tripcode/tripcode.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inferno - Tripcode System</title>
    <link rel="stylesheet" href="style/style.css">
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
    <pre>
       T
     .-"-.
    |  ___|
    | (.\/.)
    |  ,,,'   Inferno - Tripcode System
    | '###
     '----'
    </pre>
    <h2>Parameter</h2>
    <p>Key information</p>
    <?php echo "<p>Secret key: <strong>" . htmlspecialchars(SECRET_KEY) . "</strong></p>"; ?>
    <hr>
    <h2>Session Information</h2>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post" action="">
        <div style="display: flex; gap: 10px;">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
        </div>
        <button type="button" id="togglePassword" onclick="togglePasswordVisibility()">Show Password</button>
        <button type="submit">Generate Tripcode</button>
    </form>
    <hr>
    <h2>Generated</h2>
    <table>
        <tr>
            <th>Username</th>
            <th>Tripcode</th>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($username); ?></td>
            <td><?php echo htmlspecialchars($tripcode); ?></td>
        </tr>
    </table>
</body>
</html>