<script src="{{ asset('assets/admin/assets/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector:'textarea#content',
        plugins : 'autoresize',
        width: '100%',
        height: 300
    });

</script>
<div class="modal fade" id="formModal" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Data</h4>
            </div>
            <form id="dataForm" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    @if(auth()->user()->role == 'admin')
                    <h1 class="author" name="author_id"></h1>
                    <div class="form-group">

                        <label for="active" class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Publish</label>

                        <select name="active" id="active" class="form-control">
                            <option value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        </select>
                    </div>
                    @else
                    <input type="hidden" name="active" id="active" value="0">
                    @endif

                    <div class="form-group">
                        <label for="title" class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Post Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="" maxlength="50" required="">
                    </div>
                    <div class="form-group">
                        <label for="img" class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Post Image</label>
                        <br>
                        <label for="profile_image"></label>
                        <img id="preview_img" src="https://lh3.googleusercontent.com/proxy/BLOE7BuXhfFokxX0TML64dYh1iZcnkZAvYEoUoIvvt9E6d2RALYSy2FkacW5cWjeBa1OekT_0X_BBT6jTVY_WRnp39x_GQUw4X12LYE_q8BmGCCytm3h" name="image" class="" width="200" height="150"/>
                        <input type="file" onchange="loadPreview(this);" name="img" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category" class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Post Category</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content" class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Post Content</label>
                        <textarea class="form-control content" id="content" name="content"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="file-submit" value="create">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(id)
                .attr('src', e.target.result)
                .width(200)
                .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
