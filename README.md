# Bus-Booking System

# OverView
The bus booking system is a fleet management system designed to manage the booking of bus trips between cities in Egypt. 
The system allows users to book seats on buses that travel between cities and stop at predefined intermediate stations. 
Each bus has 12 available seats that users can book.

# Features
The following features are included in the bus booking system:

Predefined trips between 2 stations that cross over in-between stations.
Buses for each trip, each with 12 available seats to be booked by users, and each seat having a unique ID.
* Users can book an available seat on a trip.
* Users can get a list of available seats to be booked for their trip by sending start and end stations.

1. Create Models (Trip,Bus,User,Station,TripStation) with suitable relations.
2. Create data seeders for all necessary data for test.
3. Build authentication System with laravel sanctum package (token based).
4. Apply validation with all requests.
5. Apply error handling mechanism for every action.
6. Apply SOLID principle for better clean architecture.
7. Use services as design architecture for under the hood operation. 
8. Use phpunit testing to test all added feature.

# Architecture
The bus booking system is designed as a Laravel web application with a Relational-Database backend. 
The system includes two APIs for any consumer, such as a web app or mobile app.

# APIs
The following APIs are available in the bus booking system:

 1. Book Seat API
```
This API allows users to book an available seat on a trip. 
The API checks if there is an available seat on the requested trip and if so, reserves the seat for the user.
```

2. List Available Seats API
```
This API allows users to get a list of available seats to be booked for their trip by sending start and end stations. 
The API searches the database for all available seats on trips that start from the specified start station and end at the specified end station. 
If there are available seats, the API returns a list of seats with their respective trip IDs and seat IDs.
```
 
## Run the project

1. Clone repository

    ```
        1.1- git clone https://github.com/mostafa-medht/bus-booking-system.git
        1.2- cd project-directory
        1.3- composer install
        1.4- cp .env.example .env
        1.5- php artisan key:generate
    ```

   1. Database
      2.1 Create database in DBMS via this query

       ```sql - mysql
           create database `bus-booking-system`;
       ```

      2.3 Database Configuration in .env file in application root

       ```
           DB_DATABASE=bus-booking-system
           DB_USERNAME=username
           DB_PASSWORD=password
           Put your database user after DB_USERNAME, and your user password after DB_PASSWORD
       ```

      2.4 Migrate & seed

       ```
           php artisan migrate
           php artisan db:seed

           or

           php artisan migrate --seed
       ```

      2.5 Run the project

       ```
           php artisan serve
       ```

      2.6 UserName & Password for authentication

       ```
           email: mosatfamedht@gmail.com
           password : 12345678
       ```
---

## Contributing

-   [Mostafa Medhat](https://github.com/mostafa-medht)

## When contributing to this repository, please first discuss the change you wish to make via issue.

## Contributing Guidelines

1. **Create** a new issue discussing what changes you are going to make.
2. **Fork** the repository to your own Github account.
3. **Clone** the project to your own machine.
4. **Create** a branch locally with a succinct but descriptive name.
5. **Commit** Changes to the branch.
6. **Push** changes to your fork.
7. **Open** a Pull Request in

---

## License

Bus Booking project Copyright © 2022 Mostafa Medht.
