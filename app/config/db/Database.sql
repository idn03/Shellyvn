-- Create Database
drop database if exists Shelly;
create database Shelly;
use Shelly;

-- Demo Database

call addTaiKhoan('nhatnam_0955', '12345678', 'Bui Nhat Nam', '1', '1977-01-22', 'Computer Science', 'giangvien');
call addTaiKhoan('myhuyen_1126', '1', 'Luong My Huyen', '0', '1999-08-01', 'Data Science and Analytics', 'giangvien');
call addTaiKhoan('admin1', '1', 'Dang Nhat Duy', '1', '2003-10-27', 'Information Technology', 'quantri');

call addMonHoc('SH001', 'C++ Programming', '2024-06-10', '2024-10-10', 'silk.jpg', 'nhatnam_0955');
call addMonHoc('SH002', 'AI in IT', '2024-06-10', '2024-06-10', 'coffee.jpg', 'nhatnam_0955');
call addMonHoc('SH701', 'Data Structure', '2024-11-2', '2024-3-2', 'plates.jpg', 'nhatnam_0955');
call addMonHoc('SH122', 'Project Managment', '2024-12-08', '2025-04-08', 'coffee.jpg', 'myhuyen_1126');

call addGhiChu('Parent meeting on 02/10/2024', 'SH001');

call addHocVien('0901014368', 'Le Hong Van', 0, 'Highschool Student');