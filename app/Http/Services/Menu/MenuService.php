<?php
namespace App\Http\Services\Menu;
use App\Models\Menu;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Str;
class MenuService{
    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }
    public function getAll(){
      return Menu::orderbyDesc('id')->paginate(20);
    }
    public function create($request){
      try{
        Menu :: create([
          'name' => (string) $request->input('name'),
          'parent_id' => (int) $request->input('parent_id'),
          'description' => (string) $request->input('description'),
          'content' => (string) $request->input('content'),
          'active' => (string) $request->input('active'),
        ]);
        $request->session()->flash('success','Tạo danh mục thành công');
      } catch(\Exception $err){
        $request->session()->flash('error',$err->getMessage());
        return false;
      }
      return true;
    }
    public function update($request, $menu):bool{
      if($request->input('parent_id')!= $menu->id){
        $menu->parent_id=(int)$request->input('parent_id');
      }
      $menu->name=(string)$request->input('name');
      $menu->description=(string)$request->input('description');
      $menu->content=(string)$request->input('content');
      $menu->active=(string)$request->input('active');
      $menu->save();
      $request->session()->flash('success','Cập nhật danh mục thành công');
      return true;
      
    }
    public function destroy($request){
      $id = (int) $request->input('id');
      $menu = Menu::where('id',$id)->first();
      if($menu){
          return Menu::where('id',$id)->orWhere('parent_id',$id)->delete();
      }
      return false;
    }
    public function show(){
      return Menu::select('name','id')->where('parent_id',0)->orderbyDesc('id')->get();
    }
    public function getID($id){
      return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }
    public function getID_menu($search){
      return Menu::where('name', $search)->where('active', 1)->firstOrFail();
    }
    public function getProduct($menu, $request){
      $query = $menu->products()
      ->select('id','name','price','price_sale','thumb')
      ->where('active',1);
      if($request->price){
        $price=$request->price;
        switch($price){
          case '1':
               $query->where('price_sale','<',200000);
               break;
          case '2':
              $query->whereBetween('price_sale',[200000, 500000]);
              break;
          case '3':
              $query->where('price_sale','>',500000);
              break;
          case 'asc':
          case 'desc':
             $query->orderBy('price', $price);
             break;
        }
        //$query->orderBy('price', $request->input('price'));
      }
      return $query->orderByDesc('id')->paginate(12)->withQueryString();
    }
}