<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## About Repository(Projects)

(A) Create a web application using Laravel where a user can submit student mark sheets data & it gets stored in the database via Web forms. The mark sheet will have below fields
1. Student Name
2. Roll No (Must be unique)
3. 5 Different Subjects
4. Subject Scores for 5 Subjects
5. Student Passport size image
6. Class (1 to 12th)

(B) Once the form is submitted it will save all info in the Database, Display students in a data table
where anyone can sort students by their Name, Roll No & by Marks obtained at any subject. 10 students can be displayed in Data Table at a time. The rest of the students should get paginated with server-side pagination.

(C) Create a REST API where the any users can call below endpoint
End Point: Get Students (/getstudents)
Functionality: Will return a list of students ordered by the highest scoring student first combined of all subjects.
Response Should Contain below data
1. Student Name
2. Student Roll No
3. Student Photo link
4. Class
5. Total Score