<?php namespace didcode\Blog;

use App\Http\Controllers\Controller;
use didcode\Blog\Models\Category;
use didcode\Blog\Models\Option;
use didcode\Blog\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Tag;
use App\Comment;

class BlogController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::isPublished()->get();

        return view('blog::index' , compact('posts' , 'categories' , 'tags'));
    }

    public function show($slug) {
        $post = Post::isPublished()->whereSlug($slug)->first();
        $categories = Category::all();
        $tags = Tag::all();
        return view('blog::post.show')
            ->withPost($post)
            ->withTags($tags)
            ->withCategories($categories)
            ->withPageTitle($post->title.' - Magazine');
    }

    public function showPost($slug) {
        $post = Post::whereSlug($slug)->first();

        $categories = Category::all();
        $tags_ids = json_decode($post->tag_id);
        if($tags_ids != null){
            $tags = Tag::whereIn('id' , $tags_ids)->get();
        }else{
            $tags = Tag::all();
        }
        $comments = Comment::where('post_id' , $post->id)->get();
        return view('blog::post.show' , compact('post' , 'tags'  , 'categories' , 'comments' ));
    }

    public function rss() {
        $posts = Post::isPublished()->orderBy('published_at', 'desc')->take(10)->get(); //TODO use options instead of take(10) !
        $last_build_date = \DateTime::createFromFormat('Y-m-d H:i:s', Post::max('created_at'))->format('D, d M Y H:i:s O');

        $content = view('blog::rss')
            ->withPosts($posts)
            ->withLastBuildDate($last_build_date)
            ->withSiteName(Option::get('site_name'));

        return \Response::make($content, '200')->header('Content-Type', 'text/xml');
    }

    public function showCategory($slug) {
        $categories = Category::all();
        $category = Category::whereSlug($slug)->first();
        $posts = Post::isPublished()->where('category_id', $category->id)->paginate(10);
        $tags = Tag::all();
        return view('blog::category.show')
            ->withPageTitle($category->name)
            ->withPosts($posts)
            ->withTags($tags)
            ->withCategory($category)
            ->withCategories($categories)
            ->withActiveCategory($category->id);
    }

    public function addBlogComments(Request $request){
        $this->validate($request , [
           'text' => 'required'
        ]);
        $inputs = $request->except('_token');
        if(Comment::create($inputs)){
            return redirect()->back()->with('success' ,  'Your comment addet Sucessfully');
        }else{
            return redirect()->back()->withErrors(['error' => 'Please try again']);
        }

    }
}