<?php

session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

$error = $_SESSION['login-error'] ?? '';
$success = $_SESSION['login-success'] ?? '';

unset($_SESSION['login-error']);
unset($_SESSION['login-success']);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pio De Roda - Login</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="page-container">
      <div class="auth-box">
        <div class="logo">
          <img src="piologo.png" alt="Pio De Roda Logo" />
        </div>
        <div class="brand">
          <h1>PIO DE RODA</h1>
          <p>Inventory & Sales Management System</p>
          <h3>Login to Your Account</h3>
        </div>

        <?php if (!empty($error)) : ?>
        <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?> <?php if (!empty($success)) : ?>
        <div class="success-message">
          <?php echo htmlspecialchars($success); ?>
        </div>
        <?php endif; ?>

        <form action="login-process.php" method="POST">
          <div class="form-group">
            <label for="role">Select Role:</label>
            <select id="role" name="role" required>
              <option value="">--Select Role--</option>
              <option value="admin">Owner/Manager</option>
              <option value="user">Cashier/Barista</option>
            </select>
          </div>
          <div class="form-group">
            <label for="username">Username:</label>
            <input
              type="text"
              id="username"
              name="username"
              placeholder="Enter your username"
              autocomplete="username"
              required
            />
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Enter your password"
              autocomplete="current-password"
              required
            />
          </div>
          <button type="submit" class="btn">Login</button>
        </form>
        <div class="register-link">
          <p>
            Don't have an account? <a href="register.php">Register here</a>
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
