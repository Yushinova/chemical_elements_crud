USE chemical_elements_db;

CREATE TABLE chemical_element_t (
id INT NOT NULL AUTO_INCREMENT,
name_f NVARCHAR(200) NOT NULL,
code_f NVARCHAR(10) NOT NULL,
group_f INT NOT NULL,
period_f INT NOT NULL,
number_protons_f INT NOT NULL,
is_metall_f BIT NOT NULL,
PRIMARY KEY(id)
);

INSERT INTO chemical_element_t (name_f, code_f, group_f, period_f, number_protons_f, is_metall_f
) VALUES
(N'Водород', 'H', 1, 1, 1, 0),
(N'Алюминий', 'Al', 3, 3, 13, 1);