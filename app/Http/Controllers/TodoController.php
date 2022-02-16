<?php

namespace App\Http\Controllers;


use App\Models\Developer;
use App\Models\Todo;
use App\Service\TodoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{

    private $todoService;

    public function __construct(TodoService $todoService)
    {

        $this->todoService = $todoService;
    }

    public function index()
    {
        $task = $this->todoService->taskList();

        return view('todo', ['tasks' => $task]);

    }

    public function taskList(): \Illuminate\Http\JsonResponse
    {
        $task = $this->todoService->taskList();

        return response()->json(['data' => $task]);
    }


}
