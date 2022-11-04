@if ($model->users->count())  
<input id="bulkId" class="form-check-input fs-15" type="checkbox" disabled name="role_bulk_not_delete" value="{{ $model->id }}">
@else 
<input id="bulkId" class="form-check-input fs-15" type="checkbox" name="role_bulk" value="{{ $model->id }}">
@endif