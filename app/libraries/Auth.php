<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Library: Auth
 */
class Auth {
    protected $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->database();
        $this->_lava->call->library('session');
    }

    /*
     * Register a new user
     */
    public function register($firstname, $lastname, $email, $password, $role = 'user')
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        return $this->_lava->db->table('information')->insert([
            'firstname'  => $firstname,
            'lastname'   => $lastname,
            'email'      => $email,
            'password'   => $hash,
            'role'       => $role,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    /*
     * Login user
     */
    public function login($email, $password)
    {
        $user = $this->_lava->db->table('information')
                                ->where('email', $email)
                                ->get();

        if ($user && password_verify($password, $user['password'])) {
            $this->_lava->session->set_userdata([
                'id'        => $user['id'],
                'firstname' => $user['firstname'],
                'lastname'  => $user['lastname'],
                'email'     => $user['email'],
                'role'      => $user['role'],
                'logged_in' => true
            ]);
            return true;
        }

        return false;
    }

    /*
     * Check if user is logged in
     */
    public function is_logged_in()
    {
        return (bool) $this->_lava->session->userdata('logged_in');
    }

    /*
     * Check user role
     */
    public function has_role($role)
    {
        return $this->_lava->session->userdata('role') === $role;
    }

    /*
     * Logout user
     */
    public function logout()
    {
        $this->_lava->session->unset_userdata(['id','firstname','lastname','email','role','logged_in']);
    }
}
