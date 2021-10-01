
CREATE TABLE siswa (
    id_siswa number constraint pk_siswa primary key,
    nama varchar2(30)
);

create table mapel (
    id_mapel varchar2(3) constraint pk_mapel primary key,
    mapel varchar2(15),
);

create table nilai (
    id_nilai number constraint pk_nilai primary key,
    id_siswa number,
    nilai number,
    constraint fk_siswa foreign key(id_siswa) references siswa on delete cascade
);

alter table nilai modify nilai varchar2(4);
drop table nilai cascade;
RENAME nilai to score;


insert into siswa values(1,'Amir');
update siswa set nama = 'Faisal' where id_siswa = 1;
delete from siswa where id_siswa = 1;
select * from siswa;

select 

