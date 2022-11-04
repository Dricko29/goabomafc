    <td>
        <a href="{{ route('siteman.access.permissions.show', $model->id) }}" class="btn btn-sm btn-info" title="detail">
            <i class="ri-eye-fill align-bottom me-0"></i>
        </a>
        <a href="{{ route('siteman.access.permissions.edit', $model->id) }}" class="btn btn-sm btn-warning" title="edit">
            <i class="ri-pencil-fill align-bottom me-0"></i>
        </a>
        <form id="deleteForm" class="d-inline" action="{{ route('siteman.access.permissions.destroy', $model->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-sm btn-danger confirm-delete" title="hapus"><i class="ri-delete-bin-fill align-bottom me-0"></i></button>
        </form>
    </td>