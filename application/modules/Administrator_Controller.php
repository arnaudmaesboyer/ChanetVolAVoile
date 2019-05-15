<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ADMINISTRATOR_Controller extends CI_Controller {
    
    private $_cookie = array(
                   // 'name'   => '',
                   // 'value'  => '',
                   'expire' => '86500',
                   // 'domain' => '.some-domain.com',
                   'path'   => '/',
                   // 'prefix' => '',
               );
    
    private $_cookie_id_name = "189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD"; // nom d'un cookie admin
    private $_cookie_id_password = "1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS"; // nom d'un cookie admin
    private $_cookie_id_nameClient = "289CDS8CSDC98JCPDSCDSCDSCDSD8C9SD"; // nom d'un cookie client
    private $_cookie_id_passwordClient = "2C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS"; // nom d'un cookie client
    
    function __construct() 
    {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('encrypt');
        $this->load->model('administrator_model');
        
        // if route fetch tu veux aller 
        if ($this->input->post('identifiant', TRUE) && $this->input->post('password', TRUE)) 
        {
            if ($this->administrator_model->validate($this->input->post('identifiant'), $this->input->post('password')))
            {
                $cookies_identifiant = $this->_cookie;
                $cookies_identifiant['name'] = $this->_cookie_id_name;
                $cookies_identifiant['value'] = $this->encrypt->encode($this->input->post('identifiant'));
                // $cookies_identifiant['domain'] = "";
                $cookies_identifiant['prefix'] = $this->config->item('cookie_prefix');
                set_cookie($cookies_identifiant);

                $cookies_password = $this->_cookie;
                $cookies_password['name'] = $this->_cookie_id_password;
                $cookies_password['value'] = $this->encrypt->encode($this->input->post('password'));
                // $cookies_identifiant['domain'] = "";
                $cookies_password['prefix'] = $this->config->item('cookie_prefix');
                set_cookie($cookies_password);
                
                // Tout est ok, ont redirige vers la page d'accueil de l'admin
                redirect(site_url("welcome"));
               
            }
            elseif($this->administrator_model->validateClient($this->input->post('identifiant'), $this->input->post('password'))){
                $cookies_identifiant = $this->_cookie;
                $cookies_identifiant['name'] = $this->_cookie_id_nameClient;
                $cookies_identifiant['value'] = $this->encrypt->encode($this->input->post('identifiant'));
                // $cookies_identifiant['domain'] = "";
                $cookies_identifiant['prefix'] = $this->config->item('cookie_prefix');
                set_cookie($cookies_identifiant);

                $cookies_password = $this->_cookie;
                $cookies_password['name'] = $this->_cookie_id_passwordClient;
                $cookies_password['value'] = $this->encrypt->encode($this->input->post('password'));
                // $cookies_identifiant['domain'] = "";
                $cookies_password['prefix'] = $this->config->item('cookie_prefix');
                set_cookie($cookies_password);
                
                // Tout est ok, ont redirige vers la page d'accueil de l'admin
                redirect(site_url("welcome"));
            }
            else 
            {
                // Mauvais identifiant, ont redirige vers la page de connexion
                redirect(site_url("connexion"));
            }
        }
        elseif (get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_name, TRUE) &&
                get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_password, TRUE))
        {
            $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_name));
            $password = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_password));
            if ($this->administrator_model->validate($mail, $password) == FALSE){
                //redirect(site_url("connexion")); 
            }
          // Mauvais identifiant, ont redirige vers la page de connexion
            
        }
        elseif (get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_nameClient, TRUE) &&
                get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_passwordClient, TRUE))
        {
            $mailClient = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_nameClient));
            $passwordClient = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_passwordClient));
            if ($this->administrator_model->validateClient($mailClient, $passwordClient) == FALSE){
                //redirect(site_url("connexion")); 
            }     // Mauvais identifiant, ont redirige vers la page de connexion
            elseif ($this->router->fetch_class() == "welcome"  || $this->router->fetch_class() == "ReservationClient" || $this->router->fetch_class() == "gestionClient" ) 
        {
        
        }
            elseif ($this->router->fetch_class() != "connexion") 
            {
                redirect(site_url("connexion")); // Mauvais identifiant, ont redirige vers la page de connexion
            }
            
        }
        elseif ($this->router->fetch_class() == "welcome" ) 
        {
        
        }

        elseif ($this->router->fetch_class() != "connexion") 
        {
            redirect(site_url("connexion")); // Mauvais identifiant, ont redirige vers la page de connexion
        }
       
    }
    
	public function isAdmin(){
        $test= $this->input->cookie("189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
        if(isset($test)){
        $mail = $this->encrypt->decode($this->input->cookie("189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD"));
        $this->load->model("Administrator_model");
        return $this->Administrator_model->isAdmin($mail);
        }
        else {return False;}
    }
    public function isClient(){
        $test= $this->input->cookie("289CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
        if(isset($test)){
        $mailClient = $this->encrypt->decode($this->input->cookie("289CDS8CSDC98JCPDSCDSCDSCDSD8C9SD"));
        $this->load->model("Administrator_model");
        return $this->Administrator_model->isClient($mailClient);
        }
        else {return False;}
	}
}