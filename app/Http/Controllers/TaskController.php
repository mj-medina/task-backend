<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

/**
 * Class TaskController
 *
 * @author Martin Justin Medina <martin.justin04@gmail.com>
 */
class TaskController extends Controller
{
    /**
     * @var TaskRepository
     */
    protected $taskRepository;

    /**
     * TaskController construct.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Create new task
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTask(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:100',
            'description' => 'required|string',
            'due_date'    => 'required|date',
        ]);

        $user = auth()->user();
        $data = [
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'due_date'    => $request->input('due_date'),
            'completed'   => 0,
        ];

        $task = $this->taskRepository->createTask($user, $data);

        return response()->json($task);
    }

    /**
     * Get user task
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTask(Request $request)
    {
        $user = auth()->user();
        $task = $this->taskRepository->getTasksByUserId($user->id);

        return response()->json($task);
    }

    /**
     * Edit user task
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editTask(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'due_date' => 'required|date'
        ]);

        $editedTask = $this->taskRepository->editTask($request->only([
            'title',
            'description',
            'due_date',
            'id'
        ]));

        return response()->json(['result' => $editedTask]);
    }

    /**
     * Delete user task
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteTask(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $deletedTask = $this->taskRepository->deleteTask($request->only(['id']));
        return response()->json(['result' => $deletedTask]);
    }

    /**
     * Mark as complete or incomplete
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function markTask(Request $request)
    {
        $request->validate([
            'id'        => 'required',
            'completed' => 'required'
        ]);

        $markTask = $this->taskRepository->markTask($request->only(['id', 'completed']));
        return response()->json(['result' => $markTask]);
    }
}
