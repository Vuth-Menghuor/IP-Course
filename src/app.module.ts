import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { UserModule } from './modules/user/user.module';
import { TaskModule } from './modules/task/task.module';
import { User } from './users/user.entity';
import { Task } from './tasks/task.entity';
// import { AppController } from './app.controller';
// import { AppService } from './app.service';
// import { UserModule } from './modules/user/user.module';
// import { TaskModule } from './modules/task/task.module';

@Module({
  // imports: [UserModule, TaskModule],
  // controllers: [AppController],
  // providers: [AppService],
  imports: [
    TypeOrmModule.forRoot({
      type: 'sqlite',
      database: 'todo.sqlite',
      entities: [User, Task],
      synchronize: true,
    }),
    UserModule,
    TaskModule,
  ],
})
export class AppModule {}
