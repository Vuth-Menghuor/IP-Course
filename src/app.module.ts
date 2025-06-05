import { MiddlewareConsumer, Module, NestModule } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { UserModule } from './modules/user/user.module';
import { TaskModule } from './modules/task/task.module';
import { User } from './modules/user/user.entity';
import { Task } from './modules/task/task.entity';
import { LoggerMiddleware } from './common/middle/logger.middleware';

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
      dropSchema: false, // For development only, remove in production
    }),
    UserModule,
    TaskModule,
  ],
})

//TP11
export class AppModule implements NestModule {
  configure(consumer: MiddlewareConsumer) {
    consumer.apply(LoggerMiddleware).forRoutes('*');
  }
}
