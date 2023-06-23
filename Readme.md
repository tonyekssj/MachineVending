# Proyecto de Web Server para Controlar una Máquina Expendedora de Detergentes Líquidos

Este proyecto implementa un servidor web utilizando microcontroladores ESP32 para controlar una máquina expendedora de detergentes líquidos. La idea principal de es presentar el concepto de IoT en un proyecto para fomentar el uso de envases rellenables.

## Funcionalidades Principales

- **Selección de detergentes**: Los clientes pueden acceder a la interfaz mediante un navegador web y seleccionar el tipo de detergente líquido que desean dispensar o tambien pueden hacerlo de manera tradicional insertando monedas.

- **Visualización del estado**: La interfaz de administrador muestra el estado actual de la máquina expendedora.

- **Actualización de inventario**: La máquina expendedora registra las compras de detergentes y actualiza automáticamente el inventario para reflejar las cantidades.


## Configuración del Proyecto

1. **ESP32**: Asegúrate de tener los ESP32 correctamente configurado y conectado a la red WiFi haciendo uso del repositorio MachineVendingUC.

2. **Servior Local**: Asegurate de realizar un servidor local accescible para que los archivos HTML, CSS, PHP puedan ser visualizados de manera corrrecta.

3. **Interfaz de Usuario**: Integra el ESP32 y la interfaz de usuario en la máquina expendedora según las especificaciones y requisitos de diseño.

## Instrucciones de Uso

1. Asegúrate de que el ESP32 esté correctamente conectado a la máquina expendedora y la red WiFi.

2. Accede a la interfaz de cliente desde un dispositivo con conexión a Internet. Abre un navegador web y navega hasta la dirección IP asignada al ESP32.

3. En la interfaz de cliente, selecciona el tipo y la cantidad de detergente líquido que deseas dispensar.

4. Haz clic en el botón para iniciar el dispensado de detergentes. El comando será enviado al ESP32 a través de la conexión WiFi.

5. La máquina expendedora dispensará los detergentes seleccionados y actualizará automáticamente el inventario.

## Imagenes
![Image description](/images/Login.png)  
![Image description](/images/admin.png)  
![Image description](/images/user.png)  

## Contacto
Antonio Guadalupe Vazquez Colin.   
Ing En Computacion.   
gvazquez10@uabc.edu.mx.   

---

