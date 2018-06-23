<?php
namespace Corp\Repositories;
use Config;


abstract class Repository{
	protected $model = false;

	public function get(){
		$builder = $this->model->select('*');
		// dd($builder);
		return $builder->get();
		//return $menu;
	}
}

?>