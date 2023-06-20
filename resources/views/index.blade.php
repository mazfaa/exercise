<x-app>
    <div class="row my-5">
      <div class="col-9 mx-auto d-flex justify-content-between align-items-center">
        <h2>Employee</h2>
        <button class="btn btn-sm btn-primary">
          <a href="{{ route('employee.create') }}" class="text-white link-underline link-underline-opacity-0">
            <i class="bi bi-plus"></i> Create
          </a>
        </button>
      </div>
    </div>

    <div class="row my-5">
      <div class="col-9 mx-auto d-flex justify-content-between align-items-center">
        <div class="card w-100 shadow border-0">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover display nowrap w-100">
                <thead>
                  <tr>
                    <td>Name</td>
                    <td>Position</td>
                    <td>Office</td>
                    <td><i class="bi bi-sliders2"></i></td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($employees as $employee)
                    <tr>
                      <td>{{ $employee->name }}</td>
                      <td>{{ $employee->position->name }}</td>
                      <td>{{ $employee->office->name }}</td>
                      <td>
                        <a href="{{ route('employee.show', $employee->id) }}" class="text-dark link-underline link-underline-opacity-0">
                          <button class="btn btn-sm">
                            <i class="bi bi-list-ul"></i>
                          </button>
                        </a>
                        
                        <a href="{{ route('employee.edit', $employee->id) }}" class="text-dark link-underline link-underline-opacity-0">
                          <button class="btn btn-sm">
                            <i class="bi bi-pencil-square"></i>
                          </button>
                        </a>
                        
                        <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{ $employee->id }}">
                          <i class="bi bi-x-circle"></i>
                        </button>
                        @include('_delete')
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</x-app>