<?php

class BD {
	public $bd ;
	function __construct()
	{
		$this->conectar();
	}
	function conectar () {
		$this->bd = new mysqli("127.0.0.1", "root", "", "sionica");
	}
}