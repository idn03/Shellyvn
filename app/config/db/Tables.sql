#TABLE TAIKHOAN
create table Tai_khoan (
	taikhoan varchar(20) primary key,
    matkhau varchar(20) not null,
    hoten varchar(50) not null,
    gioitinh tinyint(1) default 1, -- 1: Male     0: Female
    ngaysinh date,
    chuyennganh varchar(50),
    avatar varchar(255) default "default-avatar.png",
    loaitk varchar(15) not null
)engine = InnoDB;

#TABLE MONHOC
create table Mon_hoc (
	ma_mon varchar(10) primary key,
    tenmon varchar(50) not null,
    ngaybd date,
    ngaykt date,
    ghim tinyint(1) default 0, -- 1: Marked       0: Not Mark
    cover varchar(20),
    taikhoan varchar(20),
    
    foreign key (taikhoan) references Tai_khoan(taikhoan)
)engine = InnoDB;

#TABLE LIENHE
create table Lien_he (
	stt_lienhe int(10) auto_increment primary key,
    noidunglh text,
    ngaytaolh timestamp default current_timestamp,
    loailh varchar(15) not null,
    taikhoan varchar(20),
    
    foreign key (taikhoan) references Tai_khoan(taikhoan)
)engine = InnoDB;

#TABLE THANHTUU
create table Thanh_tuu (
	stt_thanhtuu int(10) auto_increment primary key,
    tenthanhtuu text not null,
    ngaycap date not null,
    mota text,
    icon varchar(20),
    taikhoan varchar(20),
    
    foreign key (taikhoan) references Tai_khoan(taikhoan)
)engine = InnoDB;

#TABLE HOCVIEN
create table Hoc_vien (
	sdt_hocvien varchar(12) primary key,
    tenhocvien varchar(50) not null,
    gioitinh_hocvien tinyint(1) default 1,
    trinhdo_hocvien varchar(20)
)engine = InnoDB;

#TABLE HOC
create table Hoc (
	diem float check (diem >= 0 and diem <= 10),
    sdt_hocvien varchar(12),
    ma_mon varchar(10),
    
    foreign key (sdt_hocvien) references Hoc_vien(sdt_hocvien),
    foreign key (ma_mon) references Mon_hoc(ma_mon),
    primary key (sdt_hocvien, ma_mon)
)engine = InnoDB;

#TABLE GHICU
create table Ghi_chu (
    stt_ghichu int(10) auto_increment primary key,
    noidung_ghichu text not null,
    ma_mon varchar(10),

    foreign key (ma_mon) references Mon_hoc(ma_mon)
)engine = InnoDB;

