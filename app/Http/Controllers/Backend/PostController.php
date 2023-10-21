<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::whereNull('deleted_at');

        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $posts->where(function ($q) use ($searchKeyword) {
                $q->where('name', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('slug', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        
        $posts = $posts->orderBy('id', 'desc')->paginate(10);
        return view('backend.post.index', [
            'posts' => $posts
        ]);
    }

    public function create(Request $request)
    {
        return view('backend.post.create');
    }

    public function store(PostRequest $request)
    {
        try {
            DB::beginTransaction();
            $post = new Post;
            $post->name = $request->name;
            $post->slug = $request->slug;
            $thumbnail_upload = UploadImage::handleUploadFile('thumbnail', 'img/post/', $request);
            $post->thumbnail = $thumbnail_upload;
            $post->status = $request->status;
            $post->is_featured = $request->is_featured ?? 0;
            $post->content = $request->content;
            $post->save();
            DB::commit();
            return redirect()->route('admin.posts.index')->with(['success' => 'Thêm tin tức thành công']);
        } catch (Exception $e) {
            Log::error('[PostController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm tin tức thất bại']);
        }
    }

    public function edit(Request $request, $id)
    {
        $post = Post::findorFail($id);
        return view('backend.post.edit',[
            'post' => $post
        ]);
    }

    public function update(PostRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $post = Post::findorFail($id);
            $post->name = $request->name;
            $post->slug = $request->slug;
            if($request->hasFile('thumbnail')){
                $deletedExist = UploadImage::handleDeleteFileExist($post->thumbnail);
                $thumbnail_upload = UploadImage::handleUploadFile('thumbnail', 'img/post/', $request);
                $post->thumbnail = $thumbnail_upload;
            }
            $post->status = $request->status;
            $post->is_featured = $request->is_featured;
            $post->content = $request->content;
            $post->save();
            DB::commit();
            return redirect()->route('admin.posts.index')->with(['success' => 'Sửa tin tức thành công']);
        } catch (Exception $e) {
            Log::error('[PostController][update] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Sửa tin tức thất bại']);
        }
    }
}
