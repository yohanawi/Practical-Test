@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <main class="content1 px-3 py-2">
                    <div class="container-fluid">
                        <div class="content-header mb-3">
                            <h2 class="text-center fw-bold" style="font-size: 24px">Products</h2>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" style="width: 185px"><i
                                                class="fa fa-plus pe-2"></i>Add
                                            Product</button>
                                    </div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add
                                                        New Item</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('products.store') }}" method="POST"
                                                        enctype="multipart/form">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="name" class="col-form-label">Name:</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="name" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description"
                                                                class="col-form-label">Description:</label>
                                                            <textarea class="form-control" name="description" id="description"></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="quantity" class="col-form-label">Quantity:</label>
                                                            <input type="number" class="form-control" name="quantity"
                                                                id="quantity" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="price" class="col-form-label">Price:</label>
                                                            <input type="number" class="form-control" name="price"
                                                                id="price" placeholder="LKR." required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="reset" value="Reset"
                                                                class="btn btn-secondary d-grid gap-2 col-4 mx-auto">Reset</button>
                                                            <button type="submit"
                                                                class="btn btn-primary d-grid gap-2 col-6 mx-auto">Add</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="box-body">
                                        <table id="example1" class="table table-bordered border-dark">
                                            <thead>
                                                <tr class="table-dark" style="text-align: center">
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($tasks->count() > 0)
                                                    @foreach ($tasks as $key => $task)
                                                        <tr>
                                                            <td>{{ ++$key }}. </td>
                                                            <td>{{ $task->name }}</td>
                                                            <td>{{ $task->quantity }}</td>
                                                            <td>{{ $task->description }}</td>
                                                            <td>LKR. {{ $task->price }}</td>
                                                            <td>

                                                                <a href="javascript:void(0)"
                                                                    class = "btn btn-warning btn-xs"
                                                                    onclick="productEditModal({{ $task->id }})"><i
                                                                        class="fa fa-edit"></i></a>
                                                                <a href="{{ route('products.delete', $task->id) }}"
                                                                    class="btn btn-danger btn-xs"><i
                                                                        class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="8">
                                                            <center>No User Found!</center>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="EditProduct">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function productEditModal(task_id) {
            var data = {
                task_id: task_id,
            };
            $.ajax({
                url: "{{ route('products.edit') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                dataType: '',
                data: data,
                success: function(response) {
                    $('#editModal').modal('show');
                    $('#EditProduct').html(response);

                }
            });
        }
    </script>
@endpush
