<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center">Upload Image</h2>
        <form method="post" enctype="multipart/form-data" id="upload-image" action="{{ route('photo.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success mt-1 mb-1">{{ Session::get('success') }}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="image" placeholder="Choose image" id="image">
                        @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 mb-2">
                    <img id="preview-image-before-upload"
                        src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="preview image"
                        style="max-height: 250px;">
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit">Create</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
    </div>
</body>

</html>
