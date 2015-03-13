<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {
    
    function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        redirect('email/enviar_email/');
    }
    
    public function enviar_email()
    {
        $this->form_validation->set_rules('seu_email', 'Seu Email', 'required');
        $this->form_validation->set_rules('seu_nome', 'Seu Nome', 'required');
        $this->form_validation->set_rules('sua_senha', 'Sua Senha', 'required');
        $this->form_validation->set_rules('email_destino', 'Email de Destino', 'required');
        $this->form_validation->set_rules('titulo_email', 'Título Email', 'required');
        $this->form_validation->set_rules('texto', 'Texto', 'required');

        if ($this->form_validation->run() == TRUE) 
        {
            $seu_email = $this->input->post('seu_email');
            $seu_nome = $this->input->post('seu_nome');
            $sua_senha = $this->input->post('sua_senha');
                            
            $email_destino = $this->input->post('email_destino');
            $titulo_email = $this->input->post('titulo_email');
            $texto = $this->input->post('texto');
        
            $this->load->library('email');
            $config['protocol'] = "smtp";
            $config['smtp_host'] = "ssl://smtp.gmail.com";
            $config['smtp_port'] = "465";
            $config['smtp_user'] = $seu_email; 
            $config['smtp_pass'] = $sua_senha;
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";

            $this->email->initialize($config);

            $this->email->from($seu_email, $seu_nome);
            $list = array($email_destino);
            $this->email->to($list);
            $this->email->subject($titulo_email);
            $this->email->message('<p>'.$texto.'</p>');
            $r = $this->email->send();
            
            if (!$r)
            {
                $this->email->print_debugger();
            }
            
            redirect('');
        }
        else
        {
            $dados = array(
                'titulo' => 'Email - Enviar Email',
                'view' => 'enviar',
            );

            $this->load->view('email', $dados);
        }
    }
}