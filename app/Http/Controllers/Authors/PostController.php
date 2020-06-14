<?php

namespace App\Http\Controllers\Authors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;
use App\Post;
use App\Category;
use App\Helper\Traits\ImageCompress;
use Image;


class PostController extends Controller
{
    use ImageCompress;

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index(Request $request)
    {
        if (auth()->user()->role == "admin"){
            if ($request->ajax()) {
                $data = Post::with('Category')->latest()->get();
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-xs btn-white btn-uppercase editRole"><i class="icon ion-md-eye mr-1"></i>View</a>';
                    $btn = $btn.' <a href="javascript:void(0)"  data-id="'.$row->id.'" class="btn btn-xs text-danger btn-uppercase deleteRole">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
        } else {
            if ($request->ajax()) {
                $data = Post::with('Category')->where('author_id',auth()->user()->id)->latest()->get();
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-xs btn-white btn-uppercase editRole"><i class="icon ion-md-create mr-1"></i>Edit</a>';
                    $btn = $btn.' <a href="javascript:void(0)"  data-id="'.$row->id.'" class="btn btn-xs text-danger btn-uppercase deleteRole">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
        }

        $categories = Category::select('id','name')->get();
        return view('Authors.post.index', compact('categories'));
        // return view('Authors.post.index');
        // return dd($data);
    }

    public function store(Request $request)
    {
        if ($image = $request->file('img')) {
            $filename = $this->uploadImage(
                Image::make($image), "uploads/articles", "article", $image->getClientOriginalExtension(), [500,500], 95, 0
            );
        } else {
            if ($id = $request->input('id')) {
                $filename = Post::find($id)->image;
            } else {
                return response()->json(['message' => 'Image must be not empty!'], 500);
            }
        }
        $insert = Post::updateOrCreate(['id' => $request->input('id')],
        [
            'author_id'     => auth()->user()->id,
            'title'			=> $request->input('title'),
            'body'	        => $request->input('content'),
            'image'			=> $filename,
            'category_id'   => $request->input('category_id'),
            'slug'          => Str::slug($request->input('title'))
            ]
        );
        if ($insert) {
            return response()->json(['message' => 'Data created'], 201);
        } else {
            return response()->json(['message' => 'Failed to Create Data'], 500);
        }
    }

    public function edit($id)
    {
        $article = Post::find($id);
        return response()->json($article);
    }

    public function destroy($id)
    {
        $data = Post::find($id);
        if ($data->delete()) {
            return response()->json(['msg'=>'Article deleted successfully.']);
        } else {
            return response()->json(['msg'=>'Failed']);
        }
    }
}

