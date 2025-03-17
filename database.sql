-- Tạo cơ sở dữ liệu
CREATE DATABASE IF NOT EXISTS Test1;
USE Test1;

-- Tạo bảng sinh viên
CREATE TABLE IF NOT EXISTS sinhvien (
    masv VARCHAR(10) PRIMARY KEY,
    password VARCHAR(255) NOT NULL
);

-- Tạo bảng học phần
CREATE TABLE IF NOT EXISTS hocphan (
    mahp VARCHAR(10) PRIMARY KEY,
    tenhp VARCHAR(100) NOT NULL,
    sotc INT NOT NULL
);

-- Tạo bảng đăng ký học phần
CREATE TABLE IF NOT EXISTS dangky (
    id INT AUTO_INCREMENT PRIMARY KEY,
    masv VARCHAR(10),
    mahp VARCHAR(10),
    ngaydk DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (masv) REFERENCES sinhvien(masv),
    FOREIGN KEY (mahp) REFERENCES hocphan(mahp)
);

-- Thêm dữ liệu mẫu cho bảng học phần
INSERT INTO hocphan (mahp, tenhp, sotc) VALUES
('CNTT01', 'Lập trình C', 3),
('CNTT02', 'Cơ sở dữ liệu', 2),
('CNTT03', 'Xử suất thống kê 1', 3),
('CNTT04', 'Kinh tế vi mô', 2); 