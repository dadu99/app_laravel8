@extends('admin.template')

@section('title', 'Add new category')

@section('content-users')
    <h1 class="my-4">Add new category</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Control panel</a></li>
            <li class="breadcrumb-item "><a href="{{ route('admin.categories') }}">Categories</a></li>
            <li class="breadcrumb-item active">Add new category</li>
        </ol>
    </nav>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 p-4">

            <div class="custom-file">
                <div class="form-group col-md-6">

                    <div class="image-preview mb-4" id="img-preview">
                        <img id="photo-preview" src="/images/categories/category.jpg" alt="img category"
                            style="max-width: 200px; max-height: 200px; display:block; border-radius:50%;">
                    </div>

                    <div class="custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" name="photo" id="customFile">
                        <label class="custom-file-label" for="customFile"> Choose file</label>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-2">
                <div class="form-check ml-3 mt-3 p-2 text-info">
                    <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="public">
                    <label class="form-check-label" for="defaultCheck1">
                        Public
                    </label>
                </div>
            </div>


            <div class="form-row p-3">

                <div class="form-group col-md-3">
                    <label for="title">Category</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                        id="title" placeholder="The name of the new category" value="{{ old('title') }}">
                    @error('title')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="slug">Slug</label>
                    <input name="slug" type="text" class="form-control @error('slug') is-invalid @enderror"
                        id="slug" placeholder="Slug category" value="{{ old('slug') }}">
                    @error('slug')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="subtitle">Subtitle</label>
                    <input name="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror"
                        id="subtitle" placeholder="Subtitle category" value="{{ old('subtitle') }}">
                    @error('subtitle')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="form-row p-3">
                <div class="form-group col-md-8">
                    <label for="excerpt">Excerpt</label>
                    <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt"
                        placeholder="Description page category"></textarea>

                    @error('excerpt')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="views">Views</label>
                    <input name="views" type="number" class="form-control @error('views') is-invalid @enderror"
                        id="views" placeholder="Views number" value="{{ old('views') }}">
                    @error('views')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="order">Order</label>
                    <input name="order" type="number" class="form-control @error('order') is-invalid @enderror"
                        id="order" placeholder="Order to display" value="{{ old('order') }}">
                    @error('order')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row bh-light my-4">

                <div class="form-group col-md-3">
                    <label for="meta_title">Meta title</label>
                    <input name="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror"
                        id="meta_title" placeholder="Meta title" value="{{ old('meta_title') }}">
                    @error('meta_title')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="meta_description">Meta description</label>
                    <input name="meta_description" type="text"
                        class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"
                        placeholder="Meta Description" value="{{ old('meta_description') }}">
                    @error('meta_description')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="meta_keywords">Meta Keywords</label>
                    <input name="meta_keywords" type="text"
                        class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords"
                        placeholder="Meta keywords" value="{{ old('meta_keywords') }}">
                    @error('meta_keywords')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-info float-left ml-3 mb-5">Create category</button>
            <a href="{{ route('admin.categories') }}" type="submit"
                class="btn btn-secondary float-left ml-2">Cancel</a>
    </form>
@endsection

@section('customJs')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

    <script>
        $(document).ready(function() {
            bsCustomFileInput.init() //https://www.npmjs.com/package/bs-custom-file-input
        })
    </script>

    <script>
        const chooseFile = document.getElementById("customFile");
        const imgPreview = document.getElementById("img-preview");

        chooseFile.addEventListener("change", function() {
            getImgData();
        });

        function getImgData() { //https://w3collective.com/preview-selected-img-file-input-js/
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function() {
                    imgPreview.style.display = "block";
                    imgPreview.innerHTML = '<img src="' + this.result +
                        '" style="max-width: 200px; max-height: 200px; display:block; border-radius: 50%;" class="photo-preview" />';
                });
            }
        }
    </script>
@endsection
