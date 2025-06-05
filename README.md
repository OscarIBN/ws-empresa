## Prueba Web Services

Prueba para la vacante de desarrollador backend

Por OIBN

## Instalaciones previas

- **PHP v. 8**
- **Laravel v. 12**
- **Composer**

## Inicio

<pre>
php artisan serve
</pre>

## Requerimientos tecnológicos y técnicos

- En el momento de crearse una empresa esta deberá crearse con estado ‘Activo’ por defecto.
- El nit debe ser único por lo tanto no puede estar duplicado
- Puede usarse cualquier motor de BD
- La lógica debe ser codificada utilizando Laravel y PHP
- Deben validarse los datos de entrada (tipo, valores permitidos, longitud)
- Subir la implementación a un repositorio público y compartir enlace

- Se evidencia conocimientos y uso de manejo de excepciones usando try catch
- Layering, patrones de diseño. Se implementa clean code
- Se evidencia conocimiento y uso de pruebas unitarias se realiza usando unit test

## End Points

### Variables

<table>
    <tr>
        <th>IP</th>
        <th>Referencia</th>
    </tr>
    <tr>
        <td><code>localhost</code></td>
        <td>Máquina local</td>
    </tr>
    <tr>
        <td><code>179.33.23.186</code></td>
        <td>Servidor casero publico propio</td>
    </tr>
</table>


### Listar todas las empresas

Muestra todos las empresas

GET
<br>
<code>
http://{{ip}}:8000/api/enterprises
</code>


### Mostrar empresa por nit

Muestra la empresa que coincida con el nit

GET
<br>
<code>
http://{{ip}}:8000/api/enterprises/{{nit}}
</code>


### Crear empresa

Crea una nueva empresa con estado true

POST
<br>
<code>
http://{{ip}}:8000/api/enterprises
</code>

BODY
<br>
<pre>
{
  "nit":"123456789",
  "nombre":"Nombre de la empresa",
  "direccion":"Dirección de la empresa",
  "telefono":"Telefono de la empresa"
}
</pre>


### Editar empresa

Edita una empresa

PUT
<br>
<code>
http://{{ip}}:8000/api/enterprises/{{nit}}
</code>

BODY
<br>
<pre>
{
  "nombre":"Nombre de la empresa",
  "direccion":"Dirección de la empresa",
  "telefono":"Telefono de la empresa",
  "estado":"Estado de la empresa puede ser true o false"
}
</pre>

### Eliminar empresa

Elimina una empresa

DELETE
<br>
<code>
http://{{ip}}:8000/api/enterprises/{{nit}}
</code>