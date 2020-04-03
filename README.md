# Mega Wallet
A single page application made in Laravel and Vue.js

This project has been developed by Anukriti Gupta and Pawan Kumar.

The project has the following modules:
- Dashboard - where user can see available balance, gift cards, pending requests, latest transactions, etc.
- Add Money to Wallet - user can directly add money or can use gift cards if available
- Send Money to other users
- My All Transactions - using Footable
- Generate Voucher - **this feature is available for admin**, it generates vouchers with unique keys
- Redeem Voucher - user can redeem vouchers and add money by entering key
- Gift Cards - users can send gift cards of some value to other user
- Redeem Gift Cards - all available gift cards are shown in Add Money Navigation
- Schedule Payment - users can schedule payment and it will be automatically executed on the next day
- Scheduled Transaction List - users can see list of scheduled payments
- Request Loan - users can request money loan from admin
- Pending Requests - users can see the loan requests status in the table 
- Approve Loan - **this feature is available for admin**, admin can approve or deny loan requests by users
- Profile Settings - users can change their name, email or profile picture
- Login
- Registration


The project has following features:
- MVC Framework
- Vue.js for front-end
- Single Page Application (the page doesn't load when navigating between navigation links)
- User Levels (separate modules for admin and users)
- Vue Components
- Laravel Authentication
- AJAX Requests
- Custom APIs used for the communication between Vue Components and Laravel Controllers
- Sweet Alerts used on success or fail of api requests


**Guidelines for using the project**
- All the logics have been defined based on the assumption that there is one admin present. So after migrating tables, assign any user as admin by changing the value of isAdmin column as 1.
- Install Vue
- Install VueRouter
- Install sweetalert2
- Install Image Intervention Package
- To test Schedule Payment module, run "php artisan schedule:run"



**Landing Page**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(77).png)



**Login with validation**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(78).png)



**Registration with validation**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(79).png)



**Dashboard**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(80).png)



**Add money (directly or if gift cards available)**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(81).png)



**Validation in add money**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(82).png)



**Succes sweet alert 2 on adding money**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(83).png)



**Added money using gift cards**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(84).png)



**My Transactions**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(85).png)



**Send Money**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(86).png)



**Generate Voucher (admin)**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(88).png)



**Redeem Voucher**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(87).png)



**Success Redeem**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(89).png)

![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(90).png)



**Send Gift Card (Sent to Pawan Kumar user)**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(91).png)



**Gift Card Received by Pawan Kumar User**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(92).png)



**Schedule Payment**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(96).png)


Run schedule
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(95).png)


Schedule transaction has been processed and removed (March 29, 2020 has been removed)
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(97).png)



**Loan Request**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(98).png)



**Approve Request (loan request received by admin)**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(100).png)



**Loan Request Approved**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(103).png)



**Change profile settings**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(104).png)



**Changed Picture**
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(105).png)
****
![alt text](https://github.com/anukritigupta24/laravel_project-mega_wallet/blob/gh-pages/screenshots/Screenshot%20(106).png)







