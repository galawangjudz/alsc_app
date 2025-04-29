# PHP MVC Boilerplate

This is a **PHP MVC (Model-View-Controller)** boilerplate project designed to provide a solid starting point for developing web applications. It includes basic routing, controller handling, and a clean project structure to help you build robust applications faster.

## Project Structure

The project follows the **MVC architecture**, which separates the application logic into three interconnected components: **Model**, **View**, and **Controller**. This structure promotes better code organization, scalability, and maintainability.

```plaintext
project/
├── app/                # Core application files
│   ├── config/         # Contains app config and environment variables
│   ├── controllers/    # Contains all controllers
│   ├── models/         # Contains all models (business logic)
│   ├── views/          # Contains all views (HTML/templates)
│   └── core/           # Core framework components (Router, BaseController, etc.)
│   └── utils/          # Utility functions (dd, image upload, etc.)
├── public/             # Publicly accessible folder (web root)
│   └── assets/         # Static assets (CSS, JS, images, etc.)
├── .htaccess           # Apache configuration for routing
├── index.php           # Entry point of the application
├── tailwind.config.js  # Tailwindcss config
└── README.md           # Project documentation
```

## The logic behind the scenes

When accessing a route for example `http://localhost:8080/routing/pages/home`, the core `App` divide the url's path variables to 2 parts in this case: `pages` and `home`. For the first one it looks in the controllers directory if a controller named `pages_controller` exists (you can change the naming convention to align with your preferences) and if it does it looks for the method `home()` whithin it to. Executing it will render our view in `views` directory.
