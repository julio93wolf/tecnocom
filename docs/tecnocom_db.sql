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
	id_fabricante int not null,
    id_subcategoria int not null,
    imagen varchar (100) not null,
    primary key (id_producto),
    foreign key (id_fabricante) references fabricante (id_fabricante),
    foreign key (id_subcategoria) references subcategoria (id_subcategoria)
);

drop table if exists producto_detalle;
create table producto_detalle (
	id_producto_detalle int auto_increment,
    id_producto int not null,
    descripcion text not null,
    primary key (id_producto_detalle),
    foreign key (id_producto) references producto (id_producto)
);

insert into producto values (null,'SKU-122362','Desktop DELL Inspiron 3647','ID3647_I341TBW10S_5',10999,1,1,'SKU-122362.jpg');
insert into producto_detalle values (null,1,'Procesador Intel Core i3 4170 (3.7 GHz)');
insert into producto_detalle values (null,1,'Memoria de 4GB DDR3L');
insert into producto_detalle values (null,1,'Disco Duro de 1TB');
insert into producto_detalle values (null,1,'Video Intel HD Graphics 4400');
insert into producto_detalle values (null,1,'Unidad Óptica DVD±R/RW');
insert into producto_detalle values (null,1,'S.O. Windows 10 Home');

insert into producto values (null,'SKU-153818','All in One Lenovo ThinkCentre M900Z','10F5A05KLS',18999,2,1,'SKU-153818.jpg');
insert into producto_detalle values (null,2,'Procesador Intel Core i7 6700 (hasta 4.00 GHz)');
insert into producto_detalle values (null,2,'Memoria de 4GB DDR3L');
insert into producto_detalle values (null,2,'Disco Duro de 500GB');
insert into producto_detalle values (null,2,'Pantalla de 23.8" LED');
insert into producto_detalle values (null,2,'Video Intel HD Graphics 530');
insert into producto_detalle values (null,2,'Unidad Óptica DVD±R/RW');
insert into producto_detalle values (null,2,'S.O. Windows 10 Pro (64 Bits)');

insert into producto values (null,'SKU-143000','Disco Duro Seagate Barracuda 1TB','ST1000DM010',1299,8,3,'SKU-143000.jpg');
insert into producto_detalle values (null,3,'Caché 64MB');
insert into producto_detalle values (null,3,'7200 RPM');
insert into producto_detalle values (null,3,'SATA III (6.0 Gb/s)');

insert into producto values (null,'SKU-138872','Laptop HP 240 G5','Y4B27LA#ABM',13999,3,2,'SKU-138872.jpg');
insert into producto_detalle values (null,4,'Procesador Intel Core i5 6200U (hasta 2.8 GHz)');
insert into producto_detalle values (null,4,'Memoria de 8GB DDR3L');
insert into producto_detalle values (null,4,'Disco Duro de 1TB');
insert into producto_detalle values (null,4,'Pantalla de 14" LED');
insert into producto_detalle values (null,4,'Video Intel HD Graphics 520');
insert into producto_detalle values (null,4,'Unidad Óptica No Incluida');
insert into producto_detalle values (null,4,'S.O. Windows 10 Home (64 Bits)');

insert into producto values (null,'SKU-151554','Laptop ASUS VivoBook Max X441NA','X441NA CHOCOLATE',6999,5,2,'SKU-151554.jpg');
insert into producto_detalle values (null,5,'Procesador Intel Celeron N 3350 (hasta 2.40 GHz)');
insert into producto_detalle values (null,5,'Procesador Intel Celeron N 3350 (hasta 2.40 GHz)');
insert into producto_detalle values (null,5,'Memoria de 4GB DDR3L');
insert into producto_detalle values (null,5,'Disco Duro de 500GB');
insert into producto_detalle values (null,5,'Pantalla de 14" LED');
insert into producto_detalle values (null,5,'Video Intel HD Graphics 500');
insert into producto_detalle values (null,5,'Unidad Óptica DVD±R/RW');
insert into producto_detalle values (null,5,'S.O. Windows 10 Home (64 Bits)');

