-- Generado por Oracle SQL Developer Data Modeler 20.4.1.406.0906
--   en:        2021-03-02 07:33:48 CST
--   sitio:      Oracle Database 11g
--   tipo:      Oracle Database 11g



-- predefined type, no DDL - MDSYS.SDO_GEOMETRY

-- predefined type, no DDL - XMLTYPE

CREATE TABLE s_dept (
    id           INTEGER NOT NULL,
    nombre_dept  VARCHAR2(150) NOT NULL,
    region_id    INTEGER NOT NULL
);

ALTER TABLE s_dept ADD CONSTRAINT s_dept_pk PRIMARY KEY ( id );

CREATE TABLE s_emp (
    id              INTEGER NOT NULL,
    primer_nombre   VARCHAR2(150) NOT NULL,
    segundo_nombre  VARCHAR2(150) NOT NULL,
    userid          VARCHAR2(150) NOT NULL,
    fecha_inicio    DATE NOT NULL,
    cometario       LONG NOT NULL,
    salario         NUMBER NOT NULL,
    comision_pct    NUMBER,
    jefe_id         INTEGER,
    dept_id         INTEGER NOT NULL
);

ALTER TABLE s_emp ADD CONSTRAINT s_emp_pk PRIMARY KEY ( id );

CREATE TABLE s_region (
    id      INTEGER NOT NULL,
    nombre  VARCHAR2(150) NOT NULL
);

ALTER TABLE s_region ADD CONSTRAINT s_region_pk PRIMARY KEY ( id );

ALTER TABLE s_dept
    ADD CONSTRAINT s_dept_s_region_fk FOREIGN KEY ( region_id )
        REFERENCES s_region ( id );

ALTER TABLE s_emp
    ADD CONSTRAINT s_emp_s_dept_fk FOREIGN KEY ( dept_id )
        REFERENCES s_dept ( id );

ALTER TABLE s_emp
    ADD CONSTRAINT s_emp_s_emp_fk FOREIGN KEY ( jefe_id )
        REFERENCES s_emp ( id );



-- Informe de Resumen de Oracle SQL Developer Data Modeler: 
-- 
-- CREATE TABLE                             3
-- CREATE INDEX                             0
-- ALTER TABLE                              6
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
