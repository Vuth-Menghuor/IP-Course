import {
  Body,
  Controller,
  Delete,
  Get,
  Param,
  Patch,
  Post,
} from '@nestjs/common';
import { TaskService } from './task.service';

@Controller('tasks')
export class TasksController {
  constructor(private readonly taskService: TaskService) {}

  @Get('/:id')
  getTask(@Param('id') id: number) {
    return this.taskService.getTask(id);
  }

  @Get()
  getAllTasks() {
    return this.taskService.getAllTask();
  }

  @Post('/')
  createTask(@Body() body: any) {
    return this.taskService.createTask(body);
  }

  @Patch('/:id/done')
  markTaskAsDone(
    @Param('id') id: number,
    @Body() body: { name?: string; description?: string },
  ) {
    return this.taskService.updateTask(id, body);
  }

  @Patch('/:id/pending')
  markTaskAsPending(
    @Param('id') id: number,
    @Body() body: { name?: string; description: string },
  ) {
    return this.taskService.updateTask(id, body);
  }

  @Delete('/:id')
  deleteTask(@Param('id') id: number) {
    return this.taskService.deleteTask(id);
  }
}
