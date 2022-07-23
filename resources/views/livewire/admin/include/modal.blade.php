<div  class="modal fade" wire:ignore.self
      id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">پرسش</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                آیا از حذف رکورد مطمئن هستید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                <button type="button" data-dismiss="modal"  wire:click="delete()" class="btn btn-danger">حذف کن</button>
            </div>
        </div>
    </div>
</div>
