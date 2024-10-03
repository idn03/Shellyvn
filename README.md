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
-> Điều chỉnh Path to /public folder
<VirtualHost *:80>
    DocumentRoot "Path to /public folder"
    ServerName shelly.localhost

    <Directory "Path to /public folder">
        Options Indexes FollowSymLinks Includes ExecCGI
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>

?? NOTE:
    #8EACCD Xanh đậm
    #D2E0FB Xanh nhạt
    #F9F3CC Vàng be
    #D7E5CA Xanh lá