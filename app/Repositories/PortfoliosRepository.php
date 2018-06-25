<?php
namespace Corp\Repositories;
use Corp\Portfolio;

class PortfoliosRepository extends Repository{
	public function __construct(Portfolio $porfolio){
		$this->model = $porfolio;
	}
}

?>

