INSERT INTO sysimob.tb_usu_usuario(
            usu_cpf, per_codigo, usu_nome, usu_password, usu_flativo)
    VALUES ('12345678910', 1, 'CORRETOR', md5('123'), 1);
    
INSERT INTO sysimob.tb_usu_usuario(
            usu_cpf, per_codigo, usu_nome, usu_password, usu_flativo)
    VALUES ('12345678911', 2, 'ADMINISTRADOR', md5('123'), 1);
    
INSERT INTO sysimob.tb_usu_usuario(
            usu_cpf, per_codigo, usu_nome, usu_password, usu_flativo)
    VALUES ('12345678912', 3, 'CORRETORA', md5('123'), 1);

SELECT * FROM sysimob.tb_usu_usuario;