# Casos de Prueba – Módulo Contratos de Colaboradores

---

## ID del Caso de Prueba: CP-CONTR-001
### Título de la Prueba: Creación de contrato asociado a colaborador existente
### Módulo/Característica: Contratos / Crear contrato

## Descripción:
Esta prueba verifica que el sistema permita crear un contrato y asociarlo correctamente a un colaborador previamente registrado en la base de datos.

### Precondiciones:
1. El usuario debe estar autenticado.
2. Debe existir al menos un colaborador registrado en la base de datos.
3. El colaborador no debe estar eliminado (soft delete).

### Pasos para la Ejecución:
1. Autenticarse en el sistema.
2. Navegar al módulo de contratos.
3. Seleccionar la opción de crear contrato.
4. Seleccionar un colaborador existente.
5. Ingresar los datos del contrato.
6. Guardar la información.

### Datos de Entrada:
- Colaborador: ID existente
- Tipo de contrato: Indefinido
- Fecha de inicio: 01/01/2024
- Fecha de finalización: 01/01/2025
- Salario: 2.000.000

## Resultado Esperado:
El sistema deberá crear el contrato y asociarlo correctamente al colaborador seleccionado.

## Resultado Real:
(Para ser completado durante la ejecución)

## Estado:
(Pasa / Falla / No Ejecutado)

---

## ID del Caso de Prueba: CP-CONTR-002
### Título de la Prueba: Rechazo de creación de contrato para colaborador inexistente
### Módulo/Característica: Contratos / Validación de colaborador

## Descripción:
Esta prueba verifica que el sistema no permita crear un contrato cuando se intenta asociar a un colaborador que no existe en la base de datos.

### Precondiciones:
1. El usuario debe estar autenticado.
2. El ID del colaborador ingresado no debe existir en la base de datos.

### Pasos para la Ejecución:
1. Autenticarse.
2. Navegar al módulo de contratos.
3. Intentar crear un contrato asociándolo a un ID de colaborador inexistente.
4. Guardar la información.

### Datos de Entrada:
- Colaborador: ID inexistente
- Tipo de contrato: Fijo
- Fecha de inicio: 01/01/2024
- Fecha de finalización: 01/01/2025
- Salario: 2.000.000

## Resultado Esperado:
El sistema deberá rechazar la creación del contrato y mostrar un mensaje de error indicando que el colaborador no existe.

## Resultado Real:
(Para ser completado durante la ejecución)

## Estado:
(Pasa / Falla / No Ejecutado)

---

## ID del Caso de Prueba: CP-CONTR-003
### Título de la Prueba: Validación de campos fecha y salario
### Módulo/Característica: Contratos / Validaciones

## Descripción:
Esta prueba verifica que el sistema valide correctamente los campos de fecha y salario al momento de crear o actualizar un contrato.

### Precondiciones:
1. El usuario debe estar autenticado.
2. Debe existir un colaborador válido.

### Pasos para la Ejecución:
1. Autenticarse.
2. Navegar al módulo de contratos.
3. Intentar crear un contrato con:
   - Fecha de finalización menor a la fecha de inicio.
   - Salario negativo o vacío.
4. Guardar la información.

### Datos de Entrada:
- Colaborador: ID existente
- Fecha de inicio: 01/01/2025
- Fecha de finalización: 01/01/2024
- Salario: -500000

## Resultado Esperado:
El sistema deberá mostrar mensajes de error indicando:
- Que la fecha de finalización no puede ser menor a la fecha de inicio.
- Que el salario debe ser un valor numérico positivo y obligatorio.

## Resultado Real:
(Para ser completado durante la ejecución)

## Estado:
(Pasa / Falla / No Ejecutado)

---

## ID del Caso de Prueba: CP-CONTR-004
### Título de la Prueba: Actualización de un contrato existente
### Módulo/Característica: Contratos / Editar contrato

## Descripción:
Esta prueba verifica que el sistema permita actualizar correctamente los datos de un contrato existente.

### Precondiciones:
1. El usuario debe estar autenticado.
2. Debe existir un contrato previamente registrado.
3. El contrato debe estar activo.

### Pasos para la Ejecución:
1. Autenticarse.
2. Navegar al módulo de contratos.
3. Seleccionar un contrato existente.
4. Modificar uno o más campos (por ejemplo, salario).
5. Guardar los cambios.

### Datos de Entrada:
- Salario actualizado: 2.500.000

## Resultado Esperado:
El sistema deberá actualizar correctamente la información del contrato en la base de datos.

## Resultado Real:
(Para ser completado durante la ejecución)

## Estado:
(Pasa / Falla / No Ejecutado)

---