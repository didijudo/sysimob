
CREATE SEQUENCE imob.idempreendimento_seq;

CREATE TABLE imob.tb_empreendimento (
                idEmpreendimento INTEGER NOT NULL DEFAULT nextval('imob.idempreendimento_seq'),
                nmEmpreendimento VARCHAR(50) NOT NULL,
                dsEmpreendimento VARCHAR(300),
                dsEndereco VARCHAR(150) NOT NULL,
                dsRegiao VARCHAR(6) NOT NULL,
                CONSTRAINT empreendimento_pk PRIMARY KEY (idEmpreendimento)
);


ALTER SEQUENCE imob.idempreendimento_seq OWNED BY imob.tb_empreendimento.idEmpreendimento;

CREATE SEQUENCE imob.idbloco_seq;

CREATE TABLE imob.tb_bloco (
                idBloco INTEGER NOT NULL DEFAULT nextval('imob.idbloco_seq'),
                idEmpreendimento INTEGER NOT NULL,
                cdBloco INTEGER NOT NULL,
                stBloco CHAR(1) NOT NULL,
                CONSTRAINT bloco_pk PRIMARY KEY (idBloco, idEmpreendimento)
);


ALTER SEQUENCE imob.idbloco_seq OWNED BY imob.tb_bloco.idBloco;

CREATE SEQUENCE imob.idapartamento_seq;

CREATE TABLE imob.tb_apartamento (
                idApartamento INTEGER NOT NULL DEFAULT nextval('imob.idapartamento_seq'),
                idBloco INTEGER NOT NULL,
                idEmpreendimento INTEGER NOT NULL,
                stAapartamento CHAR(1) NOT NULL,
                nrApartamento INTEGER NOT NULL,
                psApartamento VARCHAR(5) NOT NULL,
                CONSTRAINT apartamento_pk PRIMARY KEY (idApartamento, idBloco, idEmpreendimento)
);
COMMENT ON COLUMN imob.tb_apartamento.psApartamento IS 'N/L -> Norte/Leste
N/O  -> Norte/Oeste
O/S -> Oeste/Sul
L/S -> Leste/Sul';


ALTER SEQUENCE imob.idapartamento_seq OWNED BY imob.tb_apartamento.idApartamento;

ALTER TABLE imob.tb_bloco ADD CONSTRAINT tb_empreendimento_tb_bloco_fk
FOREIGN KEY (idEmpreendimento)
REFERENCES imob.tb_empreendimento (idEmpreendimento)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE imob.tb_apartamento ADD CONSTRAINT tb_bloco_tb_apartamento_fk
FOREIGN KEY (idBloco, idEmpreendimento)
REFERENCES imob.tb_bloco (idBloco, idEmpreendimento)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;
