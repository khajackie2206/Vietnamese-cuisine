<?php
namespace App\Http\View\Composers;
use App\Models\Menu;
use Illuminate\View\View;
class MenuComposer{
   
    protected $users;
 
    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        
    }
 
  
    public function compose(View $view)
    {
         $menus = Menu::select('id','name','parent_id')->where('active',1)->orderByDesc('id')->get();
         $view->with('menus',$menus);
    }
}