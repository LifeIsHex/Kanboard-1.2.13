<?php

namespace Kanboard\Plugin\TaskSwimlaneChangeMoreThanDays\Action;

use Kanboard\Model\TaskModel;
use Kanboard\Action\Base;

/**
 * Assign a color to a priority
 *
 * @package Kanboard\Action
 * @author  Julien Buratto
 */
class TaskSwimlaneChangeMoreThanDays extends Base
{
    /**
     * Get action description
     *
     * @access public
     * @return string
     */
    public function getDescription()
    {
        return t('Automatically change swimlanes when a tasks due date is MORE than a certain number of days away');
    }

    /**
     * Get the list of compatible events
     *
     * @access public
     * @return array
     */
    public function getCompatibleEvents()
    {
        return array(
            TaskModel::EVENT_DAILY_CRONJOB,
        );
    }

    /**
     * Get the required parameter for the action
     *
     * @access public
     * @return array
     */
    public function getActionRequiredParameters()
    {
        return array(
            'src_swimlane_id' => t('Source Swimlane'),
            'dst_swimlane_id' => t('Destination Swimlane'),
            'num_days' => t('Number of days'),
        );
    }

    /**
     * Get all tasks
     *
     * @access public
     * @return array
     */

    public function getEventRequiredParameters()
    {
        return array('tasks');
    }

    /**
     * Execute the action (change the task color)
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool            True if the action was executed or false when not executed
     */
    public function doAction(array $data)
    {
        $results = array();

        foreach ($data['tasks'] as $task) {
            if ( ($task['swimlane_id'] == $this->getParam('src_swimlane_id')) &&
                 //Logic: The date due is after today + the number of days specified in the plugin
                 //           making this task due in GREATER than xx days
                 ($task['date_due'] > strtotime('+'.$this->getParam('num_days').'days') )
               ) {
                 $values = array(
                    'id'       => $task['id'],
                    'swimlane_id' => $this->getParam('dst_swimlane_id'),
                );
                $results[] = $this->taskModificationModel->update($values, false);
            }
        }

        return in_array(true, $results, true);
    }

    /**
     * Check if the event data meet the action condition
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool
     */
    public function hasRequiredCondition(array $data)
    {
        return count($data['tasks']) > 0;
    }
}
