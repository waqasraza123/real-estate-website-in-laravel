@extends('admin.layout.app')

@section('content')
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-body">
                        <h2>Categories</h2>
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th># of posts</th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->posts_num }}</td>

                                </tr>

                            @endforeach
                        </table>
                        <input type="text" id="new_cat" name="new_cat" value=""/>
                        <button id="create_category" class="btn btn-success">Create Category</button>

                        <hr/>
                        <h2>Posts</h2>

                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Status</th>
                                <th>Published on</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->post_status }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <a href="{{ action('\didcode\Blog\AdminController@editPost', $post->id) }}"
                                           class="btn btn-primary">Edit</a>
                                        @if (!$post->is_published() )
                                            <button data-id="{{$post->id}}" class="btn btn-publish btn-success">
                                                Publish
                                            </button>
                                        @endif
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                        <a href="{{ action('\didcode\Blog\AdminController@createPost') }}" class="btn btn-success">Create
                            post</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer-scripts')
    <script>
        $().ready(function () {

            $('#btn_save_options').click(function (e) {
                e.preventDefault();

                $.post('/admin/blog/save_options', {
                    _token: "{{ csrf_token() }}",
                    rss_name: $('#option_rss_name').val(),
                    rss_number: $('#option_rss_number').val(),
                    rss_fullposts: $('#option_rss_fullposts').val()
                }, function (data) {
                    console.log('options saved');
                });
            });


            // categories

            $('#create_category').click(function (e) {
                e.preventDefault();
                $(this).addClass('disabled');
                var btn = $(this);

                $.post('/admin/blog/create_category', {
                    _token: "{{ csrf_token() }}",
                    category_name: $('#new_cat').val()

                }, function (data) {
                    $(btn).removeClass('disabled');

                    if (data.status == 'success') {
                        toastr.success('Category created.');
                        window.location.reload()
                    } else {
                        toastr.error(data.error);
                    }
                }, 'json');
            });

            // publishing
            $('.btn-publish').click(function (e) {
                e.preventDefault();
                $(this).addClass('disabled');
                var post_id = $(this).data('id');
                var btn = $(this);
                $.post('/admin/blog/publish_post', {
                    _token: "{{ csrf_token() }}",
                    post_id: post_id
                }, function (data) {
                    $(btn).removeClass('disabled');
                    if(data == true){
                        toastr.success('Post published')
                    }

                }, 'json');
            });

        });
    </script>

@endsection