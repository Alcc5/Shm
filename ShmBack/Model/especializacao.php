<?php

class Especializacao implements JsonSerializable{
    private $id;
    private $especializacao;


	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
    }
    
    public function getEspecializacao() {
		return $this->especializacao;
	}

	public function setEspecializacao($especializacao) {
		$this->especializacao = $especializacao;
	}

    
    public function jsonSerialize(){
      return 
        [
            'id'   => $this->getId(),
            'especializacao' => $this->getEspecializacao()
        ];
    }
}

?>