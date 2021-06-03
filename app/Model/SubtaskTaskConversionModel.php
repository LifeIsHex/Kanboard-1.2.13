<?php

namespace Kanboard\Model;

use Kanboard\Core\Base;

/**
 * Class SubtaskTaskConversionModel
 *
 * @package Kanboard\Model
 * @author  Frederic Guillot
 */
class SubtaskTaskConversionModel extends Base
{
    /**
     * Convert a subtask to a task
     *
     * @access public
     * @param  integer $project_id
     * @param  integer $subtask_id
     * @return integer
     */
    public function convertToTask($project_id, $subtask_id)
    {
        $subtask = $this->subtaskModel->getById($subtask_id);
        $parent_task = $this->taskFinderModel->getById($subtask['task_id']);

        $task_id = $this->taskCreationModel->create(array(
            'project_id' => $project_id,
            'title' => $subtask['title'],
            'time_estimated' => $subtask['time_estimated'],
            'time_spent' => $subtask['time_spent'],
            'owner_id' => $subtask['user_id'],
            'swimlane_id' => $parent_task['swimlane_id'],
            'priority' => $parent_task['priority'],
            'column_id' => $parent_task['column_id'],
            'category_id' => $parent_task['category_id']
        ));

        if ($task_id !== false) {
            $this->taskLinkModel->create($task_id, $subtask['task_id'], 6);
            $this->subtaskModel->remove($subtask_id);
        }

        return $task_id;
    }
}
