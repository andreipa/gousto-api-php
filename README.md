# Gousto API v0.0.1a
## About
Example of RESTful Web Services using [Slim](https://www.slimframework.com/) (a micro framework for PHP).
## Installation
Assuming you already have up and running your web server, please follow the steps below:
* Clone the repo into your WWW folder (localhost)
* Open your browser using the address: http://YOURLOCALHOST/gousto-api-php/install.php

This process will create a local database [SQLite](https://www.sqlite.org/index.html) with some dammy data.
## How to use
### **List all recipes**
----
  Returns json data with all recipes.

* **URL**

  /recipes

* **Method:**

  `GET`
  
*  **URL Params**

   None
   
* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `[{"id": 1,"created_at": "30/06/2015 17:58","updated_at": "30/06/2015 17:58",
        "box_type": "vegetarian","title": "Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad","slug": "sweet-chilli-and-lime-beef-on-a-crunchy-fresh-noodle-salad","short_title": "","marketing_description": "Here weve used onglet steak which is an extra flavoursome cut of beef that should never be cooked past medium rare. So if youre a fan of well done steak, this one may not be for you. However, if you love rare steak and fancy trying a new cut, please be","calories_kcal": 401,"protein_grams": 12,"fat_grams": 35,"carbs_grams": 0,"bulletpoint1": "","bulletpoint2": "","bulletpoint3": "","recipe_diet_type": "meat","season": "all","base": "noodles","protein_source": "beef","preparation_time_minutes": 35,"shelf_life_days": 4,"equipment_needed": "Appetite","origin_country": "Great Britain","recipe_cuisine": "asian","in_your_box": "","gousto_reference": 59,"rate": 0}]`
 
* **Sample Call:**

  ```http://YOURLOCALHOST/gousto-api-php/recipes```
  
### **Show recipe**
----
  Returns json data about a single recipe.

* **URL**

  /recipes/:id

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   `id=[integer]`
  
* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `[{"id": 1,"created_at": "30/06/2015 17:58","updated_at": "30/06/2015 17:58",
        "box_type": "vegetarian","title": "Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad","slug": "sweet-chilli-and-lime-beef-on-a-crunchy-fresh-noodle-salad","short_title": "","marketing_description": "Here weve used onglet steak which is an extra flavoursome cut of beef that should never be cooked past medium rare. So if youre a fan of well done steak, this one may not be for you. However, if you love rare steak and fancy trying a new cut, please be","calories_kcal": 401,"protein_grams": 12,"fat_grams": 35,"carbs_grams": 0,"bulletpoint1": "","bulletpoint2": "","bulletpoint3": "","recipe_diet_type": "meat","season": "all","base": "noodles","protein_source": "beef","preparation_time_minutes": 35,"shelf_life_days": 4,"equipment_needed": "Appetite","origin_country": "Great Britain","recipe_cuisine": "asian","in_your_box": "","gousto_reference": 59,"rate": 0}]`
 
* **Sample Call:**

  ```http://YOURLOCALHOST/gousto-api-php/recipes/1```
  
### **List recipes for specific cuisine**
----
  Returns json data with all recipes filtered by cuisine.

* **URL**

  /recipes/cuisine/:cuisine

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   `cuisine=[string]`
   
   **Optional:** (For pagination)
   
   `?page=[integer]&limit=[integer]`
  
* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `[{"id": 7,
        "created_at": "30/06/2015 17:58",
        "updated_at": "30/06/2015 17:58",
        "box_type": "vegetarian",
        "title": "Courgette Pasta Rags",
        "slug": "courgette-pasta-rags",
        "short_title": "",
        "marketing_description": "Kick-start the new year with some get-up and go with this lean green vitality machine. Protein-packed chicken and mineral-rich kale are blended into a smooth, nut-free version of pesto; creating the ultimate composition of nutrition and taste",
        "calories_kcal": 524,
        "protein_grams": 12,
        "fat_grams": 22,
        "carbs_grams": 0,
        "bulletpoint1": "",
        "bulletpoint2": "",
        "bulletpoint3": "",
        "recipe_diet_type": "meat",
        "season": "all",
        "base": "",
        "protein_source": "chicken",
        "preparation_time_minutes": 40,
        "shelf_life_days": 4,
        "equipment_needed": "Appetite",
        "origin_country": "Great Britain",
        "recipe_cuisine": "british",
        "in_your_box": "",
        "gousto_reference": 59,
        "rate": 0}]`
 
* **Sample Call:**

  ```http://YOURLOCALHOST/gousto-api-php/recipes/cuisine/british?page=1&limit=5```
  
### **Rate an existing recipe between 1 and 5**
----
* **URL**

  /recipes/:id/rate

* **Method:**

  `PUT`
  
*  **URL Params**
    
    **Required:**
 
   `id=[integer]`
  
* **Data Params**

    **Required**

    `rate=[integer]`

* **Success Response:**

  * **Code:** 200 <br />
     
* **Sample Call:**

  ```http://YOURLOCALHOST/gousto-api-php/recipes/1/rate```
  
### **Update recipe**
----
* **URL**

  /recipes/:id

* **Method:**

  `PUT`
  
*  **URL Params**
    
    **Required:**
 
   `id=[integer]`
  
* **Data Params**

    **Required**

    `box_type=[string],
     title=[string],
     slug=[string],
     short_title=[string],
     marketing_description=[string],
     calories_kcal=[integer],
     protein_grams=[integer],
     fat_grams=[integer],
     carbs_grams=[integer],
     bulletpoint1=[string],
     bulletpoint2=[string],
     bulletpoint3=[string],
     recipe_diet_type=[string],
     season=[string],
     base=[string],
     protein_source=[string],
     preparation_time_minutes=[integer],
     shelf_life_days=[integer],
     equipment_needed=[string],
     origin_country=[string],
     recipe_cuisine=[string],
     in_your_box=[string],
     gousto_referenc=[integer]`

* **Success Response:**

  * **Code:** 200 <br />
     
* **Sample Call:**

  ```http://YOURLOCALHOST/gousto-api-php/recipes/1```
  
### **Add new recipe**
----
* **URL**

  /recipes

* **Method:**

  `POST`
  
*  **URL Params**
    
    None
  
* **Data Params**

    **Required**

    `box_type=[string],
     title=[string],
     slug=[string],
     short_title=[string],
     marketing_description=[string],
     calories_kcal=[integer],
     protein_grams=[integer],
     fat_grams=[integer],
     carbs_grams=[integer],
     bulletpoint1=[string],
     bulletpoint2=[string],
     bulletpoint3=[string],
     recipe_diet_type=[string],
     season=[string],
     base=[string],
     protein_source=[string],
     preparation_time_minutes=[integer],
     shelf_life_days=[integer],
     equipment_needed=[string],
     origin_country=[string],
     recipe_cuisine=[string],
     in_your_box=[string],
     gousto_referenc=[integer]`

* **Success Response:**

  * **Code:** 200 <br />
     
* **Sample Call:**

  ```http://YOURLOCALHOST/gousto-api-php/recipes```
  
## Note
I have chosen this framework because is very light and fast for the proposed task. Nodejs will be a great alternative as well.
The API consume the information globally without any restriction but its also possible to create alternative routes for front-end or mobile app.

## TO-DO
Validation data to avoid SQLInjection, error messages, classes to manage better data handle, etc.
