# :computer: Tech Stack:
![Heroku](https://img.shields.io/badge/heroku-%23430098.svg?style=for-the-badge&logo=heroku&logoColor=white) ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![JWT](https://img.shields.io/badge/JWT-black?style=for-the-badge&logo=JSON%20web%20tokens) ![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white)
<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></p>

<h2>Relaciones de las tablas:</h2>
<p align="center"><img src="/fotos/schema.png"></p>

<p>En este proyecto se intenta replicar el backend de un e-commerce, donde se va a poder crear productos, listar productos y comprarlos. Del mismo modo se podran borrar, modificar, leer y crear.</p>


Endpoints:

<strong>get('https://ropaon.herokuapp.com/api')</strong>
- Devuelve un string "Bienvenid@ a mi E-commerce."

<h3>Usuarios</h3>

<strong>post('https://ropaon.herokuapp.com/api/register'</strong>
<p align="center"><img src="/fotos/register.png"></p>

<strong>post('https://ropaon.herokuapp.com/api/login'</strong>
<p align="center"><img src="/fotos/login.png"></p>

<strong>get('https://ropaon.herokuapp.com/api/me'</strong>
<p align="center"><img src="/fotos/me.png"></p>

<strong>post('https://ropaon.herokuapp.com/api/logout'</strong>
<p align="center"><img src="/fotos/logout.png"></p>

<strong>put('https://ropaon.herokuapp.com/api/updateduser'</strong>
<p align="center"><img src="/fotos/updated_user.png"></p>

<h3>Super Admin</h3>

<strong>post('https://ropaon.herokuapp.com/api/user/add_admin/{id}</strong>
<p align="center"><img src="/fotos/addAdmin.png"></p>

<strong>post('https://proyecto-discord.herokuapp.com/api/user/delete_admin/{id}'</strong>
<p align="center"><img src="/fotos/removeAdmin.png"></p>

<strong>Route::post('https://proyecto-discord.herokuapp.com/api/user/super_admin/{id}</strong>
<p align="center"><img src="/fotos/addSuperAdmin.png"></p>

<strong>Route::post('https://proyecto-discord.herokuapp.com/api/user/delete_super_admin/{id}</strong>
<p align="center"><img src="/fotos/removeSuperAdmin.png"></p>

<h3>Compras</h3>

<strong>post('https://ropaon.herokuapp.com/api/create/purchase'</strong>
<p align="center"><img src="/fotos/removeSuperAdmin.png"></p>

<strong>get('https://ropaon.herokuapp.com/api/purchasesall'</strong>
<p align="center"><img src="/fotos/removeSuperAdmin.png"></p>

<strong>put('https://ropaon.herokuapp.com/api/updatedpurchase/{id}'</strong>
<p align="center"><img src="/fotos/removeSuperAdmin.png"></p>

<strong>delete('https://ropaon.herokuapp.com/api/deletepurchase/{id}'</strong>
<p align="center"><img src="/fotos/removeSuperAdmin.png"></p>

<strong>get('https://ropaon.herokuapp.com/api/purchasesb'</strong>
<p align="center"><img src="/fotos/removeSuperAdmin.png"></p>

<h3>Canales</h3>

<strong>Route::post('https://proyecto-discord.herokuapp.com/api/create/channel/{id}</strong>
<p align="center"><img src="/fotos/removeSuperAdmin.png"></p>

<strong>Route::get('https://proyecto-discord.herokuapp.com/api/channelall'</strong>
- Hace una busqueda de todos los canales del juego.

<strong>Route::put('https://proyecto-discord.herokuapp.com/api/updatedchannel/{id}</strong>
- Modifica el nombre del canal del juego.

<strong>Route::delete('https://proyecto-discord.herokuapp.com/api/deletechannel/{id}</strong>
- Elimina el canal del juego.

<strong>Route::put('https://proyecto-discord.herokuapp.com/api/loginchannel/{id}'</strong>
- Entras dentro del canal de chat del juego y puedes crear, modificar, leer todos los mensajes que has escrito y eliminarlos.

<strong>Route::put('https://proyecto-discord.herokuapp.com/api/logoutchannel/{id}'</strong>
- Haces logout del canal y no puedes enviar mensajes, ni modificarlos, ni traerte todos los mensajes y tampoco eliminarlos.

<h3>Mensajes</h3>

<strong>Route::post('https://proyecto-discord.herokuapp.com/api/create/message/{id}</strong>
- Crea un mensaje dentro del canal del juego.

<strong>Route::get('https://proyecto-discord.herokuapp.com/api/messagesall',</strong>
- Busca todos los mensajes del canal del juego.

<strong>Route::put('https://proyecto-discord.herokuapp.com/api/updatedmessage/{id}'</strong>
- Modifica el mensaje del canal del juego.

<strong>Route::delete('https://proyecto-discord.herokuapp.com/api/deletemessage/{id}</strong>
- Elimina el mensaje del canal del juego.