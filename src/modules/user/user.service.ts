import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { User } from 'src/users/user.entity';
import { Repository } from 'typeorm';

// @Injectable()
// export class UserService {
//   createUser(body: any) {
//     console.log(body);
//     return {
//       username: 'Dara',
//       email: 'dara@gmail.com',
//       password: '123',
//     };
//   }
//   getUser(username: string) {
//     console.log(username);
//     return {
//       username: 'Dara',
//       email: 'dara@gmail.com',
//       password: '123',
//     };
//   }
//   updateUser(body: any) {
//     console.log(body);
//     return {
//       username: 'Dara',
//       email: 'dara@gmail.com',
//       password: '123',
//     };
//   }
//   deleteUser(username: string) {
//     console.log(username);
//     return { message: 'success' };
//   }
// }

@Injectable()
export class UsersService {
  constructor(
    @InjectRepository(User)
    private usersRepo: Repository<User>,
  ) {}

  create(userData: Partial<User>) {
    const user = this.usersRepo.create(userData);
    return this.usersRepo.save(user);
  }

  findAll() {
    return this.usersRepo.find({ relations: ['tasks'] });
  }

  findOne(id: number) {
    return this.usersRepo.findOne({ where: { id }, relations: ['tasks'] });
  }

  async update(id: number, updateData: Partial<User>) {
    await this.usersRepo.update(id, updateData);
    return this.findOne(id);
  }

  remove(id: number) {
    return this.usersRepo.delete(id);
  }
}
