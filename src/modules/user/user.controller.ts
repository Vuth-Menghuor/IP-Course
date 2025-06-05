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
  ValidationPipe,
  UsePipes,
} from '@nestjs/common';
import { UsersService } from './user.service';
import { CreateUserDto } from './dto/create-user.dto';

@Controller('users')
export class UsersController {
  constructor(private readonly userService: UsersService) {}

  @Get('/:id')
  getUser(@Param('id') id: number) {
    return this.userService.findOne(id);
  }

  @Get()
  getAllUser() {
    return this.userService.findAll();
  }

  // @Post()
  // createUser(
  //   @Body() body: { username: string; email: string; password: string },
  // ) {
  //   return this.userService.create(body);
  // }

  //TP11
  @Post()
  @UsePipes(new ValidationPipe({ whitelist: true }))
  create(@Body() createUserDto: CreateUserDto) {
    return this.userService.create(createUserDto);
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
