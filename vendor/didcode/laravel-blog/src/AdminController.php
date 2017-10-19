<?php namespace didcode\Blog;

use App\Http\Controllers\Controller;
use didcode\Blog\Models\Post;
use didcode\Blog\Models\Category;
use didcode\Blog\Models\Option;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Tag;
use Illuminate\Http\Request;


class AdminController extends Controller {

    public function __construct()
    {
        $middleware = config('blog.admin_middleware');
        if ($middleware) {
            $this->middleware($middleware);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('blog::admin.index')
            ->withPosts($posts)
            ->withCategories(Category::all())
            ->withTags(Tag::all());
    }

    public function createPost() {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('blog::admin.editor')
            ->withCategories($categories)
            ->withTags($tags)
            ->withPostId('');
    }

    public function editPost($id) {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        $post= Post::find($id);

        return view('blog::admin.editor')
            ->withCategories($categories)
            ->withPost($post)
            ->withTags($tags)
            ->withPostId($id);
    }

    public function show($slug) {
        $post = Post::whereSlug($slug)->first();

        return view('blog::post.show')
            ->withPost($post);
    }

    public function showPost($slug) {
        $post = Post::whereSlug($slug)->first();

        return view('blog::post.show')
            ->withPost($post);
    }

    public function formAddImage($post_id) {
        $post = Post::find($post_id);

        return view('blog::admin.image')
            ->withPost($post);
    }

    public function addImage($post_id) {
        @mkdir(public_path().'/img/');
        @mkdir(public_path().'/img/posts/');
        @mkdir(public_path().'/img/posts/thumbs');

        $post = Post::find($post_id);

        $file = Input::file('image');
        $img = \Image::make($file)->fit(1000, 500);

        $filename = '/img/posts/'.$file->getClientOriginalName();
        $img->save( public_path().$filename );

        $post->image = $file->getClientOriginalName();
        $post->save();

    }

    public function ajax_post_save(Request $request) {
        $fields = array_except(Input::all(), ['_token', 'post_id' ]);

        $fields['slug'] = (strlen($fields['slug']) === 0) ? Str::slug($fields['title']) : Str::slug($fields['slug']);
        if(array_key_exists('tag_id' , $fields)){
            $fields['tag_id'] = json_encode($fields['tag_id']);
        }else{
            $fields['tag_id'] = 'null';
        }
        if(array_key_exists('category_id' , $fields)){
            $fields['category_id'] = json_encode($fields['category_id']);
        }else{
            $fields['category_id'] = 'null';
        }
        if (Input::get('post_id') > 0) {
            $post = Post::find(Input::get('post_id'));
            $post->update($fields);
        } else {
            $post = Post::create($fields);
        }
        $id = Post::latest()->pluck('id')->first();
        if($request->file()){
            $this->addImage($id);
        }
        return redirect()->to('admin/blog');
    }

    public function ajax_post_load() {
        $post_id = Input::get('post_id');


        $post = Post::find($post_id);
        return response()->json($post);
    }

    public function ajax_post_publish() {
        $post_id = Input::get('post_id');

        $post = Post::find($post_id)->update(['post_status' => 'published' ]);


        return response()->json($post);
    }

    public function ajax_options_save() {
        $options = array_except(Input::all(), '_token' );
        foreach ($options as $key=>$val) {
            $option = Option::firstOrCreate( ['name' => $key]);
            $option->value = $val;
            $option->save();

            $ret[] = $option;
        }
        return response()->json($ret);
    }

    public function ajax_category_create() {
        $category_name = Input::get('category_name');

        if (strlen($category_name) == 0) {
            return response()->json(['status' => 'error', 'error' => 'Categories cannot have empty names.']);
        }

        $category = Category::whereName($category_name)->first();
        if ($category) {
            return response()->json(['status' => 'error', 'error' => 'This category already exists.']);
        }

        $category = Category::create(['name' => $category_name, 'slug' => Str::slug($category_name)]);
        return response()->json(['status' => 'success', 'object' => $category]);
    }

    public function ajax_tag_create() {
        $tagname = Input::get('tagname');


        if (strlen($tagname) == 0) {
            return response()->json(['status' => 'error', 'error' => 'Categories cannot have empty names.']);
        }

        $tag = Tag::whereName($tagname)->first();
        if ($tag) {
            return response()->json(['status' => 'error', 'error' => 'This category already exists.']);
        }

        $tag = Tag::create(['name' => $tagname]);
        return response()->json(['status' => 'success', 'object' => $tag]);

    }
}