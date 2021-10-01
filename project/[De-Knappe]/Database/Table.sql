create table siswa (
id_siswa varchar2(8) constraint pk_siswa primary key,
nama varchar2(30),
kelas varchar2(10),
jurusan varchar2(10),
gender varchar2(1),
alamat varchar2(25),
ttl varchar2(25),
no_telp number(15),
email varchar2(25) );

create table mapel (
id_mapel varchar2(7) constraint pk_mapel primary key,
nama_mapel varchar2(20),
kelas_mapel varchar2(10),
bab number(3) );

create table guru (
id_guru varchar2(8) constraint pk_guru primary key,
nama varchar2(30),
mapel varchar2(15),
gender varchar2(1),
alamat varchar2(25),
no_telp number(15),
email varchar2(25) );

insert into siswa values ('11762','Muhammad Faisal Amir','10 MIA A','IPA','L','PROBOLINGGO','Probolinggo, 30 Mei 1997',081357108568,'f.miir117@gmail.com');
insert into siswa values ('11001','Saiful Apriyanto','10 MIA A','IPA','L','PROBOLINGGO','Probolinggo, 30 Mei 1997',081357108568,'f.miir117@gmail.com');
insert into siswa values ('11002','Krisna Setiawan','10 MIA A','IPA','L','PROBOLINGGO','Probolinggo, 30 Mei 1997',081357108568,'f.miir117@gmail.com');
insert into siswa values ('11003','Faisal Amir','10 MIA A','IPA','L','PROBOLINGGO','Probolinggo, 30 Mei 1997',081357108568,'f.miir117@gmail.com');
insert into siswa values ('11004','Muhammad Faisal','10 MIA A','IPA','L','PROBOLINGGO','Probolinggo, 30 Mei 1997',081357108568,'f.miir117@gmail.com');
insert into siswa values ('11005','Eka','10 MIA A','IPA','L','PROBOLINGGO','Probolinggo, 30 Mei 1997',081357108568,'f.miir117@gmail.com');
insert into siswa values ('11006','Amir','10 MIA A','IPA','L','PROBOLINGGO','Probolinggo, 30 Mei 1997',081357108568,'f.miir117@gmail.com');
insert into siswa values ('11007','Faisal','10 MIA A','IPA','L','PROBOLINGGO','Probolinggo, 30 Mei 1997',081357108568,'f.miir117@gmail.com');
insert into siswa values ('11008','Dzaky','10 MIA A','IPA','L','PROBOLINGGO','Probolinggo, 30 Mei 1997',081357108568,'f.miir117@gmail.com');
insert into siswa values ('11009','Hudio','10 MIA A','IPA','L','PROBOLINGGO','Probolinggo, 30 Mei 1997',081357108568,'f.miir117@gmail.com');
insert into siswa values ('11023','Bryan','10 MIA A','IPA','L','PROBOLINGGO','Probolinggo, 30 Mei 1997',081357108568,'f.miir117@gmail.com');

insert into mapel values ('00001','Biologi','10 SMA',1);
insert into mapel values ('00002','Fisika','10 SMA',1);
insert into mapel values ('00003','Kimia','10 SMA',1);
insert into mapel values ('00004','B. Indonesia','10 SMA',1);
insert into mapel values ('00005','B. Inggris','10 SMA',1);
insert into mapel values ('00006','PKn','10 SMA',1);
insert into mapel values ('00007','B. Jawa','10 SMA',1);
insert into mapel values ('00008','B. Jepang','10 SMA',1);
insert into mapel values ('00009','Matematika','10 SMA',1);
insert into mapel values ('00010','Algoritma','10 SMA',1);


