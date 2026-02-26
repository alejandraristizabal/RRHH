# Casos de Prueba – Módulo Colaboradores

---

## ID del Caso de Prueba: CP-COLAB-001
### Título de la Prueba: Creación de un colaborador
### Módulo/Característica: Colaboradores / Crear colaborador

## Descripción:
Esta prueba verifica que un usuario autenticado pueda crear un colaborador correctamente en el sistema.

### Precondiciones:
1. El usuario no puede ser menor de edad.
2. El usuario debe estar registrado y autenticado.
3. Los campos email y número de identificación no deben repetirse en la base de datos.

### Pasos para la Ejecución:
1. Autenticarse en el sistema.
2. Navegar al módulo de colaboradores (/collaborators).
3. Seleccionar la opción de crear colaborador.
4. Ingresar los datos solicitados.
5. Guardar la información.

### Datos de Entrada:
- Nombres: Alejandra
- Apellidos: Muñoz
- Tipo de documento: CC
- Número de documento: 123456
- Fecha de nacimiento: 24 mayo 2000
- Email: aleja@gmail.com

## Resultado Esperado:
El sistema deberá crear el colaborador exitosamente y almacenarlo en la base de datos.

## Resultado Real:
(Para ser completado durante la ejecución)

## Estado:
(Pasa / Falla / No Ejecutado)

---

## ID del Caso de Prueba: CP-COLAB-002
### Título de la Prueba: Rechazo de creación por datos duplicados
### Módulo/Característica: Colaboradores / Validación de duplicados

## Descripción:
Esta prueba verifica que el sistema no permita crear un colaborador cuando el email y el número de documento ya existen en la base de datos.

### Precondiciones:
1. El usuario debe estar autenticado.
2. Debe existir previamente un colaborador con el mismo email y número de documento.
3. El usuario no puede ser menor de edad.

### Pasos para la Ejecución:
1. Autenticarse.
2. Navegar al módulo de colaboradores.
3. Intentar crear un colaborador con email y documento ya registrados.
4. Guardar la información.

### Datos de Entrada:
- Nombres: Alejandra
- Apellidos: Muñoz
- Tipo de documento: CC
- Número de documento: 123456
- Fecha de nacimiento: 24 mayo 2000
- Email: aleja@gmail.com

## Resultado Esperado:
El sistema deberá rechazar la creación del colaborador y mostrar mensajes de error indicando que el email y el número de documento ya existen.

## Resultado Real:
(Para ser completado durante la ejecución)

## Estado:
(Pasa / Falla / No Ejecutado)

---

## ID del Caso de Prueba: CP-COLAB-003
### Título de la Prueba: Visualización del listado de colaboradores
### Módulo/Característica: Colaboradores / Listado

## Descripción:
Esta prueba verifica que el sistema muestre correctamente el listado de colaboradores registrados.

### Precondiciones:
1. El usuario debe estar autenticado.
2. Deben existir colaboradores registrados en la base de datos.

### Pasos para la Ejecución:
1. Autenticarse.
2. Navegar al módulo de colaboradores (/collaborators).
3. Visualizar el listado mostrado en pantalla.

### Datos de Entrada:
No aplica.

## Resultado Esperado:
El sistema deberá mostrar todos los colaboradores registrados en la base de datos.

## Resultado Real:
(Para ser completado durante la ejecución)

## Estado:
(Pasa / Falla / No Ejecutado)

---

## ID del Caso de Prueba: CP-COLAB-004
### Título de la Prueba: Actualización de un colaborador
### Módulo/Característica: Colaboradores / Editar colaborador

## Descripción:
Esta prueba verifica que el sistema permita actualizar la información de un colaborador existente.

### Precondiciones:
1. El usuario debe estar autenticado.
2. Debe existir al menos un colaborador registrado.

### Pasos para la Ejecución:
1. Autenticarse.
2. Ingresar al módulo de colaboradores.
3. Seleccionar un colaborador existente.
4. Modificar uno o más campos.
5. Guardar los cambios.

### Datos de Entrada:
- Nombres: Actualizado
- Apellidos: Muñoz
- Tipo de documento: CC
- Número de documento: 123456
- Fecha de nacimiento: 24 mayo 2000
- Email: aleja@gmail.com

## Resultado Esperado:
El sistema deberá actualizar correctamente la información del colaborador en la base de datos.

## Resultado Real:
(Para ser completado durante la ejecución)

## Estado:
(Pasa / Falla / No Ejecutado)

---

## ID del Caso de Prueba: CP-COLAB-005
### Título de la Prueba: Eliminación lógica (Soft Delete) de un colaborador
### Módulo/Característica: Colaboradores / Eliminar colaborador

## Descripción:
Esta prueba verifica que el sistema permita eliminar un colaborador mediante eliminación lógica (soft delete), sin borrar físicamente el registro de la base de datos.

### Precondiciones:
1. El usuario debe estar autenticado.
2. Debe existir al menos un colaborador registrado.

### Pasos para la Ejecución:
1. Autenticarse.
2. Navegar al módulo de colaboradores.
3. Seleccionar un colaborador.
4. Presionar la opción eliminar.
5. Confirmar la eliminación.

### Datos de Entrada:
ID del colaborador existente.

## Resultado Esperado:
El sistema deberá marcar el colaborador como eliminado (soft delete) y no mostrarlo en el listado principal.

## Resultado Real:
(Para ser completado durante la ejecución)

## Estado:
(Pasa / Falla / No Ejecutado)

---