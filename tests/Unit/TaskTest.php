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
        $this->assertNotEquals('TESTTESTESt',$task->task());
    }

    /**
     * Test the task title with body of the Task model
     */

    public function test_task_status_boolean_or_zero_and_one_only(): void
    {
        $task = new Task([
            'status'=>true,
        ]);

        $this->assertIsBool(true,$task->status());
        $this->assertIsBool(false,$task->status());
        $this->assertIsNotBool(1,$task->status());
        $this->assertIsNotBool('',$task->status());

    }
}
