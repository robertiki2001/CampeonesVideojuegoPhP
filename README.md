
# CampeonesVideojuego(PHP & MySQL)

## ÍNDEX CONTENIDO

**IDE**: Visual Studio Code

**Lenguajes**: HTML, PHP

**Base de Datos**: MySQL

**Resumen**: Esta es una página web en la cual podremos experimentar que un Usuario utiliza un Campeón y viceversa. Un campeón posee muchas habilidades que comparte con otros campeones. Estas habilidades pueden ser de un solo tipo.

**Usuario**: robert
**Contraseña**: 123

**DIAGRAMA ENTIDAD RELACIÓN**

**MODELO RELACIONAL**
- **Campeón** ( id_campeon, id_usuario,nivel,ataque,armadura,vida, nombre).
On ,id_usuario,és clau forana de Campeón.
- **Usuario** (id_usuario, nombre_cuenta,contrasenya, id_campeon).
On , id_campeon). és clau forana de Usuario.
- **Posee** ( id_posee, id_habilidad, id_campeón).
On id_habilidad és clau forana de Habilidades.
On id_campeón és clau forana de Campeón.
- **Habilidades** ( id_habilidad,nombre,descripción,id_tipo_habilidad).
On id_tipo_habilidad és clau forana de Habilidad.
- **Tipo_habilidad** (id_tipoDeHabilidad, tipo).
