create user 'admin_tecnocom'@'localhost' identified by '12345';
grant all on tecnocom.* to 'admin_tecnocom'@'localhost';

drop database if exists tecnocom;
create database tecnocom default charset utf8 default collate utf8_general_ci;
use tecnocom;

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

drop table producto_descripcion;
drop table producto;
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

create table producto_descripcion (
	id_producto int not null,
    descripcion text not null,
    foreign key (id_producto) references producto (id_producto)
);

insert into producto values (null,'SKU-122362','Desktop DELL Inspiron 3647','ID3647_I341TBW10S_5',10999,10,1,1,'SKU-122362.jpg');
insert into producto_descripcion values (1,'- Procesador Intel Core i3 4170 (3.7 GHz),<br /> 
- Memoria de 4GB DDR3L,<br /> 
- Disco Duro de 1TB,<br /> 
- Video Intel HD Graphics 4400,<br /> 
- Unidad Óptica DVD±R/RW,<br /> 
- S.O. Windows 10 Home');
insert into producto values (null,'SKU-153818','All in One Lenovo ThinkCentre M900Z','10F5A05KLS',18999,10,2,1,'SKU-153818.jpg');
insert into producto_descripcion values (2,'- Procesador Intel Core i7 6700 (hasta 4.00 GHz),<br />
- Memoria de 4GB DDR3L,<br />
- Disco Duro de 500GB,<br />
- Pantalla de 23.8" LED,<br />
- Video Intel HD Graphics 530,<br />
- Unidad Óptica DVD±R/RW,<br />
- S.O. Windows 10 Pro (64 Bits)');

/*Agregar mas Productos*/

create view fabricante_view as
select fab.id_fabricante,fab.fabricante,sub.id_subcategoria
from subcategoria sub 
	inner join producto pro on pro.id_subcategoria = sub.id_subcategoria
    inner join fabricante fab on fab.id_fabricante = pro.id_fabricante;

create view productos_view as 
select pro.imagen,fab.logo,fab.fabricante,pro.sku,pro.producto,prd.descripcion,pro.precio,pro.id_subcategoria,pro.id_fabricante
from producto pro
	inner join fabricante fab on pro.id_fabricante = fab.id_fabricante
    inner join producto_descripcion prd on pro.id_producto = prd.id_producto;