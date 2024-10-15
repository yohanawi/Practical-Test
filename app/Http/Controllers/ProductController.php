<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $task;
    public function __construct()
    {
        $this->task = new Products();
    }
    public function index()
    {
        $response['tasks'] = $this->task->all();
        return view('pages.products.index')->with($response);
    }

    public function store(Request $request)
    {
        $this->task->create($request->all());
        return redirect()->route('products');
    }

    public function delete($task_id)
    {
        $task = $this->task->find($task_id);
        $task->delete();
        return redirect()->route('products');
    }

    public function edit(Request $request)
    {
        $response['task'] = $this->task->find($request['task_id']);
        return view('pages.products.edit')->with($response);
    }

    public function update(Request $request, $task_id)
    {
        $task = $this->task->find($task_id);
        $task->update($request->all());
        return redirect()->back();
    }
}
