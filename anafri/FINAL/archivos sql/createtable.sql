CREATE TABLE alumno
(no_cta char(9) PRIMARY KEY,
ap_pat varchar(40),
ap_mat varchar(40),
nombre varchar(40),
id_plantel char(1));
ALTER TABLE alumno
ADD FOREIGN KEY (id_plantel) REFERENCES plantel(id_plantel);
SELECT * FROM alumno;
DESCRIBE alumno;
