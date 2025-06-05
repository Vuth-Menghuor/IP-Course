import {
  Body,
  Controller,
  Delete,
  Get,
  Param,
  Patch,
  Post,
  UsePipes,
  ValidationPipe,
} from '@nestjs/common';
import { TaskService } from './task.service';
import { CreateTaskDto } from './dto/create-task.dto';

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

  // @Post('/')
  // createTask(@Body() body: any) {
  //   return this.taskService.createTask(body);
  // }

  //TP11
  @Post()
  @UsePipes(new ValidationPipe({ whitelist: true }))
  create(@Body() CreateTaskDto: CreateTaskDto) {
    return this.taskService.createTask(CreateTaskDto);
  }

  @Patch('/:id/done')
  markTaskAsDone(
    @Param('id') id: string,
    @Body() body: { name?: string; description?: string },
  ) {
    return this.taskService.updateTask(Number(id), body);
  }

  @Patch('/:id/pending')
  markTaskAsPending(
    @Param('id') id: string,
    @Body() body: { name?: string; description: string },
  ) {
    return this.taskService.updateTask(Number(id), body);
  }

  @Delete('/:id')
  deleteTask(@Param('id') id: number) {
    return this.taskService.deleteTask(id);
  }

  @Delete()
  deleteAllTask() {
    return this.taskService.deleteAllTasks();
  }
}
