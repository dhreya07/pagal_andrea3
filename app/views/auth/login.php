<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Font Awesome for eye icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #f5f5f5;
    }

    .login {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      width: 350px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .login h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .login .inputBox {
      position: relative;
      margin-bottom: 15px;
    }

    .login .inputBox input {
      width: 100%;
      padding: 12px 40px 12px 12px;
      font-size: 1em;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .toggle-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #666;
    }

    .login button {
      width: 100%;
      padding: 12px;
      border: none;
      background: #8f2c24;
      color: #fff;
      font-size: 1em;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }

    .login button:hover {
      background: #d64c42;
    }

    .group {
      margin-top: 15px;
      text-align: center;
    }

    .group a {
      color: #8f2c24;
      text-decoration: none;
    }

    .group a:hover {
      text-decoration: underline;
    }

    .error-box {
      background: rgba(255,0,0,0.1);
      color: #d64c42;
      padding: 10px;
      border: 1px solid #d64c42;
      border-radius: 5px;
      margin-bottom: 15px;
      text-align: center;
      font-size: 0.9em;
    }
  </style>
</head>
<body>
  <div class="login">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="inputBox">
        <input type="text" placeholder="First Name" name="firstname" required>
      </div>

      <div class="inputBox">
        <input type="text" placeholder="Last Name" name="lastname" required>
      </div>

      <div class="inputBox">
        <input type="password" placeholder="Password" name="password" id="password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit">Login</button>
    </form>

    <div class="group">
      <p style="font-size: 0.9em;">
        Don't have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a>
      </p>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
