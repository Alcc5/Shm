<?php

class Cliente implements JsonSerializable{
    private $id;
    private $ativo;
    private $cnpj;
    private $nomeFantasia;
    private $razaoSocial;
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
    
    public function getCnpj() {
		return $this->cnpj;
	}

	public function setCnpj($cnpj) {
		$this->cnpj = $cnpj;
    }

    public function getNomeFantasia() {
		return $this->nomeFantasia;
	}

	public function setNomeFantasia($nomeFantasia) {
		$this->nomeFantasia = $nomeFantasia;
    }

    public function getRazaoSocial() {
		return $this->razaoSocial;
	}

	public function setRazaoSocial($razaoSocial) {
		$this->razaoSocial = $razaoSocial;
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
            'cnpj'   => $this->getCnpj(),
            'nomeFantasia'   => $this->getNomeFantasia(),
            'razaoSocial'   => $this->getRazaoSocial(),
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