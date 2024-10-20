<?php
/*
 * Copyright 2011 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require_once '../../../../../presale - Copy/sosmed/google/test/src/contrib/Google_TasksService.php';

class TasksTest extends BaseTest {
  /** @var Google_TasksService */
  public $taskService;

  public function __construct() {
    parent::__construct();
    $this->taskService = new Google_TasksService(BaseTest::$client);
  }
  
  public function testInsertTask() {
    $list = $this->createTaskList('List: ' . __METHOD__);
    $task = $this->createTask('Task: '.__METHOD__, $list['id']);
    $this->assertIsTask($task);
  }

  public function testGetTask() {
    $tasks = $this->taskService->tasks;
    $list = $this->createTaskList('List: ' . __METHOD__);
    $task = $this->createTask('Task: '. __METHOD__, $list['id']);

    $task = $tasks->get($list['id'], $task['id']);
    $this->assertIsTask($task);
  }

  public function testListTask() {
    $tasks = $this->taskService->tasks;
    $list = $this->createTaskList('List: ' . __METHOD__);

    for ($i=0; $i<4; $i++) {
      $this->createTask("Task: $i ".__METHOD__, $list['id']);
    }

    $tasksArray = $tasks->listTasks($list['id']);
    $this->assertTrue(sizeof($tasksArray) > 1);
    foreach ($tasksArray['items'] as $task) {
      $this->assertIsTask($task);
    }
  }

  private function createTaskList($name) {
    $list = new Google_TaskList();
    $list->title = $name;
    return $this->taskService->tasklists->insert($list);
  }

  private function createTask($title, $listId) {
    $tasks = $this->taskService->tasks;
    $task = new Google_Task();
    $task->title = $title;
    return $tasks->insert($listId, $task);
  }

  private function assertIsTask($task) {
    $this->assertArrayHasKey('title', $task);
    $this->assertArrayHasKey('kind', $task);
    $this->assertArrayHasKey('id', $task);
    $this->assertArrayHasKey('position', $task);
  }
}
