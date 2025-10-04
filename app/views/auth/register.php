<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
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

    .register {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      width: 350px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .register h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .register .inputBox {
      position: relative;
      margin-bottom: 15px;
    }

    .register .inputBox input {
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

    .register button {
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

    .register button:hover {
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
  </style>
</head>
<body>
  <div class="register">
    <h2>Register</h2>
    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <div class="inputBox">
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="inputBox">
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <div class="inputBox">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="inputBox">
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <button type="submit">Register</button>
    </form>

    <div class="group">
      <p style="font-size: 0.9em;">
        Already have an account? <a href="<?= site_url('/auth/login'); ?>">Login here</a>
      </p>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>
