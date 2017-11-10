@extends('admin.layout.app')

@section('content')
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-body">
                        @if ($post_id > 0)
                            <h1 class="col-md-offset-2">Edit a Post</h1>
                        @else
                            <h1 class="col-md-offset-2">Create a Post</h1>
                        @endif
                        <form action="/admin/blog/save_post" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="title">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="slug">Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="slug" name="slug">
                                </div>
                            </div>
                            @if(isset($post))
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="slug">Published & Draft</label>
                                    <div class="col-sm-10">
                                        <select name="post_status" id="published_at" class="form-control">
                                            <option value="published" {{ $post->post_status == 'published' ? 'selected' : ''  }}>Published</option>
                                            <option value="draft" {{ $post->post_status == 'draft' ? 'selected' : ''  }}>Draft</option>
                                        </select>
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="slug">Published & Draft</label>
                                    <div class="col-sm-10">
                                        <select name="post_status" id="published_at" class="form-control">
                                            <option value="published" >Published</option>
                                            <option value="draft" >Draft</option>
                                        </select>
                                    </div>
                                </div>
                            @endif
                            @if(isset($post))
                                <div class="form-group">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-10">
                                        @if ($post->image != '')
                                            <img src="{{ $post->image }}" alt="" class="">
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="" class="col-md-2 control-label">
                                    Featured Image
                                </label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="chapo">Category</label>
                                <div class="col-sm-10">
                                    <?php $category = isset($post) ? json_decode($post->category_id) : null; ?>
                                    {!! Form::select('category_id', $categories, $category, ['multiple' => 'multiple' ,   "id"=>"category_id", "class" => "form-control selectpicker"] ) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="chapo">Tags</label>
                                <div class="col-sm-10">
                                    <?php $tag  = isset($post) ? json_decode($post->tag_id) : null; ?>
                                    {!! Form::select('tag_id', $tags, $tag ,  ['multiple' => 'multiple' , 'name'=>'tag_id[]' ,"id"=>"tag_id", "class" => "form-control selectpicker"] ) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="chapo">Excerpt</label>
                                <div class="col-sm-10">
                                    <textarea id="chapo" name="chapo" class="ckeditor form-control">  @if(isset($post)){!! $post->chapo !!}@endif</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="content">Content</label>
                                <div class="col-sm-10">
                                    <textarea id="content" name="content" class="ckeditor form-control">  @if(isset($post)){!! $post->content !!}@endif</textarea>
                                </div>
                            </div>

                            <input name="post_id" type="hidden" id="post_id" value="{{ $post_id }}"/>

                            <button id="btn_save_post" type="submit" class="col-md-offset-2 btn btn-primary">Save post
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer-scripts')

    <script src="//cdn.ckeditor.com/4.7.3/full-all/ckeditor.js"></script>
    <script src="//cdn.ckeditor.com/4.7.3/full-all/adapters/jquery.js"></script>

    <script>

        function showPost(data) {
            $('#title').val(data.title);
            $('#slug').val(data.slug);
            $('#chapo').val(data.chapo);
            $('#content').val(data.content);
            $('#category_id').val(data.category_id);
            $('#tag_id').val(data.tag_id);

        }

        $().ready(function () {

            $('.ckedit').ckeditor(  { name: 'colors', items : [ 'TextColor','BGColor' ] }); // if class is prefered.

            // loading
            var post_id = $('#post_id').val();
            if (post_id > 0) {
                $.post('/admin/blog/load_post', {
                    _token: "{{ csrf_token() }}",
                    post_id: post_id
                }, function (data) {
                    showPost(data);
                }, 'json');
            }

            // saving


            // publishing
            $('#btn_publish_post').click(function (e) {
                e.preventDefault();

                $(this).addClass('disabled');

                $.post('/admin/blog/publish_post', {
                    _token: "{{ csrf_token() }}",

                    post_id: $('#post_id').val()
                }, function (data) {

                    $('#btn_publish_post').removeClass('disabled');

                }, 'json');
            });
        });
    </script>
@endsection