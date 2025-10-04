<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-black via-slate-950 to-brown-900 min-h-screen flex items-center justify-center font-sans text-gray-200">

  <div class="bg-white/10 backdrop-blur-xl p-8 rounded-2xl shadow-2xl w-full max-w-md border border-purple-600/40">
    <h2 class="text-2xl font-semibold text-center text-purple-300 mb-6">Update Profile</h2>

    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-5">
      
      <div>
        <label class="block text-gray-300 mb-1 font-medium">First Name</label>
        <input type="text" name="first_name" value="<?= html_escape($user['first_name'])?>" required
               class="w-full px-4 py-3 bg-black/50 text-gray-100 border border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none transition">
      </div>

      <div>
        <label class="block text-gray-300 mb-1 font-medium">Last Name</label>
        <input type="text" name="last_name" value="<?= html_escape($user['last_name'])?>" required
               class="w-full px-4 py-3 bg-black/50 text-gray-100 border border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none transition">
      </div>

      <div>
        <label class="block text-gray-300 mb-1 font-medium">Email Address</label>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
               class="w-full px-4 py-3 bg-black/50 text-gray-100 border border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none transition">
      </div>

      <button type="submit"
              class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-medium py-3 rounded-lg shadow-lg transition duration-200">
        Update
      </button>
    </form>
  </div>
</body>
</html>
