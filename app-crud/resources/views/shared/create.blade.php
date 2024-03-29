<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data"
    class="d-flex flex-column align-items-center">
    @csrf

    <div class="form-group">
        <label for="image">Product Image:</label>
        <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*" required>
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" class="form-control @error('product_name') is-invalid @enderror" name="product_name"
            placeholder="Product Name" required>
        @error('product_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" id="price" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Price" min="0" required>
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" class="form-control @error('quantity') is-invalid @enderror" name="quantity" placeholder="Quantity" min="0" required>
        @error('quantity')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="category">Category:</label>
        <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" required>
            <option value="" disabled selected>Select Category</option>
            <option value="Violin">Violin</option>
            <option value="Trumpet">Trumpet</option>
            <option value="Saxophone">Saxophone</option>
            <option value="Piano">Piano</option>
            <option value="Clarinet">Clarinet</option>
        </select>
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>

    <style>
        .form-group {
            width: 300px;
            margin-bottom: 15px;
        }
        .form-control {
            width: 100%;
        }
        .invalid-feedback {
            color: rgb(255, 0, 0);
        }
    </style>
</form>
