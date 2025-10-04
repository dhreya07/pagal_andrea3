<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: url('https://images.unsplash.com/photo-1529070538774-1843cb3265df?auto=format&fit=crop&w=1920&q=80') 
        no-repeat center center fixed;
      background-size: cover;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center font-sans text-gray-100 relative">

  <!-- Overlay -->
  <div class="absolute inset-0 bg-gradient-to-br from-violet-900/70 via-black/70 to-blue-900/70"></div>

  <!-- Card Container -->
  <div class="relative w-full max-w-md p-8 rounded-2xl bg-white/10 backdrop-blur-lg shadow-2xl border border-white/20">

    <!-- Header -->
    <div class="flex flex-col items-center mb-8 text-center">
      <div class="bg-gradient-to-r from-violet-500 to-blue-500 rounded-full p-4 shadow-md">
        <i class="fa-solid fa-user-graduate text-white text-3xl"></i>
      </div>
      <h2 class="text-3xl font-bold text-white mt-4">Sign Up</h2>
      <p class="text-slate-300 text-sm mt-1">Start your journey with confidence</p>

    </div>

    <!-- Form -->
    <form action="<?=site_url('users/create')?>" method="POST" class="space-y-5">

      <!-- First Name -->
      <div>
        <label class="block text-slate-200 text-sm mb-1">First Name</label>
        <input type="text" name="first_name" placeholder="Enter your first name" required
               class="w-full px-4 py-3 bg-white/20 text-white border border-white/30 rounded-lg 
                      focus:ring-2 focus:ring-violet-400 focus:outline-none shadow-sm 
                      placeholder-slate-300">
      </div>

      <!-- Last Name -->
      <div>
        <label class="block text-slate-200 text-sm mb-1">Last Name</label>
        <input type="text" name="last_name" placeholder="Enter your last name" required
               class="w-full px-4 py-3 bg-white/20 text-white border border-white/30 rounded-lg 
                      focus:ring-2 focus:ring-violet-400 focus:outline-none shadow-sm 
                      placeholder-slate-300">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-slate-200 text-sm mb-1">Email Address</label>
        <input type="email" name="email" placeholder="Enter your email" required
               class="w-full px-4 py-3 bg-white/20 text-white border border-white/30 rounded-lg 
                      focus:ring-2 focus:ring-violet-400 focus:outline-none shadow-sm 
                      placeholder-slate-300">
      </div>

      <!-- Submit Button -->
      <button type="submit"
              class="w-full bg-gradient-to-r from-violet-500 to-blue-500 
                     hover:from-violet-600 hover:to-blue-600 text-white font-semibold 
                     py-3 rounded-lg shadow-lg transition-transform duration-300 
                     hover:scale-105 flex items-center justify-center gap-2">
        <i class="fa-solid fa-user-plus"></i> Sign Up
      </button>
    </form>
  </div>

</body>
</html>
