# Project học phần: Niên Luận Cơ Sở (CT271)
4rd.I (2024 - 2025)

# MSSV 
B2105568

# Họ và tên 
Đặng Nhật Duy

# Lớp học phần
CT271 - 09

# Tên dự án
Shelly - Teaching Assitance

Cài đặt Web Root:
    1. Mở file /xampp/apache/conf/extra/httpd-vhosts.conf
    2. Thêm phần VirtualHost phía dưới vào cuối tập tin
    <VirtualHost *:80>
        DocumentRoot "Path to /public folder"
        ServerName shelly.localhost

        <Directory "Path to /public folder">
            Options Indexes FollowSymLinks Includes ExecCGI
            AllowOverride All
            Require all granted
        </Directory>
    </VirtualHost>
    -> Điều chỉnh Path to /public folder
    3. Đã hoàn thành cài đặt Web Root, tiếp tục cài đặt Cơ Sở Dữ Liệu

Cài đặt Cơ Sở Dữ Liệu trên MySQLWorkBench:
    1. Mở phần mềm MySQLWorkBench
    2. Truy cập vào thư mục dự án, lần lượt mở các file trong thư mục /app/config/db/
        2.a> Mở file Database.sql và thực thi 3 dòng lệnh đầu
        2.b> Mở file Tables.sql và thực thi tất cả dòng lệnh
        2.c> Mở file Procedures.sql và thực thi tất cả dòng lệnh
        2.d> Quay lại file Database.sql và thực thi các dòng lệnh còn lại
    3. Sau khi hoàn thành, mở trình duyệt và thử truy cập vào đường dẫn shelly.localhost để truy cập vào trang web


?? NOTE:
    #8EACCD Xanh đậm
    #D2E0FB Xanh nhạt
    #F9F3CC Vàng be
    #D7E5CA Xanh lá