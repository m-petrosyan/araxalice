<div align="center">
  <img src="https://files.catbox.moe/mhfce3.jpg" alt="arax logo">
</div>

# Arax Sargsyan - Illustrator and Designer Portfolio

Arax Sargsyan's personal website serves as a portfolio,
The website provides various features that allow user to interact with the content, managing categories, uploading photos with comments, and associating them with specific categories. Additionally, the website automatically resizes images larger than 1920px.
User can also add personal information and modify login settings within their account.
User have the option to add personal information to their portfolio page.

### Postman documentation

[view](https://documenter.getpostman.com/view/12599375/2s93z5AQPz)

# installation

> Laravel

```
.env.example -> .env
php artisan key:generate
composer install
php artisan migrate --seed
php artisan passport:install
php artisan storage:link 
php artisan serve
```

> Vue

```
npm install
.env.example -> .env
.env  VUE_APP_CLIENT_ID => passport Client ID , VUE_APP_CLIENT_SECRET => passport Client secret, VUE_APP_URL => Be url, VUE_APP_API => Be api url
npm run dev 
```
