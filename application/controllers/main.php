<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function login() {
		$this->load->view('login');
	}

	public function register() {
		$this->load->view('register');
	}

	public function add_user($access) {
		$this->load->library("form_validation");
		$config = array(
               array(
                     'field'   => 'email', 
                     'label'   => 'Email', 
                     'rules'   => 'trim|required|valid_email'
                  ),
               array(
                     'field'   => 'first_name', 
                     'label'   => 'First Name', 
                     'rules'   => 'trim|required|xxs_clean'
                  ),
               array(
                     'field'   => 'last_name', 
                     'label'   => 'last_name', 
                     'rules'   => 'trim|required|xss_clean'
                  ),   
               array(
                     'field'   => 'password', 
                     'label'   => 'Password', 
                     'rules'   => 'trim|required|matches[confirm]|md5'
                  ),
                array(
                     'field'   => 'confirm', 
                     'label'   => 'Password Confirmation', 
                     'rules'   => 'trim|required|md5'
                  )
            );
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('reg_errors', "There Were Problems With Your Registration");
			if($access == 'register') {
				redirect('/register');
			} else if($access == 'add') {
				redirect('/add/user');
			} else {
				die("You're Not Supposed To Be Here");
			}
		} else {
			$this->load->model('dashboard');
			$this->dashboard->create_user($this->input->post());
			if($access == 'register') {
				redirect('/login');
			} else if($access == 'add') {
				redirect('/dashboard/admin');
			} else {
				die("You're Not Supposed To Be Here");
			}
		}
	}

	public function login_user() {
		$this->load->library("form_validation");
		$config = array(
           array(
                 'field'   => 'email', 
                 'label'   => 'Email', 
                 'rules'   => 'trim|required|valid_email'
              ),
           array(
                 'field'   => 'password', 
                 'label'   => 'Password', 
                 'rules'   => 'trim|required|md5'
              )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('login_errors', "There Were Problems With Your Login");
			redirect('/login');	
        } else {
        	$this->load->model('dashboard');
        	$result = $this->dashboard->get_user_by_email($this->input->post('email'));
        	$user = $result[0];
        	if(!empty($user) && $user['password'] == $this->input->post('password')){
        		
        		$this->session->set_userdata('user', $user);
        		if($user['permission'] == 1) {
	        		redirect('/dashboard');
	        	} else {
	        		redirect('/dashboard/admin');
	        	}

        	} else {
        		$this->session->set_flashdata('login_errors', "Incorret Email Or Passsword");
				redirect('/login');	
        	}
   		}
	}

	public function dashboard($permission) {
		if($this->session->userdata['user']['permission'] == $permission) {
			if($permission == '9') {
				
				$this->load->model('dashboard');
				$data = $this->dashboard->get_all();
				$this->load->view('admin', array('data' => $data));

			} else {

				$this->load->model('dashboard');
				$data = $this->dashboard->get_all();
				$this->load->view('dashboard', array('data' => $data));

			}
		} else {
			die('Bad Boi');
		}
	}

	public function add_user_page() {
		$this->load->view('add_user');
	}

	public function edit($id) {
		$this->load->model('dashboard');
		$user = $this->dashboard->get_user_by_id($id);
		$this->load->view('edit', array('user' => $user));
	}

	public function edit_user($id) {
		$this->load->library('form_validation');
		$config = array(
           array(
                 'field'   => 'email', 
                 'label'   => 'Email', 
                 'rules'   => 'trim|required|valid_email'
              ),
           array(
                 'field'   => 'first_name', 
                 'label'   => 'First Name', 
                 'rules'   => 'trim|required|xxs_clean'
              ),
           array(
                 'field'   => 'last_name', 
                 'label'   => 'last_name', 
                 'rules'   => 'trim|required|xss_clean'
              )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('edit_errors', "There Were Problems With Your Edit");
        	if($this->session->userdata['user']['permission'] == 9) {
				redirect("/edit/user/$id");	
			} else {
				redirect('/profile');
			}
        } else {
        	$this->load->model('dashboard');
        	$changed = $this->dashboard->edit_user($this->input->post());
        	if($changed) {
        		if($this->session->userdata['user']['permission'] == 9) {
					redirect("/dashboard/admin");	
				} else {
					redirect('/dashboard');
				}
        	} else {
        		die("<a href='/edit/user/$id'>GO BACK</a><br>There was an error with your edit");
        	}
        }
	}

	public function edit_user_password($id) {
		$this->load->library('form_validation');
		$config = array(
           array(
                 'field'   => 'password', 
                 'label'   => 'Passsword', 
                 'rules'   => 'trim|required|matches[confirm]|md5'
              ),
           array(
                 'field'   => 'confirm', 
                 'label'   => 'Confirm', 
                 'rules'   => 'trim|required|md5'
              )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('pass_errors', "Password Error");
			if($this->session->userdata['user']['permission'] == 9) {
				redirect("/edit/user/$id");	
			} else {
				redirect('/profile');
			}
        } else {
        	$this->load->model('dashboard');
        	$changed = $this->dashboard->edit_user_password($this->input->post());
        	if($changed) {
        		if($this->session->userdata['user']['permission'] == 9) {
					redirect("/dashboard/admin");	
				} else {
					redirect('/dashboard');
				}
        	} else {
        		die("<a href='/edit/user/$id'>GO BACK</a><br>There was an error with your edit");
        	}
        }

	}

	public function destroy($id) {
		$this->load->view('destroy', array('id' => $id));
	}

	public function destroy_user($id) {
		$this->load->model('dashboard');
		$this->dashboard->destroy_user($id);
		redirect('/dashboard/admin');
	}

	public function profile() {
		$this->load->view('profile');
	}

	public function show($id) {
		$this->load->model('dashboard');
		$user = $this->dashboard->get_user_by_id($id);
		if(empty($user['description'])) {
			$user['description'] = "This user didn't set a description!";
		}
		$this->load->view('show', array('user' => $user));
	}

	public function logoff() {
		$this->session->unset_userdata('user');
		redirect('/');
	}
}

//end of main controller