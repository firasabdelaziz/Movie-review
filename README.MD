## Movie Review API :movie_camera:

This repository contains the source code for the Movie Review API, which allows users to manage movie information through CRUD (Create, Read, Update, Delete) operations. The API is built using the Laravel framework and follows the Repository Design Pattern to separate data access logic from the controller.

## Design Pattern: Repository Pattern :gear:

The Movie Review API utilizes the Repository Design Pattern to manage data access and abstraction. The pattern provides a clear separation of concerns by abstracting data retrieval and manipulation from the controller logic. The repository classes encapsulate database interactions, promoting code reusability and maintainability. This design choice ensures that the API is scalable and can handle increasing data volumes without sacrificing performance.

## API Endpoints :rocket:

The following API endpoints are available:

- `GET /api/movies`: Retrieve a paginated list of movies. By default, 10 movies are loaded per page, but you can specify the number of movies per page using the `perPage` query parameter.
- `POST /api/movies`: Add a new movie to the database. The request body should contain the movie details in JSON format. Validation is performed to ensure the data is valid before creating the movie.
- `GET /api/movies/{id}`: Retrieve details for a specific movie by providing its ID.
- `PUT /api/movies/{id}`: Update a movie's information by providing its ID and the updated details in the request body. Validation is performed to ensure the data is valid before updating the movie.
- `DELETE /api/movies/{id}`: Delete a movie by providing its ID.

## Request Validation :heavy_check_mark:

The API implements request validation using Laravel's built-in validation features. For each API endpoint that requires user input, the corresponding validation rules are defined to ensure that the data provided is valid. If a request fails validation, the API returns a JSON response with error messages and an HTTP status code of 400 (Bad Request). Proper request validation ensures data integrity and contributes to the API's scalability by preventing incorrect or invalid data from being stored.

## Error Handling :warning:

The API includes custom exception handling to gracefully handle errors. When an unexpected error occurs, the API responds with an appropriate error message in JSON format, along with the corresponding HTTP status code. The messages are language-specific and can be translated based on the user's preferred language provided in the `Accept-Language` header. Robust error handling enhances the API's scalability by providing meaningful error responses and facilitating easier debugging and issue resolution.

## Language Support :globe_with_meridians:

The Movie Review API supports internationalization (i18n) to provide responses in multiple languages. It automatically detects the user's preferred language from the `Accept-Language` header and returns responses in the corresponding language, if available. The language files for English and French are provided in the `resources/lang` folder. Language support allows the API to be more accessible and scalable to a diverse user base.

## Enhancing Logging and Log Viewer Integration :bar_chart:

The Movie Review API uses Laravel's built-in logging capabilities to facilitate easier debugging and monitoring of the application. Laravel provides robust logging features that allow developers to record application activities, errors, and other important events.

By using logging, the API can keep track of various events, such as:

- :heavy_exclamation_mark: **Error Logging:** Whenever an unexpected error occurs, the API can log details about the error, including the stack trace, error message, and relevant context information. This helps developers quickly identify and resolve issues.

- :information_source: **Information Logging:** Important information, such as successful API requests, data changes, or user activities, can be logged to provide insights into the application's behavior.

- :bug: **Debug Logging:** For developers, the API can include debug logs that capture specific variables, states, or other information to help diagnose and fix problems during development and testing.


**Log Viewer Integration:** The API integrates a log viewer package to enhance debugging and monitoring. The log viewer provides visualizations and analytics, making it easier to understand application activities and trends.

## Unit Tests :white_check_mark:

To ensure code quality and reliability, the Movie Review API includes unit tests. Unit tests are written to validate the functionality of different components and ensure that they behave as expected. By having a comprehensive test suite, the API can be confidently refactored or modified without introducing unintended bugs.

The API utilizes popular testing frameworks like PHPUnit for PHP to create and run the unit tests. These tests can be executed automatically during development, continuous integration, or before deploying to production, ensuring that the API functions correctly under various scenarios.

## GitHub Actions Pipeline for Unit Tests :🕵️:

