@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit New Products</h1>
</div>

<div class="log-lg-8">
<form method="post" action="/dashboard/products/{{ $product->id }}" class="mb-5" enctype="multipart/form-data">
@method('put')    
@csrf
    <label class="title">
			<span>Name Product</span>
		</label>
    <div class="item-cont">
			<input class="large" type="text" name="name_product" id="name_product" placeholder="product name" required autofocus value="{{ old('name_product', $product->name_product) }}"/>
			<span class="icon-place"></span>
		</div>
	</div>

  <div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" 
    required value="{{ old('slug', $product->slug) }}">
    @error('slug')
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
			<input class="small" type="text" id="price_product" name="price_product" placeholder="add price" value="{{ old('body', $product->price_product) }}"/><span class="icon-place"></span>
       </div>
   </div>

  <div class="mb-3">
    <label for="about_product" class="form-label">Body</label>
    <input type="text" class="form-control @error('about_product') is-invalid @enderror" id="about_product" name="about_product" 
    value="{{ old('about_product', $product->about_product) }}">
    @error('about_product')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror

	
	<!-- <div class="element-file">
		<label class="title">
			<span>*</span>
		</label>
		<div class="item-cont">
		 <label class="large">
		   <div class="button">Choose</div>
		   <input type="file" class="file_input" name="img_product" id="img_product" />
		   <div class="file_text">Choose a picture for your product</div>
           <span class="icon-place"></span>
        </label>
      </div>
    </div> -->

  <button type="submit" class="btn btn-primary">Create product</button>
</form>
</div>

<script>
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
</script>

@endsection