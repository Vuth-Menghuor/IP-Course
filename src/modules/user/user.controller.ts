// import {
//   Get,
//   Param,
//   Controller,
//   Post,
//   Body,
//   Patch,
//   Delete,
// } from '@nestjs/common';
// import { UsersService } from './user.service';

// @Controller('users')
// export class UsersController {
//   constructor(private readonly userService: UsersService) {}

//   @Get('/:username')
//   getUser(@Param('username') username: string) {
//     return this.userService.getUser(username);
//   }

//   @Post('/users')
//   createUser(
//     @Body() body: { username: string; email: string; password: string },
//   ) {
//     return this.userService.createUser(body);
//   }

//   @Patch('/users/:username')
//   updateUser(
//     @Body() body: { username: string; email: string; password: string },
//   ) {
//     return this.userService.updateUser(body);
//   }

//   @Delete('/users/:username')
//   deleteUser(@Param('username') username: string) {
//     return this.userService.deleteUser(username);
//   }
// }

// Chat
import {
  Get,
  Param,
  Controller,
  Post,
  Body,
  Patch,
  Delete,
} from '@nestjs/common';
import { UsersService } from './user.service';

@Controller('users')
export class UsersController {
  constructor(private readonly userService: UsersService) {}

  @Get('/:id')
  getUser(@Param('id') id: string) {
    return this.userService.findOne(Number(id));
  }

  @Get()
  getAllUser() {
    return this.userService.findAll();
  }

  @Post()
  createUser(
    @Body() body: { username: string; email: string; password: string },
  ) {
    return this.userService.create(body);
  }

  @Patch('/:id')
  updateUser(
    @Param('id') id: string,
    @Body() body: { username?: string; email?: string; password?: string },
  ) {
    return this.userService.update(Number(id), body);
  }

  @Delete('/:id')
  deleteUser(@Param('id') id: number) {
    return this.userService.remove(id);
  }
}
