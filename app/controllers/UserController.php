<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 */
class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();

    }
    
    public function index()
    {
       $this->call->model('UsersModel');

            // Check kung may naka-login
            if (!isset($_SESSION['user'])) {
                redirect('/auth/login');
                exit;
            }

            // Kunin info ng naka-login na user
            $logged_in_user = $_SESSION['user']; 
            $data['logged_in_user'] = $logged_in_user;

            // ✅ If admin → show all with pagination
            if ($logged_in_user['role'] === 'admin') {
                // Current page
                $page = 1;
                if(isset($_GET['page']) && ! empty($_GET['page'])) {
                    $page = $this->io->get('page');
                }

                $q = '';
                if(isset($_GET['q']) && ! empty($_GET['q'])) {
                    $q = trim($this->io->get('q'));
                }

                $records_per_page = 10;

                // Get paginated users
                $users = $this->UsersModel->page($q, $records_per_page, $page);

                $data['users'] = $users['records'];
                $total_rows = $users['total_rows'];

                // Pagination setup
                $this->pagination->set_options([
                    'first_link'     => '⏮ First',
                    'last_link'      => 'Last ⏭',
                    'next_link'      => 'Next →',
                    'prev_link'      => '← Prev',
                    'page_delimiter' => '&page='
                ]);
                $this->pagination->set_theme('custom');
                $this->pagination->initialize($total_rows, $records_per_page, $page, 'users?q='.$q);
                $data['page'] = $this->pagination->paginate();

            } else {
                // ✅ If regular user → only own data
                $user = $this->UsersModel->get_user_by_id($logged_in_user['id']);
                $data['users'] = [$user]; // wrap in array para same format sa view
                $data['page'] = ''; // no pagination
            }

            // Pass to view
            $this->call->view('users/index', $data);
    }

    public function create()
    {
        $this->call->model('UsersModel');

        if($this->io->method() === 'post'){
            $data = [
                'firstname' => $this->io->post('firstname'),
                'lastname'  => $this->io->post('lastname'),
                'email'     => $this->io->post('email'),
                'role'      => 'user',
                'created_at'=> date('Y-m-d H:i:s')
            ];

            if($this->UsersModel->db->table('information')->insert($data)){
                redirect('/users');
            } else {
                echo 'Failed to create user.';
            }
        } else {
            $this->call->view('users/create');
        }
    }

    public function update($id)
    {
        $this->call->model('UsersModel');
        $user = $this->UsersModel->get_user_by_id($id);

        if (!$user) {
            echo "User not found.";
            return;
        }

        $logged_in_user = $_SESSION['user'] ?? null;

        if ($this->io->method() === 'post') {
            $data = [
                'firstname' => $this->io->post('firstname'),
                'lastname'  => $this->io->post('lastname'),
                'email'     => $this->io->post('email')
            ];

            if ($logged_in_user && $logged_in_user['role'] === 'admin') {
                $data['role'] = $this->io->post('role');
            }

            $password = $this->io->post('password');
            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_BCRYPT);
            }

            if ($this->UsersModel->db->table('information')->where('id', $id)->update($data)) {
                redirect('/users');
            } else {
                echo 'Failed to update user.';
            }
        } else {
            $data['user'] = $user;
            $data['logged_in_user'] = $logged_in_user;
            $this->call->view('users/update', $data);
        }
    }

    public function delete($id)
    {
        $this->call->model('UsersModel');
        if($this->UsersModel->db->table('information')->where('id', $id)->delete()){
            redirect('/users');
        } else {
            echo 'Failed to delete user.';
        }
    }

    public function register()
    {
        $this->call->model('UsersModel');

        if ($this->io->method() == 'post') {
            $data = [
                'firstname'  => $this->io->post('firstname'),
                'lastname'   => $this->io->post('lastname'),
                'email'      => $this->io->post('email'),
                'password'   => password_hash($this->io->post('password'), PASSWORD_BCRYPT),
                'role'       => 'user',
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($this->UsersModel->db->table('information')->insert($data)) {
                redirect('/auth/login');
            }
        }

        $this->call->view('/auth/register');
    }

    public function login()
    {
        $this->call->library('auth');
        $this->call->model('UsersModel');
        $error = null;

        if ($this->io->method() == 'post') {
            $firstname = $this->io->post('firstname');
            $lastname  = $this->io->post('lastname');
            $password  = $this->io->post('password');

            $user = $this->UsersModel->get_user_by_name($firstname, $lastname);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = [
                        'id'        => $user['id'],
                        'firstname' => $user['firstname'],
                        'lastname'  => $user['lastname'],
                        'role'      => $user['role']
                    ];
                    redirect('/users');
                } else {
                    $error = "Incorrect password!";
                }
            } else {
                $error = "Name not found!";
            }
        }

        $this->call->view('auth/login', ['error' => $error]);
    }

    public function dashboard()
    {
        $this->call->model('UsersModel');
        $page = $this->io->get('page') ?? 1;
        $q    = trim($this->io->get('q') ?? '');
        $records_per_page = 10;

        $user = $this->UsersModel->page($q, $records_per_page, $page);
        $data['user'] = $user['records'];
        $total_rows = $user['total_rows'];

        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('bootstrap');
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'users?q='.$q);
        $data['page'] = $this->pagination->paginate();

        $this->call->view('users/dashboard', $data);
    }

    public function logout()
    {
        $this->call->library('auth');
        $this->auth->logout();
        redirect('auth/login');
    }
}
