<?php

namespace App\Repositories;

use App\Models\Task;

/**
 * Class TaskRepository
 *
 * @author Martin Justin Medina <martin.justin04@gmail.com>
 */
class TaskRepository
{
    /**
     * Get task by user ID
     * @param string $userId
     * @return mixed
     */
    public function getTasksByUserId(string $userId)
    {
        return Task::where('user_id', $userId)->get();
    }

    /**
     * Create a task
     * @param $user
     * @param $data
     * @return Task
     */
    public function createTask($user, $data)
    {
        $task = new Task($data);
        $task->user()->associate($user);
        $task->save();
        return $task;
    }

    /**
     * Edit task
     * @param array $data
     * @return false
     */
    public function editTask(array $data)
    {
        $task = Task::find($data['id']);

        if (!$task) {
            return false;
        }

        $task->update($data);
        return $task;
    }

    /**
     * Delete user task
     * @param $taskId
     * @return mixed
     */
    public function deleteTask($taskId)
    {
        return Task::where('id', $taskId)->delete();
    }

    /**
     * Mark task
     * @param array $data
     * @return false
     */
    public function markTask(array $data)
    {
        $task = Task::find($data['id']);

        if (!$task) {
            return false;
        }

        $task->update($data);
        return $task;
    }
}
