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


    protected $keywords;
    protected $meta_desc;
    protected $title;



    protected $template;

    protected $vars = array();
    
    protected $contentRighitBar = false;
    protected $contentLeftBar = false;

    protected $bar = 'no';

    public function __construct(MenusRepository $m_rep ){
    	$this->m_rep = $m_rep;
    }

    protected function renderOutput(){

    	$menu = $this->getMenu();

    	$navigation = view(env('THEME').'.navigation')->with('menu',$menu)->render();
    	$this->vars = array_add($this->vars, 'navigation', $navigation);

        if($this->contentRighitBar){
            $rightBar = view(env('THEME').'.rightBar')->with('content_rightBar',$this->contentRighitBar)->render();
            $this->vars = array_add($this->vars, 'rightBar', $rightBar);

        }
        $this->vars = array_add($this->vars, 'bar', $this->bar);


        $this->vars = array_add($this->vars, 'keywords', $this->keywords);
        $this->vars = array_add($this->vars, 'meta_desc
            ', $this->meta_desc
    );
        $this->vars = array_add($this->vars, 'title', $this->title);

        

        $footer = view(env('THEME').'.footer')->render();
        $this->vars = array_add($this->vars, 'footer', $footer);

    	return view($this->template)->with($this->vars);
    }

    protected function getMenu(){
    	$menu = $this->m_rep->get();
    	
    	$mBuilder = Menu::make('MyNav',function($m) use ($menu) {
    		foreach ($menu as $item ) {
    			if($item->parent_id == 0){
    				$m->add($item->title,$item->path)->id($item->id);
    			}
    			else{
    				if($m->find($item->parent_id)){
    					$m->find($item->parent_id)->add($item->title,$item->path)->id($item->id);
    				}
    			}
    		}
    	});
    	return $mBuilder;
    }

}