insert into producto values (null,'SKU-147624','Laptop DELL Vostro 3459','Vostro 3459',18999,1,2,'SKU-147624.jpg');
insert into producto_detalle values (null,6,'Procesador Intel Core i5 6200U (hasta 2.8 GHz)');
insert into producto_detalle values (null,6,'Memoria de 8GB DDR3L');
insert into producto_detalle values (null,6,'Disco Duro de 1TB');
insert into producto_detalle values (null,6,'Pantalla de 14" LED');
insert into producto_detalle values (null,6,'Video Intel HD Graphics 520');
insert into producto_detalle values (null,6,'Unidad Óptica DVD±R/RW');
insert into producto_detalle values (null,6,'S.O. Windows 10 Pro (64 Bits)');

insert into producto values (null,'SKU-133860','Disco Duro de 3.5" para Data Center Western Digital Gold de 8 TB','WD8002FRYZ',8299,7,3,'SKU-133860.jpg');
insert into producto_detalle values (null,7,'7200 RPM');
insert into producto_detalle values (null,7,'Caché 128MB');
insert into producto_detalle values (null,7,'SATA3 (6.0 Gb/s)');

insert into producto values (null,'SKU-115632','Memoria Kingston HyperX Fury DDR4','HX421C14FB2/8',1699,11,4,'SKU-115632.jpg');
insert into producto_detalle values (null,8,'PC4-17000 (2133MHz) CL14');
insert into producto_detalle values (null,8,'8 GB');

insert into producto values (null,'SKU-141984','Memoria ADATA DDR4 PC4-17000 (2133MHz)','AD4U2133316G15-S',2999,12,4,'SKU-141984.jpg');
insert into producto_detalle values (null,9,'CL15');
insert into producto_detalle values (null,9,'16GB');

insert into producto values (null,'SKU-133126','T. Madre Gigabyte GA-H110M-H, ChipSet Intel H110','GA-H110M-H',1499,20,5,'SKU-133126.jpg');
insert into producto_detalle values (null,10,'Soporta: Intel Core i7/Core i5/Core i3/Pentium/Celeron de Socket 1151, ');
insert into producto_detalle values (null,10,'Memoria: DDR4 2133 MHz, 32GB Max');
insert into producto_detalle values (null,10,'SATA 3.0, USB 3.0');
insert into producto_detalle values (null,10,'Integrado: Audio HD, Red Gigabit');
insert into producto_detalle values (null,10,'Micro-ATX');

insert into producto values (null,'SKU-117548','T. Madre ECS A68F2P-M4, ChipSet AMD A68H Exp.','A68F2P-M4',1099,19,5,'SKU-117548.jpg');
insert into producto_detalle values (null,11,'Soporta: AMD de las series A y E de Socket FM2+, ');
insert into producto_detalle values (null,11,'Memoria: DDR3 1866(O.C.)/1600/1333 MHz, 16 GB Max, ');
insert into producto_detalle values (null,11,'SATA 3.0, USB 3.0, HDMI, ');
insert into producto_detalle values (null,11,'Integrado: Audio HD, Red, ');
insert into producto_detalle values (null,11,'Micro-ATX, Ptos: 1x PCIE 3.0x16, 1x PCIE 3.0x1');

insert into producto values (null,'SKU-152622','Tarjeta de Video NVIDIA GeForce GTX 1050Ti Gigabyte OC','GV-N105TOC-4GL',4999,20,6,'SKU-152622.jpg');
insert into producto_detalle values (null,12,'4GB GDDR5');
insert into producto_detalle values (null,12,'2xHDMI');
insert into producto_detalle values (null,12,'1xDVI');
insert into producto_detalle values (null,12,'1xDisplayPort');
insert into producto_detalle values (null,12,'PCI Express x16 3.0');

insert into producto values (null,'SKU-138486','Tarjeta de Video NVIDIA GeForce GTX 1080 ASUS ROG STRIX','STRIX-GTX1080-8G-GAM',16999,5,6,'SKU-138486.jpg');
insert into producto_detalle values (null,13,'8GB GDDR5X');
insert into producto_detalle values (null,13,'2xHDMI');
insert into producto_detalle values (null,13,'1xDVI');
insert into producto_detalle values (null,13,'2xDisplayPort');
insert into producto_detalle values (null,13,'PCI Express x16 3.0');

