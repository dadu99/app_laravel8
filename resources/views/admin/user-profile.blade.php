@extends('admin.template')

@section('title', 'Edit Profile' . ' ' . $user->name)

@section('content-users')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Control Panel</a></li>
            <li class="breadcrumb-item active">Edit profile {{ $user->name }}</li>
        </ol>
    </nav>

    @if (Session::has('user_message'))
        <div class="alert alert-warning">
            {!! Session::get('user_message') !!}
        </div>
    @endif
    <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 p-4">

            <div class="custom-file">
                <div class="form-group col-md-6">

                    <div class="image-preview mb-4" id="img-preview">
                        <img id="photo-preview" src="{{ '/images/users/' . $user->photo }}" alt="img user"
                            style="max-width: 200px; max-height: 200px; display:block;">
                    </div>

                    <div class="custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" name="photo" id="customFile">
                        <label class="custom-file-label" for="customFile"> Choose file</label>
                    </div>
                </div>
            </div>

            <div class="form-row p-3">
                <div class="form-group col-md-3">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Your name" value="{{ $user->name }}">
                    @error('name')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="Email" value="{{ $user->email }}">
                    @error('email')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row p-3">
                <div class="form-group col-md-3">
                    <label for="phone">Phone</label>
                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                        id="phone" placeholder="Phone number" value="{{ $user->phone }}">
                    @error('phone')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="address">Address</label>
                    <input name="address" type="text" class="form-control @error('address') is-invalid @enderror"
                        id="address" placeholder="Type your address.." value="{{ $user->address }}">
                    @error('address')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-left ml-3 mb-5">Update profile</button>
            <a href="{{ route('users') }}" type="submit" class="btn btn-secondary ml-2 float-left">Cancel</a>
        </div>
    </form>

    <div class="col-md-10">
        <div class="card p-4 m-5">
            <form action="{{ route('user.reset-password') }}" method="POST" id="reset-password">
                @csrf
                @method('put')

                <h3>Reset password:</h3>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="password">Old Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" placeholder="Password">
                        @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="passwordnew">New password</label>
                        <input name="passwordnew" type="password"
                            class="form-control @error('password') is-invalid @enderror" id="passwordnew"
                            placeholder="Please new password">
                        @error('passwordnew')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-5">
                        <label for="passwordnew_confirmation">Confirm new password</label>
                        <input name="passwordnew_confirmation" type="password"
                            class="form-control @error('passwordnew_confirmation') is-invalid @enderror"
                            id="passwordnew_confirmation" placeholder="Confirm password">
                        @error('passwordnew_confirmation')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <button type="submit" class="btn btn-danger float-right mb-2">Reset password</button>
            </form>
        </div>

    </div>
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
                        '" style="max-width: 200px; max-height: 200px; display:block; border-radius: 50%;" />';
                });
            }
            console.log(files);
        }
    </script>
@endsection
