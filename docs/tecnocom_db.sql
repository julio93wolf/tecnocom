create user 'admin_tecnocom'@'localhost' identified by '12345';
grant all on tecnocom.* to 'admin_tecnocom'@'localhost';

drop database if exists tecnocom;
create database tecnocom default charset utf8 default collate utf8_general_ci;
use tecnocom;

drop table if exists categoria;
create table categoria (
	id_categoria int auto_increment,
    categoria varchar (100) not null,
	primary key (id_categoria)
);

insert into categoria values (null,'Computadoras');
insert into categoria values (null,'Hardware');
insert into categoria values (null,'Accesorios');
insert into categoria values (null,'Almacenamiento');
insert into categoria values (null,'Eléctronica');
insert into categoria values (null,'Redes');
insert into categoria values (null,'Software');
insert into categoria values (null,'Impresión');

drop table if exists subcategoria;
create table subcategoria (
	id_subcategoria int auto_increment,
    subcategoria varchar (100) not null,
    id_categoria int not null,
    primary key (id_subcategoria),
    foreign key (id_categoria) references categoria (id_categoria)
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

drop table if exists fabricante;
create table fabricante (
	id_fabricante int auto_increment,
    fabricante varchar (100) not null,
    logo varchar (100),
    primary key (id_fabricante)
);

insert into fabricante values (null,'DELL','dell.png');
insert into fabricante values (null,'Lenovo','lenovo.png');
insert into fabricante values (null,'Hewlett Packard','hewlett_packard.png');
insert into fabricante values (null,'Acer','acer.png');
insert into fabricante values (null,'ASUS','asus.png');
insert into fabricante values (null,'LANIX','lanix.png');
insert into fabricante values (null,'Western Digital','western_digital.png');
insert into fabricante values (null,'Seagate','seagate.png');
insert into fabricante values (null,'Hitachi','hitachi.png');
insert into fabricante values (null,'Toshiba','toshiba.png');
insert into fabricante values (null,'Kingston','kingston.png');
insert into fabricante values (null,'A-DATA','a_data.png');
insert into fabricante values (null,'G.SKILL','g_skill.png');
insert into fabricante values (null,'Corsair','corsair.png');
insert into fabricante values (null,'Asrock','asrock.png');
insert into fabricante values (null,'MSI','msi.png');
insert into fabricante values (null,'VDATA','vdata.png');
insert into fabricante values (null,'Biostar','biostar.png');
insert into fabricante values (null,'ECS','ecs.png');
insert into fabricante values (null,'Gigabyte','gigabyte.png');
insert into fabricante values (null,'Intel','intel.png');
insert into fabricante values (null,'EVGA','evga.png');
insert into fabricante values (null,'PNY','pny.png');
insert into fabricante values (null,'AMD','amd.png');
insert into fabricante values (null,'Acteck','acteck.png');
insert into fabricante values (null,'AeroCool','aerocool.png');
insert into fabricante values (null,'Coolermaster','coolermaster.png');
insert into fabricante values (null,'EAGLE WARRIOR','eagle_warrior.png');
insert into fabricante values (null,'KMEX','kmex.png');
insert into fabricante values (null,'NZXT','nzxt.png');
insert into fabricante values (null,'Pixxo','pixxo.png');
insert into fabricante values (null,'Thermaltake','thermaltake.png');
insert into fabricante values (null,'Truebasix','truebasix.png');
insert into fabricante values (null,'VORAGO','vorago.png');
insert into fabricante values (null,'AOC','aoc.png');
insert into fabricante values (null,'BenQ','benq.png');
insert into fabricante values (null,'GHIA','ghia.png');
insert into fabricante values (null,'LG','lg.png');
insert into fabricante values (null,'Philips','philips.png');
insert into fabricante values (null,'Samsung','samsung.png');
insert into fabricante values (null,'Genius','genius.png');
insert into fabricante values (null,'Logitech','logitech.png');
insert into fabricante values (null,'MANHATTAN','manhattan.png');
insert into fabricante values (null,'Microsoft','microsoft.png');
insert into fabricante values (null,'Perfect Choice','perfect_choice.png');
insert into fabricante values (null,'Razer','razer.png');
insert into fabricante values (null,'Verbatim','verbatim.png');
insert into fabricante values (null,'Sony','sony.png');
insert into fabricante values (null,'Sandisk','sandisk.png');
insert into fabricante values (null,'Panasonic','panasonic.png');
insert into fabricante values (null,'Canon','canon.png');
insert into fabricante values (null,'Nikon','nikon.png');
insert into fabricante values (null,'Epson','epson.png');
insert into fabricante values (null,'ViewSonic','viewsonic.png');
insert into fabricante values (null,'InFocus','infocus.png');
insert into fabricante values (null,'DLink','dlink.png');
insert into fabricante values (null,'INTELLINET','intellinet.png');
insert into fabricante values (null,'Linksys','linksys.png');
insert into fabricante values (null,'TP-LINK','tp_link.png');
insert into fabricante values (null,'TRENDnet','trendnet.png');
insert into fabricante values (null,'StarTech.com','startech.png');
insert into fabricante values (null,'Bitdefender','bitdefender.png');
insert into fabricante values (null,'Kaspersky Lab','kaspersky.png');
insert into fabricante values (null,'Symantec','symantec.png');
insert into fabricante values (null,'ESET','eset.png');
insert into fabricante values (null,'Brother','brother.png');
insert into fabricante values (null,'Lexmark','lexmark.png');
insert into fabricante values (null,'Xerox','xerox.png');

drop table if exists producto;
create table producto (
	id_producto int auto_increment,
    sku varchar (13) unique not null,
    producto varchar (100) not null,
    modelo varchar (50) not null,
    precio numeric (10,2) not null,
    existencias numeric (10,0) not null,
	id_fabricante int not null,
    id_subcategoria int not null,
    imagen varchar (100) not null,
    primary key (id_producto),
    foreign key (id_fabricante) references fabricante (id_fabricante),
    foreign key (id_subcategoria) references subcategoria (id_subcategoria)
);

drop table if exists detalle;
create table detalle (
	id_detalle int auto_increment,
    id_producto int not null,
    descripcion text not null,
    primary key (id_detalle),
    foreign key (id_producto) references producto (id_producto)
);

insert into producto values (null,'SKU-122362','Desktop DELL Inspiron 3647','ID3647_I341TBW10S_5',10999,10,1,1,'SKU-122362.jpg');
insert into detalle values (null,1,'Procesador Intel Core i3 4170 (3.7 GHz)');
insert into detalle values (null,1,'Memoria de 4GB DDR3L');
insert into detalle values (null,1,'Disco Duro de 1TB');
insert into detalle values (null,1,'Video Intel HD Graphics 4400');
insert into detalle values (null,1,'Unidad Óptica DVD±R/RW');
insert into detalle values (null,1,'S.O. Windows 10 Home');

insert into producto values (null,'SKU-153818','All in One Lenovo ThinkCentre M900Z','10F5A05KLS',18999,10,2,1,'SKU-153818.jpg');
insert into detalle values (null,2,'Procesador Intel Core i7 6700 (hasta 4.00 GHz)');
insert into detalle values (null,2,'Memoria de 4GB DDR3L');
insert into detalle values (null,2,'Disco Duro de 500GB');
insert into detalle values (null,2,'Pantalla de 23.8" LED');
insert into detalle values (null,2,'Video Intel HD Graphics 530');
insert into detalle values (null,2,'Unidad Óptica DVD±R/RW');
insert into detalle values (null,2,'S.O. Windows 10 Pro (64 Bits)');

drop table if exists rol;
create table rol (
	id_rol int auto_increment,
    rol varchar (100) not null,
    primary key (id_rol)
);

insert into rol values (null,'Administrador');
insert into rol values (null,'Cliente');

drop table if exists usuario;
create table usuario(
	id_usuario int auto_increment,
    correo varchar (100) not null unique,
    contrasena varchar (32) not null,
    primary key (id_usuario)
);

insert into usuario values(null,'abc@mail.com','');
insert into usuario values(null,'def@mail.com','');
insert into usuario values(null,'123@mail.com','');
insert into usuario values(null,'456@mail.com','');

drop table if exists usuario_rol;
create table usuario_rol(
	id_usuario int not null,
    id_rol int not null,
    primary key (id_usuario,id_rol),
    foreign key (id_usuario) references usuario (id_usuario),
    foreign key (id_rol) references rol (id_rol)
);

insert into usuario_rol values (1,2);
insert into usuario_rol values (2,2);
insert into usuario_rol values (3,1);
insert into usuario_rol values (4,1);

select * 
from usuario usr 
	inner join usuario_rol usrd on usr.id_usuario=usrd.id_usuario
    inner join rol on rol.id_rol= usrd.id_rol;

drop table if exists cliente;
create table cliente (
	id_cliente int auto_increment,
    nombre varchar (100) not null,
    apaterno varchar (100),
    amaterno varchar (100),
    telefono varchar (16),
    domicilio varchar (100),
    id_usuario int not null,
    primary key (id_cliente),
    foreign key (id_usuario) references usuario (id_usuario)
);

insert into cliente values (null,'JOSE MAURO','BARRAGAN','ACOSTA','','',1);
insert into cliente values (null,'FELIX','BECERRA','GUTIERREZ','','',2);

drop table if exists carrito;
create table carrito (
	id_carrito int auto_increment,
    id_cliente int not null,
    fecha date not null,
    subtotal numeric (10,2),
    iva numeric (10,2),
    total numeric (10,2),
    primary key (id_carrito),
    foreign key (id_cliente) references cliente (id_cliente)
);

insert into carrito values (null,1,now(),0,0,0);
insert into carrito values (null,1,now(),0,0,0);
insert into carrito values (null,2,now(),0,0,0);

drop table if exists carrito_detalle;
create table carrito_detalle (
	id_carrito int not null,
    id_producto int not null,
    cantidad int not null,
    precio numeric (10,2),
    primary key (id_carrito,id_producto),
    foreign key (id_producto) references producto (id_producto)
);

/*
delimiter //
create trigger tgr_carrito 
after insert on carrito_detalle for each row
begin
	declare precio_producto numeric(10,2);
    set @precio_producto := (select precio from producto where id_producto = new.id_producto);
	update carrito_detalle set precio = @precio_producto where id_carrito = new.id_carrito and id_producto = new.id_producto;
end//
delimiter ;*/

drop procedure if exists prc_carrito_detalle;
delimiter //
create procedure prc_carrito_detalle (carrito int, producto int)
begin 	
	declare precio_producto numeric(10,2);
    set precio_producto = (select precio from producto where id_producto = producto);
	update carrito_detalle set precio = precio_producto where id_carrito = carrito and id_producto = producto;
end //
delimiter ;



insert into carrito_detalle values (1,2,10,null);
call prc_carrito_detalle (1,2);
select * from carrito_detalle;

select * from carrito;
/*Agregar mas Productos*/

drop view if exists vw_fabricantes;
create view vw_fabricantes as
select fab.id_fabricante,fab.fabricante,sub.id_subcategoria
from subcategoria sub 
	inner join producto pro on pro.id_subcategoria = sub.id_subcategoria
    inner join fabricante fab on fab.id_fabricante = pro.id_fabricante;

drop view if exists vw_productos;
create view vw_productos as 
select pro.id_producto,pro.imagen,fab.logo,fab.fabricante,pro.sku,pro.producto,pro.precio,pro.id_subcategoria,pro.id_fabricante
from producto pro
	inner join fabricante fab on pro.id_fabricante = fab.id_fabricante;