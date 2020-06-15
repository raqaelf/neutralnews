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
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" disabled >
                    </div>
                    <div class="form-group">
                        <label for="email" class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">User Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="" maxlength="50" disabled >
                    </div>
                    <div class="form-group">
                        <label for="role" class="tx-10 tx-uppercase tx-medium tx-spacing-1 mg-b-5 tx-color-03">Role</label>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Enter Name" value="" maxlength="50" disabled >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
