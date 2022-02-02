<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
class Nav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories;
    public function __construct(){
        $this->categories = $this->getCategory(0);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(){
        return view('components.nav');
    }

    public function getCategory($parent){
        $data = Category::where(['status'=>1,'parent'=>$parent])->get();
        $result=array();
        $Html ='';
        foreach($data as $da){
            $child = $this->getCategory($da->id);
            
            if($da->level==1){
                $class='';
                if(!empty($child)){ $class='dropdown'; }
                $Html .='<li class="nav-item '.$class.' Megamenu">
                        <a title="'.$da->name.'" class="nav-link '.$class.'-toggle" href="'.route('category',['alias'=>$da->alias]).'" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="'.asset('uploads/category/icon/'.$da->icon).'" width="20px"> '.$da->name.'</span></a>';
                        if(!empty($child)):
                        $Html .='<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div>
                                <div class="row">
                                    <div class="col">
                                        <ul>';

                                $Html .= $child;
            
                                $Html .='</ul>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        endif;
                $Html .='</li>';
            }elseif($da->level==2){
                $Html .='<li class="title"><a title="'.$da->name.'" href="'.route('category',['alias'=>$da->alias]).'" class="mcolor"><strong>'.$da->name.'</strong></a></li>';
                $Html .= $child;
            }else{
                $Html .='<li><a title="'.$da->name.'" href="'.route('category',['alias'=>$da->alias]).'" class="mcolor">'.$da->name.'</a></li>';
                $Html .= $child;
            }
            
        }
        return $Html;
    }
}
