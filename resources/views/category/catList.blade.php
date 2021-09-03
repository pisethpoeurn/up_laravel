@extends('layout.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="shortcut icon" type="image/png" href="/favicon.ico" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@section('body')
    <div class="container mt-4">
        <h2 class="text-bool text-center">Category List</h2>
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
                            <h5 class="modal-title " id="exampleModalLabel">Add New Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container mt-4">
                                <form action="{{route('categories.store')}}" method="POST">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Description</label><br>
                                        <textarea name="desc" id="desc" cols="" rows="" class="form-control"></textarea>
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($category): ?>
                    <?php foreach($category as $cate): ?>
                    <tr>
                        <td><?php echo $cate['id']; ?></td>
                        <td><?php echo $cate['name']; ?></td>
                        <td><?php echo $cate['description']; ?></td>
                        <td>
                            <a href="#"> <i class="material-icons text-blue" data-toggle="modal" data-target="#edit">
                                    edit
                                </i></a>
                            <!-- Modal -->
                            <div class="modal fade" id="edit" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title " id="exampleModalLabel">Edit Category</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container mt-4">
                                                <form action="#" method="POST">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="Your Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="desc">Description</label><br>
                                                        <textarea name="desc" id="desc" cols="" rows=""
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit"
                                                            class="btn btn-primary btn-block">Submite</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>
        <a href="#" class="___class_+?27___" onclick="return confirm('Are you sure you want to delete this item')"><i
                class="material-icons text-danger">delete</i></a>
        </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
        </table>
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
