<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\MenusRepository;

use Menu;

class SiteController extends Controller
{
    protected $p_rep;
    protected $s_rep;
    protected $a_rep;
    protected $m_rep;


    protected $template;

    protected $vars = array();
    
    protected $contentRighitBar = false;
    protected $contentLeftBar = false;

    protected $bar = false;

    public function __construct(MenusRepository $m_rep ){
    	$this->m_rep = $m_rep;
    }

    protected function renderOutput(){

    	$menu = $this->getMenu();

    	// dd($menu);

    	$navigation = view(env('THEME').'.navigation')->render();
    	$this->vars = array_add($this->vars, 'navigation', $navigation);

    	return view($this->template)->with($this->vars);
    }

    protected function getMenu(){
    	$menu = $this->m_rep->get();
    	// dd($menu);
    	$mBuilder = Menu::make('MyNav',function($m) use($menu){
    		foreach ($menu as $item ) {
    				// var_dump($item->parent_id);
    			if($item->parent_id == 0){
    					// dd('if');
    				// dd($item->parent_id);
    				$m->add($item->title,$item->path,$item->id)->id($item->id);
    				// dd($m);
    			}
    			else{
    					// dd('else');
    				if($m->find($item->parent)){
    					$m->find($item->parent_id)->add($item->title,$item->path)->id($item->id);
    				}
    			}
    			// print_r($m);

    			// var_dump($m->id);
    		}
    	});
    		// dd($mBuilder->items[2]->id);


    	return $mBuilder;
    }

}