insert into producto values (null,'SKU-148042','Procesador Intel Core i5-7400 de Séptima Generación','BX80677I57400',4299,21,7,'SKU-148042.jpg');
insert into producto_detalle values (null,14,'3.0 GHz (hasta 3.5 GHz) con Intel HD Graphics 630');
insert into producto_detalle values (null,14,'Socket 1151');
insert into producto_detalle values (null,14,'L3 Caché 8 MB');
insert into producto_detalle values (null,14,'Quad-Core');
insert into producto_detalle values (null,14,'14nm');

insert into producto values (null,'SKU-148044','Procesador Intel Core i7-7700 de Séptima Generación','BX80677I77700',6999,21,7,'SKU-148044.jpg');
insert into producto_detalle values (null,15,'3.6 GHz (hasta 4.2 GHz) con Intel HD Graphics 630');
insert into producto_detalle values (null,15,'Socket 1151');
insert into producto_detalle values (null,15,'L3 Caché 8 MB');
insert into producto_detalle values (null,15,'Quad-Core');
insert into producto_detalle values (null,15,'14nm');

insert into producto values (null,'SKU-125514','Gabinete NZXT Noctis 450','CA-N450W-M1',2999,30,8,'SKU-125514.jpg');
insert into producto_detalle values (null,16,'No incluye fuente de poder');
insert into producto_detalle values (null,16,'Color Negro');

insert into producto values (null,'SKU-135004','Gabinete Micro-ATX TrueBasix Performance','TB-05001',699,33,8,'SKU-135004.jpg');
insert into producto_detalle values (null,17,'Fuente de poder de 480W');
insert into producto_detalle values (null,17,'Color Negro');

insert into producto values (null,'SKU-132280','Fuente de Poder Corsair CX650M de 650W','CP-9020103-NA',2199,14,9,'SKU-132280.jpg');
insert into producto_detalle values (null,18,'ATX');

insert into producto values (null,'SKU-126688','Fuente de Poder Acteck Edge R-500 de 500W','R-500',489,25,9,'SKU-126688.jpg');
insert into producto_detalle values (null,19,'ATX');

insert into producto values (null,'SKU-125472','Monitor LED LG 24M38H-B de 23.6"','24M38H-B',3199,38,10,'SKU-125472.jpg');
insert into producto_detalle values (null,20,'Resolución 1920 x 1080 (Full HD)');
insert into producto_detalle values (null,20,'5 ms');

insert into producto values (null,'SKU-134726','Monitor Curvo Samsung LC32F391FWNXZA de 32"','LC32F391FWNXZA',8999,40,10,'SKU-134726.jpg');
insert into producto_detalle values (null,21,'Resolución 1920 x 1080 (Full HD)');
insert into producto_detalle values (null,21,'4 ms');

insert into producto values (null,'SKU-108224','Mouse Óptico Inalámbrico Microsoft Wireless Mobile 1850','U7Z-00008',299,44,11,'SKU-108224.jpg');
insert into producto_detalle values (null,22,'USB');

insert into producto values (null,'SKU-128214','Mouse Gamer Logitech G502 Proteus Spectrum','910-004616',1399,42,11,'SKU-128214.jpg');
insert into producto_detalle values (null,23,'200-12,000 dpi');
insert into producto_detalle values (null,23,'11 botones programables');
insert into producto_detalle values (null,23,'USB');

insert into producto values (null,'SKU-61783','Teclado y Mouse Microsoft Desktop 600 con teclas silenciosas y a prueba de líquidos','APB-00004',599,44,12,'SKU-61783.jpg');
insert into producto_detalle values (null,24,'USB');
insert into producto_detalle values (null,24,'Color Negro');

insert into producto values (null,'SKU-133790','Teclado Gamer y Mouse Cooler Master Devastator II Gaming Combo','SGB-3031-KKMF1',699,27,12,'SKU-133790.jpg');
insert into producto_detalle values (null,25,'USB');
insert into producto_detalle values (null,25,'LEDs Rojo');

insert into producto values (null,'SKU-140808','Audífonos tipo diadema Kingston HyperX Cloud Stinger con micrófono','HX-HSCS-BK/LA',999,11,13,'SKU-140808.jpg');
insert into producto_detalle values (null,26,'Respuesta de frecuencia 18Hz-23000Hz');

