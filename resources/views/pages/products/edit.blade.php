<form action="{{ route('products.update', $task->id) }}" method="POST" enctype="multipart/form">
    @csrf
    <div class="mb-3">
        <label for="name" class="col-form-label">Name:</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $task->name }}">
    </div>
    <div class="mb-3">
        <label for="description" class="col-form-label">Description:</label>
        <textarea class="form-control" name="description" id="description">{{ $task->description }}</textarea>

    </div>
    <div class="mb-3">
        <label for="quantity" class="col-form-label">Quantity:</label>
        <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $task->quantity }}">
    </div>
    <div class="mb-3">
        <label for="price" class="col-form-label">Price:</label>
        <input type="number" class="form-control" name="price" id="price" value="{{ $task->price }}">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary d-grid gap-2 col-6 mx-auto">Update</button>
    </div>
</form>
