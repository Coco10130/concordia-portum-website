<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="d-flex justify-content-center align-items-center">
    @csrf

    <input type="file" name="image" accept="image/*" required>
    <input type="text" name="product_name" placeholder="Product Name" required>
    <input type="number" name="price" placeholder="Price" required>

    <button type="submit">Submit</button>
</form>