insert into producto values (null,'SKU-101748','Audífonos con Micrófono Logitech G430 con tecnologí Dolby sonido envolvente 7.1','981-000551',1499,42,13,'SKU-101748.jpg');
insert into producto_detalle values (null,27,'3.5 mm');

insert into producto values (null,'SKU-76859','Bocinas Logitech Z906 Digital','980-000474',6999,42,14,'SKU-76859.jpg');
insert into producto_detalle values (null,28,'Auténtico Sonido 5.1 Dolby Digital y DTS');
insert into producto_detalle values (null,28,'Certificación THX');
insert into producto_detalle values (null,28,'500 Watts RMS de Poder total');

insert into producto values (null,'SKU-72439','Bocinas Logitech Z623 estéreo 2.1','',3199,42,14,'SKU-72439.jpg');
insert into producto_detalle values (null,29,'Certificación THX, 200 Watts (RMS)');

insert into producto values (null,'SKU-76375','Control para Xbox 360 y PC con Windows','52A-00004',599,44,15,'SKU-76375.jpg');
insert into producto_detalle values (null,30,'USB 2.0');
insert into producto_detalle values (null,30,'Color Negro');

insert into producto values (null,'SKU-131704','Volante Logitech G920 Driving Force','941-000122',4999,42,15,'SKU-131704.jpg');
insert into producto_detalle values (null,31,'Compatible con PC (USB) y Xbox One');

/*Agregar mas Productos*/

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

insert into usuario values(null,'jose_barragan@mail.com','');
insert into usuario values(null,'felix_becerra@mail.com','');
insert into usuario values(null,'juan_luna@mail.com','');
insert into usuario values(null,'juan_lozano@mail.com','');

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

insert into cliente values (null,'JOSE MAURO','BARRAGAN','ACOSTA','12345','Celaya',1);
insert into cliente values (null,'FELIX','BECERRA','GUTIERREZ','12345','Celaya',2);

drop table if exists empleado;
create table empleado (
	id_empleado int auto_increment,
    nombre varchar (100) not null,
	apaterno varchar (100),
	amaterno varchar (100),
    id_usuario int not null,
    primary key (id_empleado), 
    foreign key (id_usuario) references usuario (id_usuario)
);

insert into empleado values (null,'JUAN HECTOR','LUNA','SANDOVAL',3);
insert into empleado values (null,'JUAN CARLOS','LOZANO','MARTINEZ',4);

drop table if exists carrito;
create table carrito (
id_carrito int auto_increment,
id_cliente int not null,
subtotal numeric (10,2),
iva numeric (10,2),
total numeric (10,2),
primary key (id_carrito),
foreign key (id_cliente) references cliente (id_cliente)
);

drop table if exists carrito_detalle;
create table carrito_detalle (
id_carrito int not null,
id_producto int not null,
cantidad int not null,
precio numeric (10,2),
primary key (id_carrito,id_producto),
foreign key (id_producto) references producto (id_producto),
foreign key (id_carrito) references carrito (id_carrito)
);


/*##########################################################################*/
/*								Pruebas										*/
/*##########################################################################*/
select * from usuario;
select * from usuario_rol;
select * from cliente;
select * from carrito;

insert into usuario values (null,'julio_valle@mail.com','');
insert into usuario_rol values (5,2);
insert into cliente values (null,'Julio Cesar','Valle','Rodriguez','12345','Celaya',5);
insert into carrito values (null,3,0,0,0);
insert into carrito_detalle values (4,2,3,null);
insert into carrito_detalle values (4,6,3,null);

select * from carrito_detalle where id_carrito=4;

insert into compra values (null,3,'2017-7-17',0,0,0);
delete from compra where id_cliente=3;

insert into producto values (null,'SKU-PRUEBA','PRUEBA','MOD-PRUEBA',5555,42,15,'PRUEBA.jpg');
insert into producto_detalle values (null,35,'PRUEBA');

/*Producto*/
select * from producto order by id_producto desc;
select * from producto_detalle order by id_producto desc;
select * from carrito_detalle order by id_producto desc;


