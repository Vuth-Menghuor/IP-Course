// TP11
import { IsString, IsNotEmpty, IsOptional, IsInt } from 'class-validator';

export class CreateTaskDto {
  @IsNotEmpty()
  @IsString()
  username: string;

  @IsOptional()
  @IsString()
  description?: string;

  @IsInt()
  userId: number;
}
