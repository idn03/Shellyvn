-- Procedures of Tai_khoan
DELIMITER $$
    drop procedure if exists getAllTaiKhoan $$
    create procedure getAllTaiKhoan()
    begin
        select *
        from tai_khoan
        order by loaitk desc;
    end $$
$$

DELIMITER $$
    drop procedure if exists getFullName $$
    create procedure getFullName(in _taikhoan varchar(20))
    begin
        select hoten
        from tai_khoan
        where taikhoan = _taikhoan;
    end $$
$$

DELIMITER $$
    drop procedure if exists getOneTaiKhoan $$
    create procedure getOneTaiKhoan(in _taikhoan varchar(20))
    begin
        select *
        from tai_khoan
        where taikhoan = _taikhoan;
    end $$
$$

DELIMITER $$
    drop procedure if exists addTaiKhoan $$
    create procedure addTaiKhoan(
        in _taikhoan varchar(20), 
        in _matkhau varchar(20), 
        in _hoten varchar(50), 
        in _gioitinh tinyint(1), 
        in _ngaysinh date,
        in _chuyennganh varchar(50),
        in _loaitk varchar(15)
        )
    begin
        insert into tai_khoan(taikhoan, matkhau, hoten, gioitinh, ngaysinh, chuyennganh, loaitk)
        values(_taikhoan, _matkhau, _hoten, _gioitinh, _ngaysinh, _chuyennganh, _loaitk);
    end
$$

DELIMITER $$
    drop procedure if exists editTTTaiKhoan $$
    create procedure editTTTaiKhoan(
        in _avatar varchar(255),
        in _taikhoan varchar(20), 
        in _hoten varchar(50), 
        in _gioitinh tinyint(1), 
        in _ngaysinh date,
        in _chuyennganh varchar(50),
        in _loaitk varchar(15)
        )
    begin
        update tai_khoan
        set avatar = _avatar, hoten = _hoten, gioitinh = _gioitinh, ngaysinh = _ngaysinh, chuyennganh = _chuyennganh, loaitk = _loaitk
        where _taikhoan = taikhoan;
    end
$$

DELIMITER $$
    drop procedure if exists editMKTaiKhoan $$
    create procedure editMKTaiKhoan(
        in _taikhoan varchar(20), 
        in _matkhau varchar(20)
        )
    begin
        update tai_khoan
        set matkhau = _matkhau
        where _taikhoan = taikhoan;
    end
$$

DELIMITER $$
    drop procedure if exists deleteTaiKhoan $$
    create procedure deleteTaiKhoan(in _taikhoan varchar(20))
    begin
        declare exit handler for sqlexception
        begin
            rollback;
            RESIGNAL;
        end;

        declare exit handler for sqlwarning
        begin
            rollback;
            RESIGNAL;
        end;

        start transaction;
        delete from lien_he where taikhoan = _taikhoan;
        delete from mon_hoc where taikhoan = _taikhoan;
        delete from thanh_tuu where taikhoan = _taikhoan;

        delete from tai_khoan where taikhoan = _taikhoan;
        commit;
    end 
$$

-- Proreduces of Mon_hoc
DELIMITER $$
    drop procedure if exists getAllMonHoc $$
    create procedure getAllMonHoc()
    begin
        select *
        from mon_hoc
        order by ghim desc;
    end $$
$$
call getAllMonHoc();

DELIMITER $$
    drop procedure if exists getAllMonHocBySomeOne $$
    create procedure getAllMonHocBySomeOne(in _taikhoan varchar(20))
    begin
        select *
        from mon_hoc
        where taikhoan = _taikhoan
        order by ghim desc;
    end $$
$$

DELIMITER $$
    drop procedure if exists getOneMonHoc $$
    create procedure getOneMonHoc(in _ma_mon varchar(12))
    begin
        select *
        from mon_hoc
        where ma_mon = _ma_mon;
    end $$
$$

DELIMITER $$
    drop procedure if exists addMonHoc $$
    create procedure addMonHoc(in _ma_mon varchar(10), in _tenmon varchar(50), in _ngaybd date, in _ngaykt date, in _cover varchar(20), in _taikhoan varchar(20))
    begin
        insert into mon_hoc(ma_mon, tenmon, ngaybd, ngaykt, cover, taikhoan)
        values(_ma_mon, _tenmon, _ngaybd, _ngaykt, _cover, _taikhoan);
    end
$$

DELIMITER $$
    drop procedure if exists editMonHoc $$
    create procedure editMonHoc(in _ma_mon varchar(10),  in _tenmon varchar(50), in _ngaybd date, in _ngaykt date, in _taikhoan varchar(20))
    begin
        update mon_hoc
        set  tenmon = _tenmon, ngaybd = _ngaybd, ngaykt = _ngaykt, taikhoan = _taikhoan 
        where _ma_mon = ma_mon;
    end
$$

DELIMITER $$
    drop procedure if exists deleteMonHoc $$
    create procedure deleteMonHoc(in _ma_mon varchar(10))
    begin
        declare exit handler for sqlexception
        begin
            rollback;
            RESIGNAL;
        end;

        declare exit handler for sqlwarning
        begin
            rollback;
            RESIGNAL;
        end;

        start transaction;
        delete from ghi_chu where ma_mon = _ma_mon;

        delete from hoc where ma_mon = _ma_mon;

        delete from mon_hoc where ma_mon = _ma_mon;
        commit;
    end
$$

