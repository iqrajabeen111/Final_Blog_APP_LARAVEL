<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
     /**
     * @var \App\Models\Post|null
     */
    private $postModel = null;

    /**
     * @var \App\Models\Category|null
     */
    private $categoryModel = null;

    public function __construct(Post $postModel, Category $categoryModel)
    {
        $this->postModel = $postModel;
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $post =  $this->postModel->with('categories')->get();
        return view('Admin/Post-List', ['posts' => $post]);
    }

    public function create()
    {
        $category = $this->categoryModel->get();
        return view('Admin/Add-Post', ['categories' => $category]);
    }

    public function store(PostRequest $request)
    {

        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('posts', 'public');
        }

        $data = $request->all();

        $post = $this->postModel->create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            "image" => $image,
            'title' => $data['description'],
        ]);
        if ($request->hasFile('image')) {
            $post->image =  $this->postModel->image($post->image);
        }

        $category = $this->categoryModel->find($request->category);
        $post->categories()->attach($category->id);
        return redirect()->back()->with('message', 'post Added Successfully');
    }


    // public function edit($postid)
    // {
    //     $post = $this->postModel->find($postid);
    //     $categories = $this->categoryModel->get();
    //     return view('Admin/EditPost', ['posts' => $post, 'categories' => $categories]);
    // }

    // public function destroy($id)
    // {
    //     $post = $this->postModel->find($id);
    //     //delete child rows first then delete the actual row
    //     $post->categories()->detach();
    //     $post->delete();
    //     return redirect()->route('index')->with('success', 'Task removed.');
    // }
    // public function update(Request $request, $id)
    // {
    //     $post = $this->postModel->find($id);
    //     $post->title =  $request->get('title');
    //     $post->save();
       
    //     $post->categories()->sync($request->categories);
    //     return redirect()->route('index')->with('success', 'Post updated.');
    // }
    //////practice////
 
}
