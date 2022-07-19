<?php

namespace App\Alura;

class Contato
{
    private $email;
    private $endereco;
    private $cep;
    private $telefone;


    


    public function __construct(string $email, string $endereco, string $cep, string $telefone)
    {
        

        $this->setEmail($email);
        if ($this->validaEmail($email) !== false) {
            $this->setEmail($email);
        } else {
            $this->setEmail("Email inválido.");
        }

        if ($this->validaTelefone($telefone)){
            $this->setTelefone($telefone);
        }else{
            $this->setTelefone("Telefone inválido");
        }

        $this->endereco = $endereco;
        $this->cep = $cep;
    }

    private function validaEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    private function validaTelefone(string $telefone): int{
        //9435-7831
        return preg_match('/^[0-9]{4}-[0-9]{4}$/', $telefone,$encontrados);
    }

    private function setTelefone(string $telefone): string{
        return $this->telefone = $telefone;
    }


    private function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getUsuario(): string
    {
        $posicaoArroba = strpos($this->email, "@");

        if ($posicaoArroba === false) {
            return "Usuario invalido";
        }

        return substr($this->email, 0, $posicaoArroba);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEnderecoCep(): string
    {
        $enderecoCep = [$this->endereco, $this->cep];

        return implode(" - ", $enderecoCep);
    }

    public function getCep(): string
    {
        return $this->cep;
    }
}
