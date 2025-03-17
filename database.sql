-- Tạo cơ sở dữ liệu
CREATE DATABASE IF NOT EXISTS quanlyhocphan;
USE quanlyhocphan;

-- Tạo bảng sinh viên
CREATE TABLE IF NOT EXISTS sinhvien (
    MaSV VARCHAR(10) PRIMARY KEY,
    HoTen VARCHAR(50) NOT NULL,
    MatKhau VARCHAR(50) NOT NULL
);

-- Tạo bảng học phần
CREATE TABLE IF NOT EXISTS hocphan (
    MaHP VARCHAR(10) PRIMARY KEY,
    TenHP VARCHAR(100) NOT NULL,
    SoTC INT NOT NULL
);

-- Tạo bảng đăng ký
CREATE TABLE IF NOT EXISTS dangky (
    MaSV VARCHAR(10),
    MaHP VARCHAR(10),
    NgayDK DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (MaSV, MaHP),
    FOREIGN KEY (MaSV) REFERENCES sinhvien(MaSV),
    FOREIGN KEY (MaHP) REFERENCES hocphan(MaHP)
);

-- Thêm dữ liệu mẫu
INSERT INTO sinhvien (MaSV, HoTen, MatKhau) VALUES
('SV001', 'Nguyễn Văn A', '123456789'),
('SV002', 'Trần Thị B', '123456789');

INSERT INTO hocphan (MaHP, TenHP, SoTC) VALUES
('CNTT01', 'Lập trình C', 3),
('CNTT02', 'Cơ sở dữ liệu', 2),
('CNTT03', 'Xử lý tín hiệu số 1', 3),
('CNTT04', 'Kinh tế vi mô', 2); 