select * from oferta;
insert into oferta values (null,35,'2017-6-1','2017-7-1',3999);
insert into oferta_banner values (15,'oferta_11.jpg');
insert into oferta values (null,35,'2017-7-1','2017-8-1',3999);
insert into oferta_banner values (16,'oferta_11.jpg');
insert into oferta values (null,35,'2017-7-1','2017-8-1',3999);

select * from oferta;
select * from oferta_banner;

select * from oferta ofe left join oferta_banner ofb on ofe.id_oferta= ofb.id_oferta  where ofe.id_producto=35;

insert into carrito values (null,1,0,0,0);
insert into carrito_detalle values (1,10,5,null);
insert into carrito_detalle values (1,32,5,null);

drop table if exists compra;
create table compra (
id_compra int auto_increment,
id_cliente int not null,
fecha date not null,
subtotal numeric (10,2),
iva numeric (10,2),
total numeric (10,2),
primary key (id_compra),
foreign key (id_cliente) references cliente (id_cliente)
);

drop table if exists compra_detalle;
create table compra_detalle (
id_compra int not null,
id_producto int not null,
cantidad int not null,
precio numeric (10,2),
primary key (id_compra,id_producto),
foreign key (id_compra) references compra (id_compra),
foreign key (id_producto) references producto (id_producto)
);

select * from producto;

insert into compra values (null,1,'2017-7-2',0,0,0);
insert into compra_detalle value (1,7,5,null);
insert into compra_detalle value (1,13,2,null);
insert into compra_detalle value (1,18,1,null);

insert into compra values (null,2,'2017-7-5',0,0,0);
insert into compra_detalle value (2,3,4,null);
insert into compra_detalle value (2,10,2,null);
insert into compra_detalle value (2,14,2,null);
insert into compra_detalle value (2,8,4,null);


insert into compra values (null,1,'2017-7-7',0,0,0);
insert into compra_detalle value (3,13,4,null);
insert into compra_detalle value (3,18,2,null);

drop table if exists oferta;
create table oferta (
id_oferta int auto_increment,
id_producto int not null,
fechai date not null,
fechat date not null,
precio_oferta numeric (10,2) not null,
primary key (id_oferta),
foreign key (id_producto) references producto (id_producto)
);

insert into oferta values (null,6,'2017-7-1','2017-8-1',15199);
insert into oferta values (null,20,'2017-7-1','2017-8-1',2669);
insert into oferta values (null,13,'2017-7-1','2017-8-1',13999);
insert into oferta values (null,22,'2017-7-1','2017-8-1',199);
insert into oferta values (null,28,'2017-7-1','2017-8-1',5599);
insert into oferta values (null,19,'2017-7-1','2017-8-1',299);
insert into oferta values (null,1,'2017-7-1','2017-8-1',8799);
insert into oferta values (null,8,'2017-7-1','2017-8-1',1399);
insert into oferta values (null,15,'2017-7-1','2017-8-1',6099);
insert into oferta values (null,31,'2017-7-1','2017-8-1',3999);
insert into oferta values (null,31,'2017-6-1','2017-7-1',3999);

drop table if exists oferta_banner;
create table oferta_banner (
	id_oferta int not null,
    banner varchar (100) not null,
    primary key (id_oferta),
    foreign key (id_oferta) references oferta (id_oferta)
);

insert into oferta_banner values (1,'oferta_1.jpg');
insert into oferta_banner values (3,'oferta_3.jpg');
insert into oferta_banner values (5,'oferta_5.jpg');
insert into oferta_banner values (11,'oferta_11.jpg');

/*
drop procedure if exists prc_carrito_detalle;
delimiter //
create procedure prc_carrito_detalle (carrito int, producto int)
begin 	
	declare precio_producto numeric(10,2);
    declare cantidad_producto int;
    declare carrito_subtotal numeric(10,2);
    declare carrito_iva numeric(10,2);
    declare carrito_total numeric(10,2);
    
    set precio_producto = (select precio from producto where id_producto = producto);
    set cantidad_producto = (select cantidad from carrito_detalle where id_carrito = carrito and id_producto = producto);
    
    set carrito_subtotal = cantidad_producto * precio_producto;
    set carrito_iva = carrito_subtotal * 0.2;
    set carrito_total = carrito_subtotal + carrito_iva;
    
	update carrito_detalle set precio = precio_producto where id_carrito = carrito and id_producto = producto;
    update carrito set subtotal=carrito_subtotal, iva=carrito_iva, total = carrito_total where id_carrito = carrito;
end //
delimiter ;

*/

