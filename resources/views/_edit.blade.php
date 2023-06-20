<x-app>
  <div class="row mt-5 mb-3">
    <div class="col-6 mx-auto d-flex justify-content-between align-items-center">
      <h4><i class="bi bi-pencil-square"></i> Edit Employee</h4>
    </div>
  </div>

  <div class="row">
    <div class="col-6 mx-auto">
      <div class="card w-100 shadow border-0">
        <div class="card-body">
          <form action="{{ route('employee.update', $employee->id) }}" method="post" enctype="multipart/form-data" class="edit-employee-form">
            @csrf
            @method('put')
            
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" value="{{ old('name', $employee->name) }}" class="form-control @error('name') is-invalid @enderror" id="name" autocomplete="off" autofocus />
    
              @error('name')
                <div class="invalid-feedback">
                  <span class="text-danger">{{ $message }}</span>
                </div>
              @enderror
            </div>
    
            <div class="mb-3">
              <label for="position" class="form-label">Position</label>
              <select name="position_id" class="form-select @error('position_id') is-invalid @enderror">
                @foreach ($options['positions'] as $position)
                  <option value="{{ $position->id }}" {{ old('position_id', $employee->position->id) == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
                @endforeach
              </select>
    
              @error('position_id')
                <div class="invalid-feedback">
                  <span class="text-danger">{{ $message }}</span>
                </div>
              @enderror
            </div>
    
            <div class="mb-3">
              <label for="office" class="form-label">Office</label>
              <select name="office_id" class="form-select @error('office_id') is-invalid @enderror">
                @foreach ($options['offices'] as $office)
                  <option value="{{ $office->id }}" {{ old('office_id', $employee->office->id) == $office->id ? 'selected' : '' }}>{{ $office->name }}</option>
                @endforeach
              </select>
    
              @error('office_id')
                <div class="invalid-feedback">
                  <span class="text-danger">{{ $message }}</span>
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="photo" class="form-label">Photo Profile</label>
              <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo" />
            </div>

            @error('photo')
              <div class="invalid-feedback">
                <span class="text-danger">{{ $message }}</span>
              </div>
            @enderror

            <button type="submit" class="btn btn-primary">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app>