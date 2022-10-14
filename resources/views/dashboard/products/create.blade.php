@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Products</h1>
</div>

<div class="log-lg-8">
<form method="post" action="/dashboard/products" class="mb-5" enctype="multipart/form-data">
    @csrf
    <label class="title">
			<span>Name Product</span>
		</label>
    <div class="item-cont">
			<input class="large" type="text" name="name_product" id="name_product" placeholder="product name"/>
			<span class="icon-place"></span>
		</div>
	</div>

  <div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" 
    required value="{{ old('slug') }}">
    @error('slug')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
  <label for="image" class="form-label">Product Image</label>
  <img class="img-preview img-fluid mb-3 col-sm-5">
  <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
  @error('image')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
</div>

	<div class="element-number">
		<label class="title">
			<span>Price Product</span>
		</label>
		<div class="item-cont">
			<input class="small" type="text" id="price_product" name="price_product" placeholder="add price"/><span class="icon-place"></span>
       </div>
   </div>

	<div class="element-textarea">
		<label class="title"></label>
    <span>About Product</span>
		<div class="item-cont">
			<textarea class="medium" id="about_product" name="about_product" placeholder="About the product"></textarea>
			<span class="icon-place"></span>
		</div>
	</div>

  <button type="submit" class="btn btn-primary">Create product</button>
</form>
</div>

<!-- <script>
    const name_product = documnet.querySelector('#name_product');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/product/checkSlug?name_product=' + name_product.value)
        .then(response => response.json())
        .then(data = => slug.value = data.slug)
    });

    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.#img-preview');

      imgPreview.style.display = 'block';

      const oFReader= new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
</script> -->

@endsection