drop view if exists vw_fabricantes;
create view vw_fabricantes as
select fab.id_fabricante,fab.fabricante,sub.id_subcategoria
from subcategoria sub 
	inner join producto pro on pro.id_subcategoria = sub.id_subcategoria
    inner join fabricante fab on fab.id_fabricante = pro.id_fabricante;

drop view if exists vw_productos;
create view vw_productos as
select 
	pro.id_producto,
    pro.imagen,
    fab.logo,
    fab.fabricante,
    pro.sku,
    pro.producto,
    pro.precio,
    ifnull(ofe.precio_oferta,pro.precio) as precio_oferta,
    ifnull(ofe.fechai,now()) as fechai,
    ifnull(ofe.fechat,now()) as fechat,
    pro.id_subcategoria,
    pro.id_fabricante
from producto pro
	inner join fabricante fab on pro.id_fabricante = fab.id_fabricante
    left join oferta ofe on pro.id_producto = ofe.id_producto
where now() between ifnull(ofe.fechai,now()) and ifnull(ofe.fechat,now());

drop view if exists vw_ofertas;
create view vw_ofertas as
select 
	pro.id_producto,
    pro.imagen,
    fab.logo,
    fab.fabricante,
    pro.sku,
    pro.producto,
    pro.precio,
    ofe.precio_oferta,
    ofe.fechai,
    ofe.fechat,
    pro.id_subcategoria,
    pro.id_fabricante
from producto pro
	inner join fabricante fab on pro.id_fabricante = fab.id_fabricante
    inner join oferta ofe on pro.id_producto = ofe.id_producto
where now() between ofe.fechai and ofe.fechat 
order by rand() desc limit 4;

drop view if exists vw_ultimos_productos;
create view vw_ultimos_productos as
select 
	pro.id_producto,
    pro.imagen,
    fab.logo,
    fab.fabricante,
    pro.sku,
    pro.producto,
    pro.precio,
    ifnull(ofe.precio_oferta,pro.precio) as precio_oferta,
    ifnull(ofe.fechai,now()) as fechai,
    ifnull(ofe.fechat,now()) as fechat,
    pro.id_subcategoria,
    pro.id_fabricante
from producto pro
	inner join fabricante fab on pro.id_fabricante = fab.id_fabricante
    left join oferta ofe on pro.id_producto = ofe.id_producto
where now() between ifnull(ofe.fechai,now()) and ifnull(ofe.fechat,now())
order by id_producto desc
limit 4;

drop view if exists vw_mas_vendidos;
create view vw_mas_vendidos as
select 
	pro.id_producto,
    pro.imagen,
    fab.logo,
    fab.fabricante,
    pro.sku,
    pro.producto,
    pro.precio,
    ifnull(ofe.precio_oferta,pro.precio) as precio_oferta,
    ifnull(ofe.fechai,now()) as fechai,
    ifnull(ofe.fechat,now()) as fechat,
    pro.id_subcategoria,
    pro.id_fabricante,
    sum(cmd.cantidad) as cantidad
from producto pro
	inner join fabricante fab on pro.id_fabricante = fab.id_fabricante
    inner join compra_detalle cmd on cmd.id_producto = pro.id_producto
    left join oferta ofe on pro.id_producto = ofe.id_producto
where now() between ifnull(ofe.fechai,now()) and ifnull(ofe.fechat,now())
group by 1,2,3,4,5,6,7 order by cantidad desc;

drop view if exists vw_banner_ofertas;
create view vw_banner_ofertas as
select ofer.id_oferta,ofer.id_producto,ofer.fechai,ofer.fechat,ofer.precio_oferta,ofeb.banner
from oferta ofer
	inner join oferta_banner ofeb on ofer.id_oferta = ofeb.id_oferta
where now() between ifnull(ofer.fechai,now()) and ifnull(ofer.fechat,now())
order by rand() desc limit 3;
select * from vw_banner_ofertas;


select * from producto;