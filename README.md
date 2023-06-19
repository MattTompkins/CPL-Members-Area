# Members Area - Colwick Park Lifeguards

## About the project

Colwick Park Lifeguards are a provider of voluntary Water Safety & Rescue services at open water events and are proudly affiliated to the Royal Life Saving Society. This project is intended to be a members management portal, whereby members manage training, events, calendars, meetings and other key aspects to operations.

## Application framework and packages

The core of this project is built using Laravel - a php web application framework with expressive, elegant syntax. The front-end makes use of Laravel's blade templating enigine - paired with TailwindCSS. The project makes heavy use of Livewire for Laravel, allowing development of dynamic components in PHP, without the use of Javascript.

A list of included resources can be found below:

- [Laravel](https://laravel.com/docs/)
- [Laravel Livewire](https://laravel-livewire.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Flowbite tailwind library](https://flowbite.com/)
- [Spatie Laravel-permission](https://spatie.be/docs/laravel-permission/v5/introduction)
- [CK Editor 5](https://ckeditor.com/ckeditor-5/)
- [SweetAlert](https://sweetalert2.github.io/)
  
## Installation
1. Ensure you have composer and NPM (Node.js) installed
2. Clone the directory, or download the zip to your desired environment
3. From the terminal run ```composer install``` command within the application directory
4. Then run the ```npm install``` command
5. Publish the vendor files with ```php artisan vendor:publish```
6. Using the .env.example file, create a .env file in the root with the project URL, database settings and other options
7. Setup the database tables with ```php artisan migrate```
8. Seed the database with ```php artisan db:seed```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). This software extends this license.
