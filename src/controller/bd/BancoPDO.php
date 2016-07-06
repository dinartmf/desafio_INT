<?php
require_once'configBD.php';
?>

<?php

class BancoPDO {

	private static $instanciaBD;

	private function __construct(){}

	public static function obterInstanciaBD() {

		if (!isset(self::$instanciaBD)) {

			self::$instanciaBD = self::iniciarBD();
		}

		return self::$instanciaBD;
	}

	private static function iniciarBD() {

		try {

			$pdo = new PDO('mysql:host=' . BD_HOST . ';dbname=' . BD_NAME, BD_USER, BD_PASS);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			return $pdo;
		} catch (PDOException $e) {

			throw $e;
		}
	}
}

?>