<?php

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$error = $_SESSION['register_error'] ?? '';

$success = $_SESSION['register_success'] ?? '';

unset($_SESSION['register_error'], $_SESSION['register_success']);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pio De Roda - Register</title>
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
          <h4>Create an Account</h4>
        </div>
        <form action="reg-process.php" method="POST">
          <div class="form-group">
            <select name="role" id="role" required>
              <option value="">--Select Role--</option>
              <option value="admin">Owner/Manager</option>
              <option value="user">Cashier/Barista</option>
            </select>
          </div>
          <div class="form-group">
            <label for="username">Username:</label>
            <input
              type="text"
              name="username"
              id="username"
              placeholder="Create Username"
              autocomplete="username"
              required
            />
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Create Password"
              autocomplete="new-password"
              required
            />
          </div>
          <div class="form-group">
            <label for="confirm-password">Confirm Password:</label>
            <input
              type="password"
              name="confirm-password"
              id="confirm-password"
              placeholder="Confirm Password"
              autocomplete="new-password"
              required
            />
          </div>
          <button type="submit" class="btn">Create Account</button>
        </form>
        <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?> <?php if ($success): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <div class="auto-footer">
          <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
      </div>
    </div>
  </body>
</html>
