/*crear tablas fuertes*/
/*1 tabla empleado*/
create table empleado
(
    id_em int auto_increment,
    nombre_em varchar(30) not null,
    cargo_em varchar(30) not null,
    tel_em int,
    direccion_em varchar(30) not null,
    correo_em varchar(30) not null,
    identificacion_em varchar(30) not null,
    salario_em int,
    primary key(id_em)
);
/*2 tabla cliente*/
create table cliente
(
    id_cli int auto_increment,
    nombre_cli varchar(30) not null,
    identificacion_cli varchar(30) not null,
    tel_cli int,
    direccion_cli varchar(30) not null,
    primary key(id_cli)
);
/*3 tabla plato*/
create table plato
(
    id_plato int auto_increment,
    nombre_plato varchar(30) not null,
    ingredientes_plato varchar(300) not null,
    precio_plato int,
    primary key(id_plato)
);
/*4 tabla producto*/
create table producto
(
    id_produc int auto_increment,
    nombre_produc varchar(30) not null,
    precio_produc int,
    fecha_caducidad_produc date,
    primary key(id_produc)
);
/*5 tabla proveedor*/
create table proveedor
(
    id_pro int auto_increment,
    nombre_pro varchar(30) not null,
    tel_pro int,
    direccion_pro varchar(30) not null,
    correo_pro varchar(30) not null,
    primary key(id_pro)
);
/*6 tabla factura*/
create table factura
(
    id_fac int auto_increment,
    datos_cli_fac varchar(80) not null,
    datos_facturador_fac varchar(80) not null,
    forma_pago_fac varchar(30) not null,
    id_em int,
    primary key(id_fac)
);
/*7 tabla PlatoXCliente*/
create table platoxcliente
(
    id_platoxcli int auto_increment,
    id_plato int,
    id_cli int,
    porcion_platoxcli varchar(30) not null,
    primary key(id_platoxcli)
);
/*8 tabla ProductoXPlato*/
create table productoxplato
(
    id_producxplato int auto_increment,
    id_produc int,
    id_plato int,
    categoria_producxplato varchar(30) not null,
    primary key(id_producxplato)
);
/*9 tabla ProvedorXProducto*/
create table provedorxproducto
(
    id_proxproduc int auto_increment,
    id_pro int,
    id_produc int,
    fecha_de_compra_proxproduc date,
    primary key(id_proxproduc)
);

/*relaciones*/
/*1 relacion empleado - imprimir - factura*/
alter table factura add constraint imprimir
foreign key (id_em) references empleado(id_em);

/*2 relacion cliente - recibir - platoxcliente*/
alter table platoxcliente add constraint recibir
foreign key (id_cli) references cliente(id_cli);

/*3 relacion platoxcliente - tiene - plato*/
alter table platoxcliente add constraint tiene
foreign key (id_plato) references plato(id_plato);

/*4 relacion plato - hacer - productoxplato*/
alter table productoxplato add constraint hacer
foreign key (id_plato) references plato(id_plato);

/*5 relacion plato - fabricar - productoxplato*/
alter table productoxplato add constraint fabricar
foreign key (id_produc) references producto(id_produc);

/*6 relacion producto - distribuir - proveedroxproducto*/
alter table provedorxproducto add constraint distribuir
foreign key (id_produc) references producto(id_produc);

/*7 relacion proveedor - vender - proveedroxproducto*/
alter table provedorxproducto add constraint vender
foreign key (id_pro) references proveedor(id_pro);

/*INSERTAR DATOS*/

/*1 empleados*/
INSERT INTO `empleado`(`id_em`, `nombre_em`, `cargo_em`, `tel_em`, `direccion_em`, `correo_em`, `identificacion_em`, `salario_em`) 
VALUES  (1,"Ana","Preparar pizza",3115451416,"Cra. 100a #138A-09","anapre@gmail.com",1547894675,500.000),
        (2,"Jackie","Hacer masas",3105884977,"Cra. 101a #155B-10","jackieha@gmail.com",1374864239,500.000),
        (3,"Yineth","Jefa",3041306584,"Cra. 102a #195A-11","yinethje@gmail.com",4125679413,800.000),
        (4,"Sebastian","Mesero",3135874369,"Cra. 103a #125B-12","sebasme@gmail.com",1256874139,500.000),
        (5,"Darwin","Repartidor",3208475186,"Cra. 104a #165B-13","darwinre@gmail.com",1023547895,200.000);

/*2 factura*/
INSERT INTO `cliente`(`id_cli`, `nombre_cli`, `identificacion_cli`, `tel_cli`, `direccion_cli`) 
VALUES  (1,"Carlos",1682791354,3135459712,"carrera 154bis #556 c06"),
        (2,"Andres",1684394762,3014587126,"carrera 181bis #187 c33"),
        (3,"Felipe",1067942589,3024817963,"carrera 126bis #146 c09"),
        (4,"David",1024569825,3058364512,"carrera 151bis #256 c05"),
        (5,"Daniela",1031804370,3041306294,"carrera 101bis #156 c03");
    
/*3 plato*/
INSERT INTO `plato`(`id_plato`, `nombre_plato`, `ingredientes_plato`, `precio_plato`) 
VALUES  (1,"Hamburguesa","Pan, Lechuga, Tomate, Salsas, Carne, Queso",8000),
        (2,"Perro caliente","Pan, Salchicha, Queso, Papas de paquete, Salsas",6000),
        (3,"Salchipapa","Papas francesas, Salchicha, Salsas, Huevo de codornis",5000),
        (4,"Pizza","Queso, Harina, Pasta de tomate, Bocadillo, Carnes o Verduras",3000),
        (5,"Mazorcada","Maiz tierno, Pollo desmechado, Salchicha, Queso, Papas francesas, Salsas",5000);

/*4 producto*/
INSERT INTO `producto`(`id_produc`, `nombre_produc`, `precio_produc`, `fecha_caducidad_produc`) 
VALUES  (1,"Cajas de pizzas",100000,"2026/06/16"),
        (2,"Kilos de harina",250000,"2025/02/06"),
        (3,"Libras de papas",150000,"2022/10/11"),
        (4,"Huevos",18000,"2023/05/05"),
        (5,"Salchichas",30000,"2023/01/01");

/*5 proveedor*/
INSERT INTO `proveedor`(`id_pro`, `nombre_pro`, `tel_pro`, `direccion_pro`, `correo_pro`) 
VALUES  (1,"Cristhian",1147484715,"calle 45 #63b 14-8","cris@gmail.com"),
        (2,"Manuel",1474834417,"calle 55 #33b 18-12","manu@gmail.com"),
        (3,"David",2147483647,"calle 80 #40b 70-90","dav@gmail.com"),
        (4,"Juan",1478523697,"calle 20 #20b 10-80","jua@gmail.com"),
        (5,"Maira",1031804369,"calle 10 #90b 59-13","Mai@gmail.com");                  