@if ($model->roles->count())  
<input id="bulkId" class="form-check-input fs-15" type="checkbox" disabled name="permission_bulk_not_delete" value="{{ $model->id }}">
@else 
<input id="bulkId" class="form-check-input fs-15" type="checkbox" name="permission_bulk" value="{{ $model->id }}">
@endif