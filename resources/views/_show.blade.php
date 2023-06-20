<x-app>
  <div class="row my-5">
    <div class="col-5 mx-auto d-flex justify-content-between align-items-center">
      <h4><i class="bi bi-list-ul me-2"></i> Detail Employee - {{ $employee->name }}</h4>
    </div>
  </div>

  <div class="row my-5">
    <div class="col-4 mx-auto">
      <div class="card w-100 shadow border-0">
        <img src="{{ Storage::url($employee->photo) }}" class="rounded" />

        <ul class="list-group list-group-flush">
          <li class="list-group-item">Name : {{ $employee->name }}</li>
          <li class="list-group-item">Position : {{ $employee->position->name }}</li>
          <li class="list-group-item">Office : {{ $employee->office->name }}</li>
        </ul>
      </div>
    </div>
  </div>
</x-app>