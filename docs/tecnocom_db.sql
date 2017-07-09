create user 'admin_tecnocom'@'localhost' identified by '12345';
grant all on tecnocom.* to 'admin_tecnocom'@'localhost';

drop database if exists tecnocom;
create database tecnocom default charset utf8 default collate utf8_general_ci;
use tecnocom;

create table categoria (
	id_categoria int auto_increment primary key,
    categoria varchar (100) not null
);

insert into categoria values (null,'Computadoras');
insert into categoria values (null,'Hardware');
insert into categoria values (null,'Accesorios');
insert into categoria values (null,'Almacenamiento');
insert into categoria values (null,'Eléctronica');
insert into categoria values (null,'Redes');
insert into categoria values (null,'Software');
insert into categoria values (null,'Impresión');

create table subcategoria (
	id_subcategoria int auto_increment primary key,
    subcategoria varchar (100) not null,
    id_categoria int references categoria (id_categoria)
);

insert into subcategoria values (null,'Desktops',1);
insert into subcategoria values (null,'Laptops',1);
insert into subcategoria values (null,'Discos Duros',2);
insert into subcategoria values (null,'Memoria RAM',2);
insert into subcategoria values (null,'Tarjetas Madre',2);
insert into subcategoria values (null,'Tarjetas de Video',2);
insert into subcategoria values (null,'Procesadores',2);
insert into subcategoria values (null,'Gabinetes',2);
insert into subcategoria values (null,'Fuentes de Poder',2);
insert into subcategoria values (null,'Monitores',2);
insert into subcategoria values (null,'Mouse/Ratones',3);
insert into subcategoria values (null,'Teclados',3);
insert into subcategoria values (null,'Audífonos',3);
insert into subcategoria values (null,'Bocinas',3);
insert into subcategoria values (null,'Joystics',3);
insert into subcategoria values (null,'Unidades Flash USB',4);
insert into subcategoria values (null,'Discos Duros Externos',4);
insert into subcategoria values (null,'Memorias Flash',4);
insert into subcategoria values (null,'Blu-Rays, DVDs y CDs',4);
insert into subcategoria values (null,'Televisores',5);
insert into subcategoria values (null,'Cámaras',5);
insert into subcategoria values (null,'Proyectores',5);
insert into subcategoria values (null,'Tarjetas y Adaptadores Inalámbricos',6);
insert into subcategoria values (null,'Switches',6);
insert into subcategoria values (null,'Tarjetas de Red para PC',6);
insert into subcategoria values (null,'Antivirus y Seguridad',7);
insert into subcategoria values (null,'Sistemas Operativos',7);
insert into subcategoria values (null,'Consumibles',8);
insert into subcategoria values (null,'Impresoras',8);