-- Procedures of Ghi_chu
DELIMITER $$
    drop procedure if exists getAllGhiChu $$
    create procedure getAllGhiChu()
    begin
        select *
        from ghi_chu;
    end $$
$$
call getAllGhiChu();

DELIMITER $$
    drop procedure if exists addGhiChu $$
    create procedure addGhiChu(in _noidung_ghichu text, in _ma_mon varchar(10))
    begin
        insert into ghi_chu(noidung_ghichu, ma_mon)
        values(_noidung_ghichu, _ma_mon);
    end
$$

DELIMITER $$
    drop procedure if exists editGhiChu $$
    create procedure editGhiChu(in _stt_ghichu int(10),  in _noidung_ghichu text)
    begin
        update ghi_chu
        set  noidung_ghichu = _noidung_ghichu
        where _stt_ghichu = stt_ghichu;
    end
$$

DELIMITER $$
    drop procedure if exists deleteGhiChu $$
    create procedure deleteGhiChu(in _stt_ghichu int(10))
    begin
        delete from ghi_chu
        where _stt_ghichu = stt_ghichu;
    end
$$

-- Procedures of Thanh_tuu
DELIMITER $$
    drop procedure if exists getAllThanhTuuBySomeOne $$
    create procedure getAllThanhTuuBySomeOne(in _taikhoan varchar(20))
    begin
        select *
        from thanh_tuu
        where taikhoan = _taikhoan;
    end $$
$$

DELIMITER $$
    drop procedure if exists getOneThanhTuu $$
    create procedure getOneThanhTuu(in _stt_thanhtuu varchar(12))
    begin
        select *
        from thanh_tuu
        where stt_thanhtuu = _stt_thanhtuu;
    end $$
$$

DELIMITER $$
    drop procedure if exists addThanhTuu $$
    create procedure addThanhTuu(in _tenthanhtuu text, in _ngaycap date, in _mota text, in _icon varchar(20), in _taikhoan varchar(20))
    begin
        insert into thanh_tuu(tenthanhtuu, ngaycap, mota, icon, taikhoan)
        values(_tenthanhtuu, _ngaycap, _mota, _icon, _taikhoan);
    end
$$

DELIMITER $$
    drop procedure if exists editThanhTuu $$
    create procedure editThanhTuu(in _stt_thanhtuu int(10),  in _tenthanhtuu text, in _ngaycap date, in _mota text, in _icon varchar(20))
    begin
        update thanh_tuu
        set  tenthanhtuu = _tenthanhtuu, ngaycap = _ngaycap, mota = _mota, icon = _icon
        where _stt_thanhtuu = stt_thanhtuu;
    end
$$

DELIMITER $$
    drop procedure if exists deleteThanhTuu $$
    create procedure deleteThanhTuu(in _stt_thanhtuu int(10))
    begin
        delete from thanh_tuu
        where _stt_thanhtuu = stt_thanhtuu;
    end
$$

-- Procedure of Lien_he
DELIMITER $$
    drop procedure if exists getAllLienHe $$
    create procedure getAllLienHe()
    begin
        select *
        from lien_he
        order by ngaytaolh desc;
    end $$
$$

DELIMITER $$
    drop procedure if exists addLienHe $$
    create procedure addLienHe(in _noidunglh text, in _loailh varchar(15), in _taikhoan varchar(20))
    begin
        insert into lien_he(noidunglh, loailh, taikhoan)
        values(_noidunglh, _loailh, _taikhoan);
    end
$$

-- Procedure of Hoc_vien
DELIMITER $$
    drop procedure if exists getAllHocVien $$
    create procedure getAllHocVien()
    begin
        select *
        from hoc_vien;
    end $$
$$

DELIMITER $$
    drop procedure if exists getOneHocVien $$
    create procedure getOneHocVien(in _sdt_hocvien varchar(12))
    begin
        select *
        from hoc_vien
        where sdt_hocvien = _sdt_hocvien;
    end $$
$$

DELIMITER $$
    drop procedure if exists addHocVien $$
    create procedure addHocVien(in _sdt_hocvien varchar(12), in _tenhocvien varchar(50), in _gioitinh_hocvien tinyint(1), in _trinhdo_hocvien varchar(20))
    begin
        insert into hoc_vien(sdt_hocvien, tenhocvien, gioitinh_hocvien, trinhdo_hocvien)
        values(_sdt_hocvien, _tenhocvien, _gioitinh_hocvien, _trinhdo_hocvien);
    end
$$

DELIMITER $$
    drop procedure if exists editHocVien $$
    create procedure editHocVien(in _sdt_hocvien varchar(12),  in _tenhocvien varchar(50), in _gioitinh_hocvien tinyint(1), in _trinhdo_hocvien varchar(20))
    begin
        update hoc_vien
        set  tenhocvien = _tenhocvien, gioitinh_hocvien = _gioitinh_hocvien, trinhdo_hocvien = _trinhdo_hocvien
        where _sdt_hocvien = sdt_hocvien;
    end
$$

DELIMITER $$
    drop procedure if exists deleteHocVien $$
    create procedure deleteHocVien(in _sdt_hocvien int(10))
    begin
        declare exit handler for sqlexception
        begin
            rollback;
            RESIGNAL;
        end;

        declare exit handler for sqlwarning
        begin
            rollback;
            RESIGNAL;
        end;

        start transaction;
        delete from hoc where sdt_hocvien = _sdt_hocvien;

        delete from hoc_vien where sdt_hocvien = _sdt_hocvien;
        commit;
    end
$$