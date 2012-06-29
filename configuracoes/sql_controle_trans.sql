
CREATE SEQUENCE perfil.tb_trans_cdtrans_seq;

CREATE TABLE perfil.tb_trans (
                cdTrans INTEGER NOT NULL DEFAULT nextval('perfil.tb_trans_cdtrans_seq'),
                dsTrans VARCHAR(100) NOT NULL,
                flAtiva CHAR(1) NOT NULL,
                CONSTRAINT trans_pk PRIMARY KEY (cdTrans)
);


ALTER SEQUENCE perfil.tb_trans_cdtrans_seq OWNED BY perfil.tb_trans.cdTrans;

CREATE TABLE perfil.tb_menu (
                cdMenu INTEGER NOT NULL,
                cdTrans INTEGER,
                nmMenu VARCHAR(20) NOT NULL,
                nmLinkPagina VARCHAR(200),
                cdMenuPai INTEGER,
                CONSTRAINT menu_pk PRIMARY KEY (cdMenu)
);


CREATE SEQUENCE perfil.cdperfil_seq;

CREATE TABLE perfil.tb_perfil (
                cdPerfil INTEGER NOT NULL DEFAULT nextval('perfil.cdperfil_seq'),
                dsPerfil VARCHAR(100) NOT NULL,
                flAtivo CHAR(1) NOT NULL,
                CONSTRAINT perfil_pk PRIMARY KEY (cdPerfil)
);


ALTER SEQUENCE perfil.cdperfil_seq OWNED BY perfil.tb_perfil.cdPerfil;

CREATE TABLE perfil.tb_perfil_trans (
                cdPerfil INTEGER NOT NULL,
                cdTrans INTEGER NOT NULL,
                flInserir CHAR(1) NOT NULL,
                flAlterar CHAR(1) NOT NULL,
                flExcluir CHAR(1) NOT NULL,
                flConsultar CHAR(1) NOT NULL,
                CONSTRAINT perfil_trans_pk PRIMARY KEY (cdPerfil, cdTrans)
);


CREATE TABLE perfil.tb_usuario (
                cpfUsuario CHAR(11) NOT NULL,
                cdPerfil INTEGER NOT NULL,
                nmUsuario VARCHAR(50) NOT NULL,
                pwdUsuario VARCHAR(100) NOT NULL,
                flAtivo CHAR(1) NOT NULL,
                CONSTRAINT usuario_pk PRIMARY KEY (cpfUsuario)
);


ALTER TABLE perfil.tb_perfil_trans ADD CONSTRAINT tb_trans_tb_perfil_trans_fk
FOREIGN KEY (cdTrans)
REFERENCES perfil.tb_trans (cdTrans)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE perfil.tb_menu ADD CONSTRAINT tb_trans_tb_menu_fk
FOREIGN KEY (cdTrans)
REFERENCES perfil.tb_trans (cdTrans)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE perfil.tb_menu ADD CONSTRAINT tb_menu_tb_menu_fk
FOREIGN KEY (cdMenuPai)
REFERENCES perfil.tb_menu (cdMenu)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE perfil.tb_usuario ADD CONSTRAINT tb_perfil_tb_usuario_fk
FOREIGN KEY (cdPerfil)
REFERENCES perfil.tb_perfil (cdPerfil)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE perfil.tb_perfil_trans ADD CONSTRAINT tb_perfil_tb_perfil_trans_fk
FOREIGN KEY (cdPerfil)
REFERENCES perfil.tb_perfil (cdPerfil)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;
