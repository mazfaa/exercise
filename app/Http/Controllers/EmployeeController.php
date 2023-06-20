<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Office;
use App\Models\Position;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', ['employees' => Employee::with('position', 'office')->get()]);
    }

    public function options() {
        return [
            'positions' => Position::all(),
            'offices' => Office::all(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('_create', ['options' => $this->options()]);
    }

    public function upload($request) {
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = $photo->storeAs(
                'public/employee/' . uniqid() . '_' . 
                str_replace(' ', '-', strtolower($request->name)) . 
                '.' . $photo->extension()
            );
            return $path;
        }

        return null;
    }

    public function getOption($model, $option) {
        $existOpt = $model::find($option);
        if (!$existOpt) return ($model::create(['name' => $option]))->id;
        return $existOpt->first()->id;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        try {
            $position = $this->getOption(new Position, $request->position_id);
            $office = $this->getOption(new Office, $request->office_id);

            $request['position_id'] = $position;
            $request['office_id'] = $office;

            $data = $request->except('photo');
            $path = $this->upload($request);
            $data['photo'] = $path;

            Employee::create($data);
        } catch (Exception $error) {
            return back()->with('error', 'Something went wrong : ' . $error->getMessage());
        }

        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('_show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('_edit', [
            'employee' => $employee,
            'options' => $this->options()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        try {
            $position = $this->getOption(new Position, $request->position_id);
            $office = $this->getOption(new Office, $request->office_id);

            $request['position_id'] = $position;
            $request['office_id'] = $office;

            $data = $request->except('photo');
            Storage::delete($employee->photo);
            $path = $this->upload($request);
            $data['photo'] = $path;

            $employee->update($data);
        } catch (Exception $error) {
            return back()->with('error', 'Something went wrong : ' . $error->getMessage());
        }

        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $photo = $employee->photo;
            $employee->delete();
            if (!empty($photo)) Storage::delete($photo);
        } catch (Exception $error) {
            return back()->with('error', 'Something went wrong : ' . $error->getMessage());
        }

        return redirect()->route('employee.index');
    }
}
