<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Customers;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class CommentController extends Controller
{
    
    public function addComment(Request $request){
        try{
          $request->except('_token');
           Comment::create($request->all());
          return redirect()->back()->with('alert', 'Thêm bình luận thành công!');;
        } catch (Exception $err){
          return redirect()->back()->with('alert','Thêm bình luận thất bại do lỗi bất định!');
        }

    }
    public function index(){
    $comments = Comment::join('products', 'comments.product_id', '=', 'products.id')
     ->select('comments.*', 'products.name as pro_name')->orderBy('pro_name')->get();
     return view('admin.comments.comment',[
      'title' => 'Danh sách bình luận',
      'comments'=>$comments,
   ]);
  }
  public function duyet(Comment $comment){
    $active = 1;
    DB::update('update comments set active = ? where id = ?',[$active, $comment->id]);
    return redirect()->back();
} 
public function destroy(Comment $comment)
    {
   
        $comment = Comment::where('id',$comment->id)->first();
        if($comment){
            $comment->delete();
        }
        return redirect()->back();
    }
}
