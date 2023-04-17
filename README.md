# Section 1: Advanced Knowledge
 ### Explain the difference between service providers and facades in Laravel.
    The facades in laravel have many usage cases , but most of all it useds 
    to changed long names to short and uses like proxies for our classes in
    service container.
    In service providers pattern we bind some interface for some class ,
    and it helped laravel to know what abstraction uses for our classes
 ### What is the purpose of Laravel’s event system, and how does it work?
    The events system in laravel have many purpose and cases to use, it related
    for task that you need to do , like : send mails ,check changed value(like 
    count of orders),online chats ,etc .The main logic work events is : 
    we dispatch events on some action(maybe some values changed) , and than we
    have some class listener for this event where we can manipulate with data.
    In real project my last experience with event it some online notification 
    counter , where I use events and broadcasts
 ### What is a trait in Laravel, and how would you use it? Do you have an example
    As we know , PHP don't have multiple inheritance , and trait it some 
    mechanism that help us to get around it. In laravel from under the
    box we have many traits(like example HasApiTokens,SoftDeletes,etc),in real
    projects we use it many times. Of course I used traits writing by my self.
    In this project you can find my trait(app/Traits/ApiResponse.php) with API 
    response (codes and statuses) that I used in real projects
 ### What are some common performance issues that can arise in a Laravel application, and how can they be addressed?
    The most problem with performance that I get:
    1)Not normalized database
    2)Not optimized query to database
    3)Not used best laravel practice and futures(like example , model observers
      work much faster than this logic in controllers)
    So, how we can fix it :
    1)We need to set right realtion , primary keys,redundancy,errors,etc
    2)If we have this bug we need to optimized query like added joins , check
      for right query count( I mean not use redundancy query ) , etc
    3)For this case we need to check code , and try to optimize it
 ### What is dependency injection in Laravel, and how does it help with testing?    
     Depency injection  is mechanizm where we put class into constructor of 
     another class (you can see it in this project in 
     app/Http/Controllers/TestController.php).   
     In testing , depency injection help us fast resolved classes
# Section 2: Identification
 ### Identify the file where you would define a new service provider in Laravel.
    I identify new service provider in config/app.php file in array providers
 ### Identify the file where you would define a new event listener in Laravel.
    New event listeners is define in file Providers/EventServiceProvider.php
 ### Identify the file where you would define a new trait in Laravel.
    Laravel don't have file to define the traits. You can define the trait in
    class where you need to use it ( see example in app/Http/TestController.php)
# Section 3: Problem-Solving
 ### You need to integrate a third-party API into your Laravel application. What steps would you take?
     I will start with read documentation about this api , check what this api
    related with,then check for some packages with this api for laravel.
    Here 2 ways  :
    -first , if package exists , I will try to compare php version my and package ,
        and implement it to my project
    -second, if no , I will create some service(Like with CURL/HTTP or other
        services to connect to API)
    Of course , when I develop it , I will try to handel errors /etc
 ### You are experiencing high traffic to your Laravel application, and the server is struggling to handle the load. What steps can you take to improve performance?
     Every hosting has diferent tariff plans ,so the first and simple way it buy 
     more productive tariff of our hosting :) If speakin seriously we can rent
     virtual server like VPS . 
     If we speak about big database , so here many approaches , like
     replication/sharding/etc it related for situation
 ### Your application is not scaling well, and you are running into issues with database connections. What are some possible solutions to this problem?
     As I say before it  replication and sharding(horizontal and vertical)

# Section 4: Practical Skills
    In practical tasks I use API's . Of course is needed it not a problem to change 
    it for web routes , but for my oppinion API can fast show logic without some
    user interface (All classes called with 'Test' , of course in real project the
    name spacing will be differents , it only for demonstration)
 ### Write a custom validation rule for a form in Laravel, if it fails return back with error messages  
     File-app/Http/Request/TestRequest.php
     The Company models not created , but for the laravel practice if model called
     Company it means that table call `companies` , so request is work with this 
     table
 ### Create a new middleware that restricts access to certain routes in your Laravel application based on
     File-app/Http/Middleware/TestMiddleware.php
     In this task I compare 2 condition in 1 middleware ( of course it can 
     be different , all related to the main logic) , and  define middleware in 
     routeMiddleware in Kernel.php file . 
     I added helper (app/Helpers/IPHelper.php) and define method blocked , thats 
     in future can give as blocked IP array . But of course that all is related 
     of situations ( we can take blocked IP from database and don't need helpers/etc)
     Then I added method to User model called isAdmin , to check is user role== Admin,
     but here too all related to situation ( we can take array of roles , give permissions 
     to sanctum auth , etc) ,so main idea it all can be changed related to full logic and 
     architecture of project
 ###  Implement a queue system in your Laravel application to handle background tasks. Explain your approach
     File-app/Jobs/TestEmailJob.php
     For this task I use queue for reall example - send mails . I define service for 
     send mails( it very simple and contains only one method :) but in reall project this
     service will be another, it only demonstration how I will build architecture ). Then I
     use Laravel mails to send emails .
     Don't forgot to change in env file variable QUEUE_CONNECTION from sync to database.
     In .env.example in repo it allready exists :)
