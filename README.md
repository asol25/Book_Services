# Project: Book_Store

Developed an start to end Ecommerce web Application using PHP MVC with multiple modules.
    
# Introduction:

We are all living in a world where technological revolutions occur almost every day. In real life Customers can buy books from the book store online without going to the store at official.

There will Customers and Books. Customers want to be able to buy books from the book store and payment online with the a lot visa card or napas card.

# Users Requirements:

1. User Registration.

2. User Change Passwords.

3. CRUD Operations like.
    - Show all in or some products.
    - User can add products to his card.
    - User can look information about a product when looking details product.
    - User can put feedback for products.
    - User can delete feedback for products.
    - User can modify feedback for products.
    - Admin can add product to the products list.
    - Admin can modify product details.
    - Admin can delete product to products list.

4. UI must responsive and easy looking on mobile || tablet || desktop.

5. Payment by a lot system banking popular at VietNam as TPBANK || Viettinbank...

6. Can upload pictures to websites.

7. Card products must still containers products when shutdown computer or out to website.

# PHP Security:
    - User can login the website.
    - User can logout if user want to do that.
    - User have reset account if user forget password or lose password.
    - The entire website site will change according to the role. Whether the clients User or Admin.

# PHP WebFlow:
    - After adding products to the card. The users can checkout using PHP WebFlow.
    - Confirming Information of User Details.
    - Confirming Shipping and Billing Address.
    - Receipt.
    - If the User cancel the WebFlow. He will go to cancel Page.
    - If the User submits the checkout. He will go to check page information about Payment. If the Payment is successful, he will continue to go to thank you page. Opposite will show error in the process page.

# Tools and Technologies:
    - Technology: PHP, HTML, CSS, JavaScript.
    - Application Server: Heroku.
    - Database: MySQL Database.

# Structure: 

This project was using the MVC to designed and maintain. There are four main layer:
```
- Views
- Controllers
- Models
- Services
```
# Views:

Views are where the UI (User interface) render to the User looking and using the Application. User not need know any layer other as Controllers || Models...

# Controllers:

Controllers also interact with somethings atom of the Application especially as Models and Services. Controllers are where the switch action of User and control all in information when User send request. 

# Models:

Models are where access to database and query. Models work on with CURD (GET, ADD, MODIFY, DELETE) in Application.

# Services:

Services interact with the third-party to implement interfaces to third Services given.

# How to Run:
Access https://config-cluster.herokuapp.com/

