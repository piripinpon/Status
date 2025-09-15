# Health Check - Estado de la Aplicación

Este script en **PHP** funciona como un endpoint de verificación (**health check**) para una aplicación de punto de venta
Su objetivo es comprobar el estado de la sesión del usuario, la conexión a la base de datos y mostrar un resumen en formato **JSON**.

---

## 📌 Funcionamiento

1. **Inicio de sesión y conexión a la base de datos**
   - Inicia la sesión del usuario.
   - Conecta a la base de datos utilizando `conecta.php`.

<img width="398" height="78" alt="image" src="https://github.com/user-attachments/assets/1a3dce25-ac2e-4d37-949e-a05eae3296ab" />

2. **Verificación de sesión**
   - Si el usuario no tiene sesión activa, se redirige a `index.php`.

3. **Obtención de datos del cliente**
   - Recupera el **ID del cliente** desde la sesión.
   - Consulta en la tabla `clientes` para obtener sus datos.
   - Si no existe el cliente, devuelve un error en JSON.
     
<img width="486" height="72" alt="image" src="https://github.com/user-attachments/assets/50201231-ef3f-42a6-878f-d27bb1a2845b" />

4. **Estado de la base de datos**
   - Comprueba si la conexión fue exitosa (`OK`) o si hubo un error (`ERROR`).
   
<img width="424" height="70" alt="image" src="https://github.com/user-attachments/assets/8c6844c3-7e05-4feb-8757-2f77e1aa8abe" />

5. **Carritos activos**
   - Consulta en la tabla `pedidos` cuántos carritos activos (status = 0) tiene el cliente.

6. **Respuesta en JSON**
   - Devuelve un objeto con:
     - `usuario`: nombre del cliente
     - `app`: estado de la aplicación (`OK`)
     - `database`: estado de la base de datos (`OK` o `ERROR`)
     - `pedidos_activos`: número de carritos abiertos
     - `hora`: fecha y hora actual del servidor

---

** Ejemplo de aplicacion

Primeramente creamos un usuario

<img width="613" height="509" alt="image" src="https://github.com/user-attachments/assets/166f7308-d672-42f2-b634-0303b99f30d3" />

** Nos logueamos y entramos a la pagina 

<img width="1587" height="818" alt="image" src="https://github.com/user-attachments/assets/6c4338fd-6c8b-4114-a855-0b66d60f3374" />

Para comprobar el status nos dirigimos al archivo status.php y nos dara estos datos del usuario

<img width="758" height="65" alt="image" src="https://github.com/user-attachments/assets/09a40bed-f3a6-4b29-b3bf-833d40ba6e94" />

Aqui demuestra que el estado de mi aplicacion esta OK.





