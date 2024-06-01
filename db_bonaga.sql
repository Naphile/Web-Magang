USE db_bonaga;

CREATE TABLE
    reports (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nama_proyek VARCHAR(255) NOT NULL,
        nama_mitra VARCHAR(255) NOT NULL,
        file_mancore VARCHAR(255) NOT NULL,
        file_kml VARCHAR(255) NOT NULL,
        file_apd VARCHAR(255) NOT NULL,
        foto_efiden VARCHAR(255) NOT NULL,
        foto_validasi VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

INSERT INTO
    reports (
        nama_proyek,
        nama_mitra,
        file_mancore,
        file_kml,
        file_apd,
        foto_efiden,
        foto_validasi
    )
VALUES
    (
        '$nama_proyek',
        '$nama_mitra',
        '$target_file_mancore',
        '$target_file_kml',
        '$target_file_apd',
        '$target_file_foto_efiden',
        '$target_file_foto_validasi'
    );