<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    * { margin:0; padding:0; box-sizing:border-box; font-family:"Poppins", sans-serif; }
    body { min-height:100vh; color:#fff; background:#1e1e2f; }
    section { display:flex; justify-content:center; align-items:center; width:100%; min-height:100vh; padding:20px; }
    .glass-container { background: rgba(255,255,255,0.15); backdrop-filter: blur(12px); border-radius:20px; box-shadow:0 25px 50px rgba(0,0,0,0.1); padding:40px; max-width:1000px; width:100%; color:#fff; }
    .glass-container h1 { text-align:center; margin-bottom:25px; font-size:2.2em; color:#8f2c24; text-shadow:0 3px 8px rgba(0,0,0,0.3); }

    .top-bar { display:flex; justify-content:space-between; align-items:center; margin-bottom:30px; flex-wrap:wrap; gap:10px; }
    .logout-btn { padding:10px 18px; background: #dc3545cc; border:none; border-radius:8px; font-weight:600; color:#fff; cursor:pointer; transition:0.3s; }
    .logout-btn:hover { background:#b02a37; transform:translateY(-2px); }

    .search-form { display:flex; gap:10px; background:rgba(255,255,255,0.1); padding:8px 14px; border-radius:12px; backdrop-filter:blur(6px); flex-wrap:wrap; }
    .search-form input { border:none; border-radius:6px; padding:10px; font-size:14px; }
    .search-form input:focus { outline:none; box-shadow:0 0 8px rgba(102,126,234,0.7); }
    .search-form button { padding:10px 18px; font-size:14px; font-weight:600; border:none; border-radius:6px; background:linear-gradient(to right,#373bff,#282ca7); color:#fff; cursor:pointer; transition:0.3s; }
    .search-form button:hover { background:linear-gradient(to right,#2529b0,#1f2380); transform:translateY(-2px); }

    table { width:100%; border-collapse:collapse; border-radius:16px; overflow:hidden; box-shadow:0 8px 25px rgba(0,0,0,0.25); background:rgba(255,255,255,0.1); backdrop-filter:blur(8px); margin-bottom:20px; }
    th, td { padding:16px; text-align:center; font-size:15px; }
    th { background:rgba(102,126,234,0.85); color:#fff; text-transform:uppercase; font-size:14px; letter-spacing:0.06em; }
    td { color:#8f2c24; text-shadow:0 2px 5px rgba(0,0,0,0.4); border-bottom:1px solid rgba(255,255,255,0.2); }
    tr:last-child td { border-bottom:none; }
    tr:hover { background: rgba(255,255,255,0.1); transition:0.3s ease; }

    a { padding:6px 12px; border-radius:6px; font-size:13px; font-weight:600; text-decoration:none; margin:0 4px; display:inline-block; transition:0.3s ease; }
    a[href*="update"] { background:#17a2b8; color:#fff; }
    a[href*="update"]:hover { background:#138496; transform:translateY(-2px); }
    a[href*="delete"] { background:#dc3545; color:#fff; }
    a[href*="delete"]:hover { background:#b02a37; transform:translateY(-2px); }

    .btn-create { width:50%; padding:15px; border:none; background:#8f2c24; color:#fff; font-size:1.25em; font-weight:500; border-radius:5px; cursor:pointer; transition:0.3s; }
    .btn-create:hover { background:#d64c42; transform:translateY(-2px); }
    .button-container { text-align:center; margin-top:20px; }

    .user-status { background:#f0f4ff; border:1px solid #d0d7ff; padding:10px 15px; border-radius:8px; display:inline-block; font-family:Arial,sans-serif; color:#8f2c24; font-size:14px; margin-bottom:20px; }
    .user-status strong { font-weight:600; }
    .user-status .role { font-size:13px; color:#555; }

    .pagination-container { display:flex; justify-content:center; margin:25px 0; }
    .pagination-container ul { display:flex; list-style:none; gap:8px; padding:0; margin:0; }
    .pagination-container li a, .pagination-container li span { display:block; padding:10px 16px; border:1px solid rgba(255,255,255,0.3); border-radius:8px; background:rgba(255,255,255,0.15); backdrop-filter:blur(6px); color:#fff; font-size:14px; text-decoration:none; transition:all 0.3s ease; }
    .pagination-container li a:hover { background:#8f2c24; color:#fff; transform:translateY(-2px); }
    .pagination-container li.active span { background:#f6871f; color:#fff; border-color:#8f2c24; font-weight:bold; }

    @media (max-width:768px){
      .top-bar { flex-direction:column; gap:15px; align-items:stretch; }
      .search-form { width:100%; justify-content:space-between; }
      .search-form input { flex:1; min-width:0; }
      th, td { padding:8px; font-size:13px; }
      .btn-create { width:100%; font-size:1em; }
    }

  </style>
</head>
<body>
  <section>
    <div class="glass-container">
      <h1><?= ($logged_in_user['role']==='admin') ? 'Admin Dashboard':'User Dashboard'; ?></h1>

      <div class="top-bar">
        <a href="<?=site_url('auth/logout');?>"><button class="logout-btn">Logout</button></a>
        <form action="<?=site_url('users');?>" method="get" class="search-form">
          <?php $q = $_GET['q'] ?? ''; ?>
          <input type="text" name="q" placeholder="Search" value="<?=html_escape($q);?>">
          <button type="submit">Search</button>
        </form>
      </div>

      <div class="table-responsive">
      <table>
        <tr>
          <th>ID</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <?php if ($logged_in_user['role']==='admin'): ?>
            <th>Role</th>
          <?php endif; ?>
          <th>Action</th>
        </tr>
        <?php foreach($users as $user): ?>
        <tr>
          <td><?=html_escape($user['id']);?></td>
          <td><?=html_escape($user['firstname']);?></td>
          <td><?=html_escape($user['lastname']);?></td>
          <td><?=html_escape($user['email']);?></td>
          <?php if($logged_in_user['role']==='admin'): ?>
            <td><?=html_escape($user['role']);?></td>
          <?php endif; ?>
          <td>
            <a href="<?=site_url('/users/update/'.$user['id']);?>">Update</a>
            <a href="<?=site_url('/users/delete/'.$user['id']);?>">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </table>
      </div>

      <div class="pagination-container">
        <?= $page; ?>
      </div>

      <?php if($logged_in_user['role']==='admin'): ?>
      <div class="button-container">
        <a href="<?=site_url('users/create');?>" class="btn-create">+ Create New User</a>
      </div>
      <?php endif; ?>
    </div>
  </section>
</body>
</html>
