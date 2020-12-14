ALTER SESSION SET "_ORACLE_SCRIPT"= TRUE;

CREATE TEMPORARY TABLESPACE TEMP_SUPERMERCADO
TEMPFILE 'D:\lenguajes\temp\temp01.dbf' size 20M autoextend on next 64k;

CREATE TABLESPACE SUPERMERCADO
DATAFILE 'D:\lenguajes\datos\supermercado01.dbf' SIZE 3M REUSE
AUTOEXTEND ON NEXT 12K MAXSIZE 10M;

CREATE USER SUPERMERCADO IDENTIFIED BY ORACLE
DEFAULT TABLESPACE SUPERMERCADO
TEMPORARY TABLESPACE TEMP_SUPERMERCADO;

ALTER SESSION SET CURRENT_SCHEMA = SUPERMERCADO;

CREATE TABLE Cliente(
	id_cliente number(11) not null,
	nombre varchar2(100) not null,
	apellido varchar2(100) not null,
	provincia varchar2(100) not null,
	canton varchar2(100) not null,
	distrito varchar2(200) not null,
	direccion varchar2(255) not null,
	correo varchar2(100) not null,
	telefono varchar2(10) not null,
	CONSTRAINT cliente_pk PRIMARY KEY(id_cliente),
	CONSTRAINT cliente_localizacion_fk FOREIGN KEY(id_localizacion) REFERENCES Localizacion(id_localizacion)
);

CREATE TABLE Modo_Pago(
	id_modopago number(11) not null,
	nombre varchar2(100) not null,
	CONSTRAINT modopago_pk PRIMARY KEY(id_modopago)
);

CREATE TABLE Factura(
	num_factura number(11) not null,
	id_modopago number(11) not null,
	id_cliente number(11) not null,
	iva decimal(11,2) not null,
	descuento decimal(11,2) not null,
	fecha date default sysdate not null,
	CONSTRAINT factura_pk PRIMARY KEY(num_factura),
	CONSTRAINT factura_cliente_fk FOREIGN KEY(id_cliente) REFERENCES Cliente(id_cliente),
	CONSTRAINT factura_modopago_fk FOREIGN KEY(id_modopago) REFERENCES Modo_Pago(id_modopago)
);

CREATE TABLE Categoria(
	id_categoria number(11) not null,
	nombre varchar2(100) not null,
	descripcion varchar2(255) not null,
	CONSTRAINT categoria_pk PRIMARY KEY(id_categoria)
);

CREATE TABLE Articulo(
	id_articulo number(11) not null,
	id_categoria number(11) not null,
	nombre varchar2(100) not null,
	precio number(11,2) not null,
	codigo_cabys varchar2(50) not null,
	CONSTRAINT articulo_pk PRIMARY KEY(id_articulo),
	CONSTRAINT articulo_categoria_pk FOREIGN KEY(id_categoria) REFERENCES Categoria(id_categoria)
);

CREATE TABLE FacturaDetalle(
	num_detallefactura number(11) not null,
	num_factura number(11) not null,
	id_articulo number(11) not null,
	cantidad number not null,
	precio decimal(11,2) not null,
	CONSTRAINT facturadetalle_id PRIMARY KEY(num_detallefactura),
	CONSTRAINT facturadetalle_factura_fk FOREIGN KEY(num_factura) REFERENCES Factura(num_factura),
	CONSTRAINT facturadetalle_articulo_fk FOREIGN KEY(id_articulo) REFERENCES Articulo(id_articulo)
);

CREATE TABLE BITACORA(
ID_BITACORA NUMBER(11) not null,
FECHA date default sysdate not null,
ACCION VARCHAR2(101) not null,
CONSTRAINT bitacora_pk PRIMARY KEY(ID_BITACORA)
);

