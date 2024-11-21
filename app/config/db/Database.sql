-- Create Database
drop database if exists Shelly;
create database Shelly;
use Shelly;

call getTaiKhoanPerPage(0, 4);

-- Demo Database
call addTaiKhoan('nhatnam_0955', '12345678', 'Bui Nhat Nam', '1', '1977-01-22', 'Computer Science', 'giangvien');
call addTaiKhoan('myhuyen_1126', '1', 'Luong My Huyen', '0', '1999-08-01', 'Data Science and Analytics', 'giangvien');
call addTaiKhoan('admin1', '1', 'Dang Nhat Duy', '1', '2003-10-27', 'Information Technology', 'quantri');
call addTaiKhoan('hoangtrung_2785', '1', 'Tran Hoang Trung', '1', '1962-11-02', 'Information Technology', 'giangvien');

call addMonHoc('SH001', 'C++ Programming', '2024-06-10', '2024-10-10', 'silk.jpg', 'nhatnam_0955');
call addMonHoc('SH002', 'AI in IT', '2024-06-10', '2024-06-10', 'coffee.jpg', 'nhatnam_0955');
call addMonHoc('SH701', 'Data Structure', '2024-11-2', '2024-3-2', 'plates.jpg', 'nhatnam_0955');
call addMonHoc('SH122', 'Project Managment', '2024-12-08', '2025-04-08', 'coffee.jpg', 'myhuyen_1126');

call addMonHoc('SH122', 'Project Managment', '2024-12-08', '2025-04-08', 'coffee.jpg', 'myhuyen_1126');

call addGhiChu('Parent meeting on 02/10/2024', 'SH001');
call addGhiChu('Give a gift to all students', 'SH002');
call addGhiChu('Update lesson plans before 10/10/2024', 'SH002');
call addGhiChu('@@ Nothing', 'SH002');

call addThanhTuu('3rd place in the "Best AI Application in the Security Field" Award', '2024-01-08', 'Awarded for the SmartCam Insight project, this recognition would celebrate the development of a security-oriented AI system capable of real-time analysis and anomaly detection in video feeds.', 'sea.png', 'nhatnam_0955');
call addThanhTuu('Developing the Smart Video Analysis System project (SmartCam Insight)', '2016-05-22', 'SmartCam Insight is a real-time video analytics system designed for businesses and security organizations.', 'whale.png', 'nhatnam_0955');

call addHocVien('0901014368', 'Le Hong Van', 0, 'Highschool Student');
call addHocVien('0932017332', 'Nguyen Minh Tri', 1, 'Highschool Student', 'SH002');
call addHocVien('0903114820', 'Dang Thanh An', 1, 'Highschool Student', 'SH002');
call addHocVien('0911399842', 'Jessica Truong', 0, 'Highschool Student', 'SH002');
call getAllHocVienInMon('SH002');

call graded('0911399842', 'SH002', 8);