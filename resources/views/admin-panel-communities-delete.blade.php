{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('admin/community/{community}/delete',$community->communityId }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Are you sure you want to delete {{ $remove->communityName }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Yes, Delete Community</button>
    </div>
</form>