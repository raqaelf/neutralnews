<div class="modal fade" id="formModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Data</h4>
            </div>
            <form id="dataForm" name="dataForm" class="form-horizontal">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">User Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="" >
                    </div>
                    <div class="form-group">
                        <label for="email" class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">User Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="" maxlength="50" required="" >
                    </div>
                    <div class="form-group">
                        <label for="role" class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Post Category</label>
                        <select name="role" id="role" class="form-control">
                            <option value="author">author</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
