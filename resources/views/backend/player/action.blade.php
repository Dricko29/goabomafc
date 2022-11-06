    <td>
        {{-- <form id="deleteForm" class="d-inline" action="{{ route('siteman.players.reset', $model->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="button" class="btn btn-sm btn-dark confirm-reset" title="reset"><i class="ri-key-2-line align-bottom me-0"></i></button>
        </form> --}}
        <a href="{{ route('siteman.players.show', $model->id) }}" class="btn btn-sm btn-info" title="detail">
            <i class="ri-eye-fill align-bottom me-0"></i>
        </a>
        <a href="{{ route('siteman.players.edit', $model->id) }}" class="btn btn-sm btn-warning" title="edit">
            <i class="ri-pencil-fill align-bottom me-0"></i>
        </a>
        <form id="deleteForm" class="d-inline" action="{{ route('siteman.players.destroy', $model->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-sm btn-danger confirm-delete" title="hapus"><i class="ri-delete-bin-fill align-bottom me-0"></i></button>
        </form>
    </td>