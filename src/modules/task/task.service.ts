import { Injectable, NotFoundException } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { Task } from './task.entity';

@Injectable()
export class TaskService {
  constructor(
    @InjectRepository(Task)
    private taskRepo: Repository<Task>,
  ) {}

  // async findOne(id: number) {
  //   const task = await this.taskRepo.find({ where: { id } });
  //   if (!task) {
  //     throw new NotFoundException(`Task with id ${id} not found`);
  //   }
  //   return task;
  // }

  // getTask(id: number) {
  //   return this.taskRepo.findOne({
  //     where: {
  //       id: id,
  //     },
  //   });
  // }

  // TP11
  async getTask(id: number) {
    const task = await this.taskRepo.findOne({ where: { id } });
    if (!task) {
      throw new NotFoundException(`Task with id ${id} not found`);
    }
    return task;
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
