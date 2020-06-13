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
                    <div class="form-group">
                        <label for="title" class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Post Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="" maxlength="50" required="">
                    </div>
                    <div class="form-group">
                        <label for="img" class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Post Image</label>
                        <input type="file" name="img" class="form-control">
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
                    <button type="submit" class="btn btn-primary" id="file-submit" value="create">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
