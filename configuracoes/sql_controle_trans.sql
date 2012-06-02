
CREATE TABLE public.tb_trans (
                cdTrans VARCHAR(30) NOT NULL,
                dsTrans VARCHAR(100) NOT NULL,
                flAtiva CHAR(1) NOT NULL,
                CONSTRAINT trans_pk PRIMARY KEY (cdTrans)
);


CREATE SEQUENCE public.cdperfil_seq;

CREATE TABLE public.tb_perfil (
                cdPerfil INTEGER NOT NULL DEFAULT nextval('public.cdperfil_seq'),
                dsPerfil VARCHAR(100) NOT NULL,
                flAtivo CHAR(1) NOT NULL,
                CONSTRAINT perfil_pk PRIMARY KEY (cdPerfil)
);


ALTER SEQUENCE public.cdperfil_seq OWNED BY public.tb_perfil.cdPerfil;

CREATE TABLE public.tb_perfil_trans (
                cdPerfil INTEGER NOT NULL,
                cdTrans VARCHAR(30) NOT NULL,
                flInserir CHAR(1) NOT NULL,
                flAlterar CHAR(1) NOT NULL,
                flExcluir CHAR(1) NOT NULL,
                flConsultar CHAR(1) NOT NULL,
                CONSTRAINT perfil_trans_pk PRIMARY KEY (cdPerfil, cdTrans)
);


CREATE TABLE public.tb_usuario (
                cpfUsuario CHAR(11) NOT NULL,
                cdPerfil INTEGER NOT NULL,
                nmUsuario VARCHAR(50) NOT NULL,
                pwdUsuario VARCHAR(100) NOT NULL,
                flAtivo CHAR(1) NOT NULL,
                CONSTRAINT usuario_pk PRIMARY KEY (cpfUsuario)
);


ALTER TABLE public.tb_perfil_trans ADD CONSTRAINT tb_trans_tb_perfil_trans_fk
FOREIGN KEY (cdTrans)
REFERENCES public.tb_trans (cdTrans)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.tb_usuario ADD CONSTRAINT tb_perfil_tb_usuario_fk
FOREIGN KEY (cdPerfil)
REFERENCES public.tb_perfil (cdPerfil)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.tb_perfil_trans ADD CONSTRAINT tb_perfil_tb_perfil_trans_fk
FOREIGN KEY (cdPerfil)
REFERENCES public.tb_perfil (cdPerfil)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;
