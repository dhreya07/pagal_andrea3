<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?=base_url();?>public/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-black via-slate-950 to-brown-900 font-sans text-gray-200">

  <nav class="bg-gradient-to-r from-slate-900 to-brown-800 shadow-lg">
    <div class="max-w-7xl mx-auto px-6 py-4"></div>
  </nav>

  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white/10 backdrop-blur-xl shadow-2xl rounded-2xl p-6 border border-brown-700">
      
      <div class="flex justify-end mb-6">
        <a href="<?=site_url('users/create')?>"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-violet-600 to-purple-400 hover:from-violet-700 hover:to-purple-500 text-white font-semibold px-5 py-2 rounded-full shadow-md transition-all duration-300 hover:scale-105">
          <i class="fa-solid fa-user-plus"></i> Add New User
        </a>
      </div>

      <div class="overflow-x-auto rounded-2xl border border-brown-700 shadow">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-gradient-to-r from-brown-800 to-black text-white text-sm uppercase tracking-wide">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Lastname</th>
              <th class="py-3 px-4">Firstname</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody class="text-gray-300 text-sm">
            <?php foreach(html_escape($users) as $user): ?>
              <tr class="hover:bg-white/10 transition duration-200">
                <td class="py-3 px-4 font-medium"><?=($user['id']);?></td>
                <td class="py-3 px-4"><?=($user['last_name']);?></td>
                <td class="py-3 px-4"><?=($user['first_name']);?></td>
                <td class="py-3 px-4">
                  <span class="bg-violet-900 text-violet-200 text-sm font-semibold px-3 py-1 rounded-full">
                    <?=($user['email']);?>
                  </span>
                </td>
                <td class="py-3 px-4 flex justify-center gap-3">
                  <a href="<?=site_url('users/update/'.$user['id']);?>"
                     class="bg-gradient-to-r from-yellow-400 to-amber-500 hover:from-yellow-500 hover:to-amber-600 text-black font-semibold px-3 py-1 rounded-lg shadow flex items-center gap-1 transition duration-200">
                    <i class="fa-solid fa-pen-to-square"></i> Update
                  </a>
                  <a href="<?=site_url('users/delete/'.$user['id']);?>"
                     class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white px-3 py-1 rounded-lg shadow transition-all duration-300">
                    <i class="fa-solid fa-trash"></i> Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</body>
</html>