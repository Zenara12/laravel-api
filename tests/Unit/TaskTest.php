<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    /**
     * Test the task title with body of the Task model
     */
    public function test_task_title_with_body(): void
    {
        $task = new Task([
            'title'=>'TitleTest',
            'body'=>'Body Test'
        ]);

        $this->assertEquals('TitleTest:Body Test',$task->task());
        $this->assertNotEmpty('TitleTest:Body Test',$task->task());
    }
}
