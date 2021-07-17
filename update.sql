alter table pelanggan add address varchar(255) default "Pandam, Kp. Ambacang" after nik;
alter table payment add alasan varchar(255);
alter table kas_harian modify ket text;
