
set foreign_key_checks = 0;
truncate table Calificacion_rel_empresa;
truncate table Empresa;
truncate table Imagen_rel_empresa;
truncate table Rubro;
truncate table Usuario;
truncate table Video_rel_empresa;
truncate table Zona;
set foreign_key_checks = 1;



set foreign_key_checks = 0;
drop table Calificacion_rel_empresa;
drop table Empresa;
drop table Imagen_rel_empresa;
drop table Rubro;
drop table Usuario;
drop table Video_rel_empresa;
drop table Zona;
set foreign_key_checks = 1;