@extends('layout.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="shortcut icon" type="image/png" href="/favicon.ico" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@section('body')
    <div class="container mt-4">
        <h2 class="text-bool text-center">Post List</h2>
        <div class="d-flex">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                <i class="text-white">Add New</i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Add New Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container mt-4">
                                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <input id="image" type="file" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Author</label>
                                        <input type="text" name="author" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="short_desc">Short Description</label><br>
                                        <textarea name="short_desc" id="short_desc" cols="" rows="" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Description</label><br>
                                        <textarea name="description" id="desc" cols="" rows="" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="cate">Category</label><br>
                                        <select name="category_id" id="" class="form-control">
                                            <option value="">Please choose category!</option>
                                            @foreach ($categories as $cate)
                                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Submite</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <table class="table table-bordered table-striped" id="user-list">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Autor</th>
                        <th>Short Desc</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($posts): ?>
                    <?php foreach($posts as $post): ?>
                    <tr>
                        <td><?php echo $post['id']; ?></td>
                        <td> <img src="{{asset('assets/img/posts/'.$post->image)}}" width="50px" class="rounded-circle" height="50px" /></td>
                        <td><?php echo $post['title']; ?></td>
                        <td><?php echo $post['author']; ?></td>
                        <td><?php echo $post['short_desc']; ?></td> 
                        <td><?php echo $post['description']; ?></td>
                        <td><?php echo $post->category->name ?></td>
                       
                        <td>
                            <a href="" data-toggle="modal" data-target="#Modal{{ $post->id }}"><i
                                    class="material-icons">edit</i></a>
                            @foreach ($posts as $post)
                                <div class="modal" id="Modal{{ $post->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header text-center">
                                                <h2 class="modal-title">Edit Post</h2>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="{{route("posts.update",$post->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" class="form-control" placeholder="" value="{{ $post->title }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input id="image" type="file" name="image" value="{{$post->image}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="author">Author</label>
                                                        <input type="text" name="author" class="form-control" placeholder="" value="{{ $post->author }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="short_desc">Short Description</label><br>
                                                        <textarea name="short_desc" id="short_desc" cols="" rows="" class="form-control"> {{$post->short_desc}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="desc">Description</label><br>
                                                        <textarea name="description" id="desc" cols="" rows="" class="form-control"> {{$post->description}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cate">Category</label><br>
                                                        <select name="category_id" id="" class="form-control">
                                                            @if(count($categories) > 0)
                                                                @foreach($categories as $category)
                                                                    <option value="{{$category->id}}" {{ $category->id === $post->category_id ? ' selected' : '' }} >{{$category->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="button" class="btn btn-danger btn-right"
                                                        data-dismiss="modal">Close</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- modalll --}}
                            @endforeach
        </div>
        <a href="#" class="text-danger" data-toggle="modal"
            data-target="#removePost{{ $post->id }}"><span class="material-icons text-danger">delete</span></a>
        @method('DELETE')
        </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
        </table>
        <!-- Form Remove Category -->
        @foreach ($posts as $post)
            <div class="modal fade" id="removePost{{ $post->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="{{ route('posts.destroy', $post->id) }}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <h3 class="mb-4"><b>Remove Post</b></h3>
                                <p>Are you sure you want to delete the Post?</p>
                                <button type="submit"
                                    class="text-danger btn btn-outline-default float-right">REMOVE</button>
                                <button type="button" class="text-primary float-right btn btn-outline-default"
                                    data-dismiss="modal">DISCARD</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#user-list').DataTable();
        });
    </script>
@endsection
