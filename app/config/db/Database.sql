-- Create Database
drop database if exists Shelly;
create database Shelly;
use Shelly;

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
call editMonHoc('SH001', 'C++ Programming', '2024-06-10', '2024-10-10', 'shapes.jpg');
call getAllMonHoc();

call addGhiChu('Parent meeting on 02/10/2024', 'SH001');
call addGhiChu('Give a gift to all students', 'SH002');
call addGhiChu('Update lesson plans before 10/10/2024', 'SH002');
call addGhiChu('@@ Nothing', 'SH002');

call addThanhTuu('3rd place in the "Best AI Application in the Security Field" Award', '2024-01-08', 'Awarded for the SmartCam Insight project, this recognition would celebrate the development of a security-oriented AI system capable of real-time analysis and anomaly detection in video feeds.', 'sea.png', 'nhatnam_0955');
call addThanhTuu('Developing the Smart Video Analysis System project (SmartCam Insight)', '2016-05-22', 'SmartCam Insight is a real-time video analytics system designed for businesses and security organizations.', 'whale.png', 'nhatnam_0955');

call addHocVien('0901014368', 'Le Hong Van', 0, 'Highschool Student');
call addHocVien('0932017332', 'Nguyen Minh Tri', 1, 'Highschool Student', 'SH002');
call addHocVien('0903114820', 'Dang Thanh An', 1, 'Highschool Student', 'SH002');
call addHocVien('0371399842', 'Jessica Truong', 0, 'Highschool Student', 'SH002');
call addHocVien('0918123456', 'Nguyen Minh Tuan', 1, 'University Student', 'SH002');
call addHocVien('0937458921', 'Tran Thi Lan', 0, 'Highschool Student', 'SH002');
call addHocVien('0924687912', 'Le Van Hung', 1, 'Primary School Student', 'SH002');
call addHocVien('0948572345', 'Pham Thi Hanh', 0, 'Highschool Student', 'SH002');
call addHocVien('0913745682', 'Do Quoc Anh', 1, 'College Student', 'SH002');
call addHocVien('0967324891', 'Hoang Thi Mai', 0, 'Secondary School Student', 'SH002');
call addHocVien('0902849573', 'Pham Thanh Dat', 1, 'University Student', 'SH002');
call addHocVien('0926473829', 'Ngo Thi Bich', 0, 'Primary School Student', 'SH002');
call addHocVien('0973857294', 'Vo Duc Minh', 1, 'Highschool Student', 'SH002');
call addHocVien('0912457382', 'Truong Thi Huyen', 0, 'College Student', 'SH002');
call addHocVien('0945738291', 'Le Ngoc Phat', 1, 'University Student', 'SH002');
call addHocVien('0928463725', 'Nguyen Thi Hoa', 0, 'Secondary School Student', 'SH002');
call addHocVien('0935728491', 'Bui Duc Khang', 1, 'Highschool Student', 'SH002');
call addHocVien('0957382914', 'Tran Thi Huong', 0, 'Primary School Student', 'SH002');

call addHocVien('0902948576', 'Hoang Van Nghia', 1, 'University Student', 'SH001');
call addHocVien('0912837465', 'Ngo Thi Thanh', 0, 'Secondary School Student', 'SH001');
call addHocVien('0974829347', 'Phan Quoc Tien', 1, 'College Student', 'SH001');
call addHocVien('0935748291', 'Dang Thi Thao', 0, 'University Student', 'SH001');
call addHocVien('0928473829', 'Trinh Van Khanh', 1, 'Highschool Student', 'SH001');
call addHocVien('0912384756', 'Le Thi Binh', 0, 'College Student', 'SH001');
call deleteHocVien('0912384756');
call getAllHocVien();
select * from hoc;

call graded('0911399842', 'SH002', 8);