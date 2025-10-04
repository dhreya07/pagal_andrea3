<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
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
        .input-field:focus, .select-field:focus {
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
            <p class="text-gray-600 text-lg font-semibold">Update Page</p>
        </div>
        
        <form action="<?=site_url('users/update/'.segment(4));?>" method="post" class="space-y-4">
            <div>
                <label for="firstname" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                <input type="text" id="firstname" name="firstname" value="<?= html_escape($user['firstname']); ?>"
                       class="input-field w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500" 
                       placeholder="Enter your first name" required>
            </div>

            <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                <input type="text" id="lastname" name="lastname" value="<?= html_escape($user['lastname']); ?>"
                       class="input-field w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500" 
                       placeholder="Enter your last name" required>
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" name="email" value="<?= html_escape($user['email']); ?>"
                       class="input-field w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500" 
                       placeholder="Enter your email" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" 
                       class="input-field w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500" 
                       placeholder="Enter new password (leave blank to keep current)">
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select id="role" name="role" 
                        class="select-field w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500">
                    <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
                    <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                </select>
            </div>

            <button type="submit" 
                    class="btn-submit w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Update
            </button>
        </form>
    </div>
</body>
</html>
