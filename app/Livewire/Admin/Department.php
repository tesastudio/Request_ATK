<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Dept as ModelDept;
use Livewire\WithPagination;

class Department extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $updateData = false;
    public $katakunci;
    public $sortColumn = 'deptname';
    public $sortDirection = 'desc';

    public $deptname;
    public $depthead;
    public $department_id;
    public $department_selected_id = [];

    public function sort($columnName){
        $this->sortColumn = $columnName;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

    public function render()
    {
        $header_title = 'Department';
        if($this->katakunci != null){
            $data = ModelDept::where('deptname','like','%'.$this->katakunci.'%')
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate(5);
        } else {
            $data = ModelDept::orderBy($this->sortColumn, $this->sortDirection)->paginate(5);
        }
        return view('livewire.admin.department',['dataDepartment' => $data])-> extends('layouts.backend.livewire_blank')->section('content');
        // return view('livewire.admin.department', compact('header_title','dataDepartment'))->extends('layouts.backend.livewire_blank');
    }

    public function clear(){
        $this->deptname = '';
        $this->depthead = '';
        $this->updateData = false;
        $this->employee_id = 0;
        $this->employee_selected_id  = '';
    }

    public function store(){
        $rules = [
            'deptname' => 'required',
            'depthead' => 'required'
        ];
        $pesan = [
            'deptname.required' => 'Nama Department wajib diisi',
            'depthead.required' => 'Nama Kepala Departemen wajib diisi'
        ];
        $validated = $this->validate($rules, $pesan);
        ModelDept::create($validated);
        session()->flash('message','Datab berhasil dimasukkan');
        $this->clear();
    }
    public function edit($id){
        $data = ModelDept::find($id);
        $this->deptname = $data->deptname;
        $this->depthead = $data->depthead;

        $this->updateData = true;
        $this->department_id = $id;
    }

    public function update(){
        $rules = [
            'deptname' => 'required',
            'depthead' => 'required'
        ];
        $pesan = [
            'deptname.required' => 'Nama Department wajib diisi',
            'depthead.required' => 'Nama Kepala Departemen wajib diisi'
        ];
        $validated = $this->validate($rules, $pesan);
        $data = ModelDept::find($this->department_id);
        $data->update($validated);
        session()->flash('message','Datab berhasil diubah');
        $this->clear();
    }

    public function delete(){
        dd('delete');
        if(this->department_id != ''){
            $id = $this->department_id;
            ModelDept::find($id)->delete();
        }
        if(count($this->department_selected_id)){
            for($x = 0; $x < count($this->department_selected_id);$x++){
                ModelDept::find($this->employee_selected_id[$x])->delete();
            }
        }
        session()->flash('message','Data berhasil dihapus');
        $this->clear();
    }

    public function delete_confirmation($id){
        if($id != ''){
            $this->department_id = $id;
        }
    }
}
