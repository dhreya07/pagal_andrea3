<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .form-container {
      max-width: 400px;
      animation: fadeIn 0.5s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .input-field:focus {
      outline: none;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
    }
    .btn-submit:hover {
      transform: translateY(-2px);
      transition: all 0.2s ease;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center">
  <div class="form-container bg-white p-8 rounded-xl shadow-2xl w-full mx-4">
    <div class="text-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800 mb-2">Join Us Today</h1>
      <p class="text-gray-600">Create your account to get started</p>
    </div>

    <h2 class="text-xl font-semibold text-gray-700 mb-4">Create New User</h2>
    
    <form method="post" action="<?= site_url('users/create'); ?>" class="space-y-4">
      <!-- First Name -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
        <input type="text" name="firstname" required
               class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400">
      </div>

      <!-- Last Name -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
        <input type="text" name="lastname" required
               class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" required
               class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400">
      </div>

      <!-- Submit -->
      <button type="submit"
              class="btn-submit w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
        Create Account
      </button>
    </form>
  </div>
</body>
</html>
