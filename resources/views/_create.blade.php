<x-app>
  <div class="row mt-5 mb-3">
    <div class="col-6 mx-auto d-flex justify-content-between align-items-center">
      <h4><i class="bi bi-plus"></i> Create Employee</h4>
    </div>
  </div>

  <div class="row">
    <div class="col-6 mx-auto">
      <div class="card w-100 shadow border-0">
        <div class="card-body">
          <form action="{{ route('employee.store') }}" method="post" class="create-employee-form" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" autocomplete="off" autofocus />
    
              @error('name')
                <div class="invalid-feedback">
                  <span class="text-danger">{{ $message }}</span>
                </div>
              @enderror
            </div>
    
            <div class="mb-3">
              <label for="position" class="form-label">Position</label>
              <select name="position_id" class="form-select @error('position_id') is-invalid @enderror">
                <option></option>
                @foreach ($options['positions'] as $position)
                  <option value="{{ $position->id }}" {{ old('position_id') == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
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
                <option></option>
                @foreach ($options['offices'] as $office)
                  <option value="{{ $office->id }}" {{ old('office_id') == $office->id ? 'selected' : '' }}>{{ $office->name }}</option>
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

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app>