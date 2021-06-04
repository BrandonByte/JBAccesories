create database Gamer;
use Gamer;

create table Cliente (
	id_cliente varchar(15) not null,
	nombre varchar(30) not null,
	direccion varchar(40) not null,
	barrioconjunto varchar(40) not null,
	correo varchar(30) not null,
	observacion text,
	constraint PKY_cliente primary key (id_cliente)
);

create table Telefono_Cliente(
    num_telefono VARCHAR (15) NOT NULL,
    id_usuario Varchar(15) NOT NULL,
	descripcion text,
    constraint FKY_Telefono_Cliente FOREIGN key (id_usuario)
    References Cliente(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
);

create table facturaventa (
	no_Factura VARCHAR(15) NOT NULL,
	id_cliente VARCHAR(15) NOT NULL,
	fechafact date not null,
	totalsiniva float not null,
	totaliva float not null,
	totalfactura float not null,
    constraint PKY_facturaventa primary key (no_Factura),
    constraint FKY_id_cliente FOREIGN key (id_cliente)
    References Cliente(id_cliente) ON UPDATE CASCADE ON DELETE CASCADE
);

create table marca (
	id_marca int(4) not null AUTO_INCREMENT,
	marca varchar (20) not null,
    constraint PKY_marca primary key (id_marca)
);

create table categoria (
	id_categoria int(4) not null AUTO_INCREMENT,
	categoria varchar (20) not null,
    constraint PKY_categoria primary key (id_categoria)
);

create table producto (
	id_producto varchar (15) not null,
	nombre varchar (30) not null,
	id_marca int (4) not null,
	id_categoria int (4) not null,
	cantidad int (8),
	referencia varchar (12) not null,
	garantia int (3) not null,
	vlr_venta float not null,
	caracteristicas text,
	foto varchar (80) not null,
	constraint PKY_producto primary key (id_producto),
	constraint FKY_id_marca FOREIGN key (id_marca)
    References marca(id_marca) ON UPDATE CASCADE ON DELETE CASCADE,
	constraint FKY_id_categoria FOREIGN key (id_categoria)
    References categoria(id_categoria) ON UPDATE CASCADE ON DELETE CASCADE
);

create table itemsventa(
	no_Factura varchar(15) not null,
	id_producto varchar (15) not null,
	cantidad int (6),
	vlr_siniva float,
	iva float,
	vlr_coniva float,
	constraint FKY_no_Factura FOREIGN key (no_Factura)
    References facturaventa(no_Factura) ON UPDATE CASCADE ON DELETE CASCADE,
	constraint FKY_id_producto FOREIGN key (id_producto)
    References producto(id_producto) ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO marca (marca)
VALUES ('Aorus'),('Asrock'),('Msi'),('Gigabyte'),('Amd'),('Evga');

insert into categoria(categoria)
VALUES ('Board'),('CPU'),('GPU');

insert into producto (id_producto, nombre, id_marca, id_categoria, cantidad, referencia, garantia, vlr_venta, caracteristicas, foto)
values
('1001', 'Board Aorus B550 Pro', 1, 1, 5, '1345', 1, 1069000, 'Placa base AMD B550 AORUS con VRM digital real de 12 + 2 fases, disipador de calor de matriz de aletas, heatpipe de toque directo, PCIe dual 4.0 / 3.0 x4 M.2 con protectores térmicos, LAN de 2.5GbE, RGB FUSION 2.0, Q-Flash Plus', 'productos/board1.jpg'),
('1002', 'Board Gigabyte B550m', 4, 1, 5, '4678', 1, 538000, 'Placa base AMD B550 ultra duradera con solución VRM digital pura, ranura PCIe 4.0 x16, conectores duales PCIe 4.0 / 3.0 M.2, LAN para juegos GIGABYTE 8118, Smart Fan 5 con FAN STOP, RGB FUSION 2.0, Q-Flash Plus', 'productos/board2.png'),
('1003', 'Board Gigabyte Z490', 4, 1, 6, '0123', 1, 899000,'Intel Z490 Ultra Durable placa base con Direct 11 MAS 1 fases VRM digital, extendido MOS disipador de calor, doble NVMe PCIe 3.0 x4 M.2, GbE LAN Gaming, O Shield Integrado I O, Q-Flash PLUS, RGB FUSION 2.0', 'productos/board3.jpg'),
('1004', 'Board Aorus Z490', 1, 1, 4, '1845', 1, 1175000, 'Intel Z490 AORUS placa base con Direct 12 + 1 fases de diseño VRM digital, la solución térmica integral con la superficie ampliada del disipador de calor, Intel Dual Band 802.11ac WiFi, LAN 2.5GbE, RGB FUSION 2.0', 'productos/board4.png'),
('1005', 'Board Msi Mpg Z490', 3, 1, 5, '4357', 1, 1380000, 'La serie MPG saca lo mejor de los jugadores al permitir una expresión completa en color con control avanzado de iluminación RGB y sincronización', 'productos/board5.png'),
('1006', 'Msi Geforce Gt 1030', 3, 3, 5, '3452', 1, 434000, 'Boost Clock / Base Clock, 1518 MHz / 1265 MHz, Memoria GDDR5 de 2GB / 6008 MHz, Condensadores sólidos', 'productos/gpu.png'),
('1007', 'Msi Geforce Rtx 2070 Super', 3, 3, 7, '4231', 1, 2585000, 'GeForce RTX funciona con Nvidia Turing, la arquitectura de GPU más avanzada del mundo para jugadores y creadores', 'productos/gpu1.jpg'),
('1008', 'Gigabyte Gt 1030 Oc 2g', 4, 3, 5, '4789', 2, 434000, 'Diseñada con bobinas y condensadores de alta calidad, esta tarjeta gráfica ofrece un rendimiento excepcional y una vida útil duradera del sistema.', 'productos/gpu3.jpg'),
('1009', 'Evga Geforce Gtx 1660 Black', 6, 3, 6, '7879', 2, 1245000, 'Capture y comparta videos, capturas de pantalla y transmisiones en vivo con amigos. Mantenga sus controladores actualizados y optimice la configuración de su juego. GeForce Experience ™ te permite hacerlo todo. Es el compañero esencial de su tarjeta gráfica GeForce', 'productos/gpu4.jpg'),
('1010', 'Msi Radeon Rx 5500 Xt', 3, 3, 5, '1234', 1, 871000,  'Aspa del ventilador de dispersión: aspa curva empinada que acelera el flujo de aire, Aspa del ventilador tradicional: proporciona un flujo de aire constante al disipador de calor masivo debajo, Utilidad de overclocking Afterburne', 'productos/gpu5.jpg'),
('1011', 'Procesador Amd Ryzen 7 3700x', 5, 2, 6, '3537', 2, 1589000, 'Experiencia de Juego y Transmisiones en Tiempo Real Dominantes, Un diseño exquisitamente equilibrado para los fanáticos de PC', 'productos/cpu.jpg'),
('1012', 'Procesador Ryzen 5 3400g', 5, 2, 5, '6368', 1, 753000, 'La tarjeta gráfica más potente en un procesador para computadoras de escritorio, El poder de jugar. Totalmente desbloqueado.', 'productos/cpu2.jpg'),
('1013', 'Procesador Amd Ryzen 9 3950x', 5, 2, 4, '3538', 2, 3.910000,'Fabricado para ti. Diseñado para ganar. El procesador para computadoras de escritorio de 16 núcleos más potente del mundo1', 'productos/cpu3.jpg'),
('1014', 'Procesador Amd Ryzen 3990x', 5, 2, 5, '1324', 2, 19332000, 'Un procesador para renderizarlo todo. Gracias a sus 64 núcleos, el procesador para ordenadores de sobremesa más potente del mundo va a hacer que te olvides del tiempo.', 'productos/cpu4.jpg'),
('1015', 'Procesador Amd Ryzen 3970x', 5, 2, 6, '3134', 2, 9889000, 'Los 24 núcleos proporcionan 48 subprocesos de potencia de procesamiento múltiple y simultánea, lo que es asombroso', 'productos/cpu5.jpg');























