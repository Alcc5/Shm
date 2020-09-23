<?php

class Usuario implements JsonSerializable{
    private $id;
    private $ativo;
    private $cpf;
    private $nome;
    private $email;
    private $endereco;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

    public function getAtivo() {
		return $this->ativo;
	}

	public function setAtivo($ativo) {
		$this->ativo = $ativo;
    }
    
    public function getCpf() {
		return $this->cpf;
	}

	public function setCpf($cpf) {
		$this->cnpj = $cpf;
    }

    public function getNome() {
		return $this->nome;
	}

	public function SetNome($nome) {
		$this->nome = $nome;
    }

    public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
    }

    public function getEndereco() {
		return $this->endereco;
	}

	public function setEndereco($endereco) {
		$this->endereco = $endereco;
    }

    public function getComplemento() {
		return $this->complemento;
	}

	public function setComplemento($complemento) {
		$this->complemento = $complemento;
    }

    public function getBairro() {
		return $this->bairro;
	}

	public function setBairro($bairro) {
		$this->bairro = $bairro;
    }
    
    public function getCidade() {
		return $this->cidade;
	}

	public function setCidade($cidade) {
		$this->cidade = $cidade;
    }

    public function getEstado() {
		return $this->estado;
	}

	public function setEstado($estado) {
		$this->estado = $estado;
    }
    
    public function getCep() {
		return $this->cep;
	}

	public function setCep($cep) {
		$this->cep = $cep;
    }

    public function jsonSerialize(){
      return 
        [
            'id'   => $this->getId(),
            'ativo' => $this->getAtivo(),
            'cpf'   => $this->getCpf(),
            'nome'   => $this->getNome(),
            'email'   => $this->getEmail(),
            'endereco'   => $this->getEndereco(),
            'complemento'   => $this->getComplemento(),
            'bairro'   => $this->getBairro(),
            'cidade'   => $this->getCidade(),
            'estado'   => $this->getEstado(),
            'cep'   => $this->getCep()
        ];
    }
}

?>