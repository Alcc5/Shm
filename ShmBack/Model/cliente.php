<?php

class Cliente{
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
    
    public function __construct($ativo, $cnpj, $nomeFantasia, $razaoSocial, $endereco, $complemento, $bairro, $cidade, $estado, $cep){
        $this->ativo = $ativo;
        $this->cnpj = $cnpj;
        $this->nomeFantasia = $nomeFantasia;
        $this->razaoSocial = $razaoSocial;
        $this->endereco = $endereco;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
    }

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
}

?>