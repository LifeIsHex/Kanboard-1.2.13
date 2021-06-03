Automatic action: Assign a card to a specific user when created or modified
===========================================================================

This plugin adds an automatic action to Kanboard which will assign a card to a specific user when the task is either created or modified

The reason for using this action is to ensure that all of the cards on a board will show up on a calendar feed (ICS)

It is a requirement that a card has both a due date and an owner for it to properly appear in ICS feeds.

This action will help ensure that items are not accidentally missed because an owner is not assigned.

When adding an automatic action, the action name is shown as
"Automatically set the assignee regardless of column"

Author
------

- David Morlitz
- License MIT

Requirements
------------

- Kanboard >= 1.0.40

Installation
------------

You have the choice between 3 methods:

1. Install the plugin from the Kanboard plugin manager in one click
2. Download the zip file and decompress everything under the directory `plugins/TaskAssignOwner`
3. Clone this repository into the folder `plugins/TaskAssignOwner`

Note: Plugin folder is case-sensitive.
