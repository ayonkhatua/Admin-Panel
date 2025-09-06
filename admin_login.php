<?php
session_start();

// Agar already login hai to direct admin panel me bhej do
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    header("Location: admin.html");
    exit;
}

// File se password load karo
$correctPass = trim(file_get_contents("admin_pass.txt"));

// Agar form submit hua to check karo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['admin_pass'] ?? '';

    if ($password === $correctPass) {
        $_SESSION['admin'] = true;
        header("Location: admin.html");
        exit;
    } else {
        $error = "❌ Wrong password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #16cfc9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
      width: 300px;
    }
    input {
      padding: 10px;
      width: 80%;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
      text-align: center;
      font-size: 16px;
    }
    button {
      padding: 10px 20px;
      background: #2575fc;
      border: none;
      border-radius: 5px;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background: #1a5edb;
    }
    .error {
      color: red;
      font-size: 14px;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="box">
    <h3>🔑 Admin Login</h3>
    <form method="POST">
      <input type="password" name="admin_pass" placeholder="Enter Admin Password" required>
      <br>
      <button type="submit">Login</button>
    </form>
    <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
  </div>
</body>
</html>
