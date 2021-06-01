-- Generado por Oracle SQL Developer Data Modeler 20.4.1.406.0906
--   en:        2021-03-01 22:20:21 CST
--   sitio:      Oracle Database 11g
--   tipo:      Oracle Database 11g



-- predefined type, no DDL - MDSYS.SDO_GEOMETRY

-- predefined type, no DDL - XMLTYPE

CREATE TABLE abogado (
    dpi        NUMBER NOT NULL,
    nombre     VARCHAR2(255) NOT NULL,
    apellido   VARCHAR2(255) NOT NULL,
    sexo       VARCHAR2(100) NOT NULL,
    edad       INTEGER NOT NULL,
    direccion  LONG,
    telefono   INTEGER NOT NULL
);

ALTER TABLE abogado ADD CONSTRAINT abogado_pk PRIMARY KEY ( dpi );

CREATE TABLE asunto (
    id_asunto         INTEGER NOT NULL,
    nombre_estado     VARCHAR2(150) NOT NULL,
    descripcion       LONG NOT NULL,
    fecha_inicio      DATE NOT NULL,
    fecha_fin         DATE NOT NULL,
    estado_id_estado  INTEGER NOT NULL,
    cliente_dni       INTEGER NOT NULL
);

ALTER TABLE asunto ADD CONSTRAINT asunto_pk PRIMARY KEY ( id_asunto );

CREATE TABLE cliente (
    dni        INTEGER NOT NULL,
    nombre     VARCHAR2(255) NOT NULL,
    apellido   VARCHAR2(150) NOT NULL,
    direccion  LONG NOT NULL,
    sexo       VARCHAR2(60) NOT NULL,
    edad       INTEGER NOT NULL,
    telefono   INTEGER NOT NULL
);

ALTER TABLE cliente ADD CONSTRAINT cliente_pk PRIMARY KEY ( dni );

CREATE TABLE estado (
    id_estado  INTEGER NOT NULL,
    estado     VARCHAR2(50) NOT NULL
);

ALTER TABLE estado ADD CONSTRAINT estado_pk PRIMARY KEY ( id_estado );

CREATE TABLE relation_4 (
    abogado_dpi       NUMBER NOT NULL,
    asunto_id_asunto  INTEGER NOT NULL
);

ALTER TABLE relation_4 ADD CONSTRAINT relation_4_pk PRIMARY KEY ( abogado_dpi,
                                                                  asunto_id_asunto );

ALTER TABLE asunto
    ADD CONSTRAINT asunto_cliente_fk FOREIGN KEY ( cliente_dni )
        REFERENCES cliente ( dni );

ALTER TABLE asunto
    ADD CONSTRAINT asunto_estado_fk FOREIGN KEY ( estado_id_estado )
        REFERENCES estado ( id_estado );

ALTER TABLE relation_4
    ADD CONSTRAINT relation_4_abogado_fk FOREIGN KEY ( abogado_dpi )
        REFERENCES abogado ( dpi );

ALTER TABLE relation_4
    ADD CONSTRAINT relation_4_asunto_fk FOREIGN KEY ( asunto_id_asunto )
        REFERENCES asunto ( id_asunto );



-- Informe de Resumen de Oracle SQL Developer Data Modeler: 
-- 
-- CREATE TABLE                             5
-- CREATE INDEX                             0
-- ALTER TABLE                              9
-- CREATE VIEW                              0
-- ALTER VIEW                               0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           0
-- ALTER TRIGGER                            0
-- CREATE COLLECTION TYPE                   0
-- CREATE STRUCTURED TYPE                   0
-- CREATE STRUCTURED TYPE BODY              0
-- CREATE CLUSTER                           0
-- CREATE CONTEXT                           0
-- CREATE DATABASE                          0
-- CREATE DIMENSION                         0
-- CREATE DIRECTORY                         0
-- CREATE DISK GROUP                        0
-- CREATE ROLE                              0
-- CREATE ROLLBACK SEGMENT                  0
-- CREATE SEQUENCE                          0
-- CREATE MATERIALIZED VIEW                 0
-- CREATE MATERIALIZED VIEW LOG             0
-- CREATE SYNONYM                           0
-- CREATE TABLESPACE                        0
-- CREATE USER                              0
-- 
-- DROP TABLESPACE                          0
-- DROP DATABASE                            0
-- 
-- REDACTION POLICY                         0
-- 
-- ORDS DROP SCHEMA                         0
-- ORDS ENABLE SCHEMA                       0
-- ORDS ENABLE OBJECT                       0
-- 
-- ERRORS                                   0
-- WARNINGS                                 0
