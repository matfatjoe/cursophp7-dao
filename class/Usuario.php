<?php 

class Usuario {

	private $id;
	private $login;
	private $senha;
	private $dtcadastro;

	public function getId() {
		return $this->id;
	}

	public function setId($value) {
		$this->id = $value;
	}

	public function getLogin() {
		return $this->login;
	}

	public function setLogin($value) {
		$this->login = $value;
	}
	
	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($value) {
		$this->senha = $value;
	}

	public function getDtcadastro() {
		return $this->dtcadastro;
	}

	public function setDtcadastro($value) {
		$this->dtcadastro = $value;
	}

	public function loadById($id) {

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE id = :ID", array(
			":ID"=>$id
		));
		if (count($results) > 0) {
			
			$row = $results[0];

			$this->setId($row['id']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

		}

	}

	public static function getList() {

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY login");

	}

	public static function search($login) {

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE login LIKE :SEARCH ORDER BY login", array(
			':SEARCH'=>"%".$login."%"

		));

	}

	public function login($login, $password)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE login = :LOGIN AND senha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));
		if (count($results) > 0) {
			
			$row = $results[0];

			$this->setId($row['id']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		} else{

			throw new Exception("Login e/ou senha invalidos");
			
		}
	}

	public function __toString() {

		return json_encode(array(
			"id"=>$this->getId(),
			"login"=>$this->getLogin(),
			"senha"=>$this->getSenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));

	}

}

 ?>