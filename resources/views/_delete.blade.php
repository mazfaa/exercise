<div class="modal fade" id="modal-{{ $employee->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalLabel">Deletion Confirmation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="{{ route('employee.destroy', $employee->id) }}" method="post">
          @csrf
          @method('delete')
          
          <button type="submit" class="btn btn-danger">Yes, Delete it!</button>
        </form>
      </div>
    </div>
  </div>
</div>