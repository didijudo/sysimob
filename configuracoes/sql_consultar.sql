SELECT emp_id, emp_nome, emp_descricao, emp_localizacao, emp_dtlancamento
  FROM sysimob.tb_emp_empreendimento order by 1 desc;

SELECT *  FROM sysimob.tb_emp_empreendimento emp, sysimob.tb_blo_bloco blo where emp.emp_id = blo.emp_id;  