A GitHub Actions pipeline has been set up to automatically run unit tests whenever a commit is made to the main branch. This ensures that changes to the codebase are tested for functionality and reliability.

## Getting Started :rocket:

To set up the Movie Review API locally, follow these steps:

1. Clone the repository: `git clone https://github.com/firasabdelaziz/Movie-review.git`
2. Install dependencies: `composer install`
3. Navigate to the repo directory `cd Movie-review`
3. Navigate to the project directory `cd movieFrontend`
4. Create a `.env` file: `cp .env.example .env`
5. Generate an application key: `php artisan key:generate`
6. Set up your database credentials in the `.env` file.
7. Run database migrations: `php artisan migrate`
8. Seed initial data (optional): `php artisan db:seed`
8. Run unit tests: `composer test`


Once the setup is complete, you can start the local development server: `php artisan serve` :computer:

## Highlight API :star:

In this updated README, we've specified that the design pattern, request validation, error handling, and language support are all geared towards ensuring scalability of the API. We've explained how each aspect contributes to making the API more scalable and capable of handling increased data and user loads effectively.

---

# Angular Movie Review App :clapper:

This project is an Angular-based  Movie Review application that allows users to browse, search, and review movies. The app follows the MVC (Model-View-Controller) pattern for better code organization and maintainability. It also utilizes Tailwind CSS for styling and communicates with a Laravel-based backend to handle movie data.

## Features :sparkles:

- Display a list of movies with details such as title, description, writer, image, and date.
- View individual movie details.
- Filter movies by publication date and opening date.

## Prerequisites :clipboard:

To run this application, you need the following installed on your machine:

1. Node.js (with npm) :heavy_plus_sign:
2. Angular CLI :heavy_plus_sign:
3. Backend server (Laravel-based API) with CORS enabled :heavy_plus_sign:

## Getting Started :rocket:

1. Clone the repository:

```
git clone https://github.com/firasabdelaziz/Movie-review.git`
```

2. Navigate to the project directory:

```
cd Movie-review
```

```
cd movieFrontend
```

3. Install dependencies:

```
npm install
```

4. Start the Angular development server:

```
ng serve
```

5. Open your browser and navigate to `http://localhost:4200` to see the app in action. :globe_with_meridians:

## MVC Design Pattern :gear:

The Angular Movie Review App is structured following the MVC (Model-View-Controller) design pattern. This pattern allows clear separation of data, presentation, and user interaction components, making the codebase more maintainable and scalable.

## Configuration :wrench:

Before running the application, make sure to configure the backend API URL in the `MovieService` located at `src/app/services/movie.service.ts`. Replace `http://localhost/api/movies` with the actual URL of your Laravel backend API.

## Project Structure :file_folder:

```
movieFrontend/
|-- src/
|   |-- app/
|   |   |-- components/
|   |   |   |-- movie-details/
|   |   |   |   |-- movie-details.component.ts
|   |   |   |   |-- movie-details.component.html
|   |   |   |-- movie-item/
|   |   |   |   |-- movie-item.component.ts
|   |   |   |   |-- movie-item.component.html
|   |   |   |-- movie-list/
|   |   |   |   |-- movie-list.component.ts
|   |   |   |   |-- movie-list.component.html
|   |   |-- models/
|   |   |   |-- movie.model.ts
|   |   |-- services/
|   |   |   |-- movie.service.ts
|   |   |-- environments/
|   |   |   |-- environment.prod.ts
|   |   |   |-- environment.ts
|   |   |-- app-routing.module.ts
|   |   |-- app.component.ts
|   |   |-- app.component.html
|   |   |-- app.component.css
|   |   |-- app.module.ts

|   |-- assets/
|   |-- index.html
|   |-- styles.scss
|-- .angular.json
|-- package.json
|-- tsconfig.json
|-- ...
```

## Contributing :raised_hands:

Contributions to the project are welcome! If you find any bugs, have suggestions for improvements, or want to add new features, please open an issue or submit a pull request.

## License :scroll:

This project is licensed under the MIT License - see the `LICENSE` file for details.

## Acknowledgments :pray:

Thank you to all the contributors who made this project possible!

Happy coding! :smiley:
