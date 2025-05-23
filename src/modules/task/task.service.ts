import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Task } from 'src/tasks/task.entity';
import { Repository } from 'typeorm';

@Injectable()
export class TaskService {
  constructor(
    @InjectRepository(Task)
    private taskRepo: Repository<Task>,
  ) {}

  getTask(id: number) {
    return this.taskRepo.findOne({
      where: {
        id: id,
      },
    });
  }
  getAllTask() {
    return this.taskRepo.find();
  }
  createTask(body: any) {
    console.log(body);
    const task = this.taskRepo.create(body);
    return this.taskRepo.save(task);
  }
  async updateTask(id: number, updateTask: Partial<Task>) {
    await this.taskRepo.update(id, updateTask);
    return this.getTask(id);
  }
  async deleteTask(id: number) {
    await this.taskRepo.delete(id);
    return { message: 'Task deleted successfully' };
  }
  async deleteAllTasks() {
    await this.taskRepo
      .createQueryBuilder()
      .softDelete()
      .where('true')
      .execute();

    return { message: 'all tasks deleted' };
  }
}
