<?php

require_once('inc/inc.db.php');

if(file_exists('db/gousto.db')){
    unlink('db/gousto.db');
    sleep(3);
}

$db = new DB();

//Main table
$sql[] = 'CREATE TABLE IF NOT EXISTS "recipe" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "created_at" DATETIME,
    "updated_at" DATETIME,
    "box_type" VARCHAR,
    "title" VARCHAR,
    "slug" VARCHAR,
    "short_title" VARCHAR,
    "marketing_description" VARCHAR,
    "calories_kcal" REAL,
    "protein_grams" REAL,
    "fat_grams" REAL,
    "carbs_grams" REAL,
    "bulletpoint1" VARCHAR,
    "bulletpoint2" VARCHAR,
    "bulletpoint3" VARCHAR,
    "recipe_diet_type" VARCHAR,
    "season" VARCHAR,
    "base" VARCHAR,
    "protein_source" VARCHAR,
    "preparation_time_minutes" REAL,
    "shelf_life_days" INT,
    "equipment_needed" VARCHAR,
    "origin_country" VARCHAR,
    "recipe_cuisine" VARCHAR,
    "in_your_box" VARCHAR,
    "gousto_reference" INT,
    "rate" INT
)';

//Create tables
for($i=0;$i<count($sql);$i++){
    $db->createTable($sql[$i]);
}

//List with all recipes
$dataValue[] = "1, '30/06/2015 17:58', '30/06/2015 17:58','vegetarian','Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad','sweet-chilli-and-lime-beef-on-a-crunchy-fresh-noodle-salad','','Here weve used onglet steak which is an extra flavoursome cut of beef that should never be cooked past medium rare. So if youre a fan of well done steak, this one may not be for you. However, if you love rare steak and fancy trying a new cut, please be',401,12,35,0,'','','','meat','all','noodles','beef',35,4,'Appetite','Great Britain','asian','',59,0";
$dataValue[] = "2, '30/06/2015 17:58', '30/06/2015 17:58','gourmet','Tamil Nadu Prawn Masala','tamil-nadu-prawn-masala','','Tamil Nadu is a state on the eastern coast of the southern tip of India. Curry from there is particularly famous and its easy to see why. This one is brimming with exciting contrasting tastes from ingredients like chilli powder, coriander and fennel seed',524,12,22,0,'Vibrant & Fresh','Warming, not spicy','Curry From Scratch','fish','all','pasta','seafood',40,4,'Appetite','Great Britain','italian','king prawns, basmati rice, onion, tomatoes, garlic, ginger, ground tumeric, red chilli powder, ground cumin, fresh coriander, curry leaves, fennel seeds',58,0";
$dataValue[] = "3, '30/06/2015 17:58', '30/06/2015 17:58','vegetarian','Umbrian Wild Boar Salami Ragu with Linguine','umbrian-wild-boar-salami-ragu-with-linguine','','This delicious pasta dish comes from the Italian region of Umbria. It has a smoky and intense wild boar flavour which combines the earthy garlic, leek and onion flavours, while the chilli flakes add a nice deep aroma. Enjoy within 5-6 days of delivery.',609,17,29,0,'','','','meat','all','pasta','pork',35,4,'Appetite','Great Britain','british','',1,0";
$dataValue[] = "4, '30/06/2015 17:58', '30/06/2015 17:58','gourmet','Tenderstem and Portobello Mushrooms with Corn Polenta','tenderstem-and-portobello-mushrooms-with-corn-polenta','','One for those who like their veggies with a slightly spicy kick. However, those short on time, be warned this is a time-consuming dish, but if youre willing to spend a few extra minutes in the kitchen, the fresh corn mash is extraordinary and worth a t',508,28,20,0,'','','','vegetarian','all','','cheese',50,4,'None','Great Britain','british','',56,0";
$dataValue[] = "5, '30/06/2015 17:58', '30/06/2015 17:58','vegetarian','Fennel Crusted Pork with Italian Butter Beans','fennel-crusted-pork-with-italian-butter-beans','','A classic roast with a twist. The pork loin is marinated in rosemary, fennel seeds and chilli flakes then teamed with baked potato wedges and butter beans in tomato sauce. Enjoy within 5-6 days of delivery.',511,11,62,0,'A roast with a twist','Low fat & high protein','With roast potatoes','meat','all','beans/lentils','pork',45,4,'Pestle & Mortar (optional)','Great Britain','british','pork tenderloin, potatoes, butter beans, garlic, fennel seeds, medium onion, chilli flakes, fresh rosemary, tomatoes, vegetable stock cube',55,0";
$dataValue[] = "6, '30/06/2015 17:58', '30/06/2015 17:58','gourmet','Pork Chilli','pork-chilli','','Succulent pork tenderloin and feathery white bean and parsnip mash mingle with feisty cumin seeds and tangy leek in this lighter, less conventional take on a British classic. Welcome to the outer limits of food!',401,12,35,0,'','','','meat','all','','pork',35,4,'Appetite','Great Britain','asian','',60,0";
$dataValue[] = "7, '30/06/2015 17:58', '30/06/2015 17:58','vegetarian','Courgette Pasta Rags','courgette-pasta-rags','','Kick-start the new year with some get-up and go with this lean green vitality machine. Protein-packed chicken and mineral-rich kale are blended into a smooth, nut-free version of pesto; creating the ultimate composition of nutrition and taste',524,12,22,0,'','','','meat','all','','chicken',40,4,'Appetite','Great Britain','british','',59,0";
$dataValue[] = "8, '30/06/2015 17:58', '30/06/2015 17:58','vegetarian','Homemade Eggs & Beans','homemade-egg-beans','','A Goustofied British institution, learn how to make beautifully golden breaded chicken escalopes drizzled in homemade garlic butter and served atop fluffy potato and broccoli mash.',609,17,29,0,'','','','meat','all','','eggs',35,4,'Appetite','Great Britain','italian','',2,0";
$dataValue[] = "9, '30/06/2015 17:58', '30/06/2015 17:58','gourmet','Grilled Jerusalem Fish','grilled-jerusalem-fish','','I love this super healthy fish dish, it contains a punch from zingy ginger, a kick from chili and a salty sweet balance from soy sauce and mirim. A cleansing and restorative meal, great for body and soul.',508,28,20,0,'','','','meat','all','','fish',50,4,'Appetite','Great Britain','mediterranean','',57,0";
$dataValue[] = "10, '30/06/2015 17:58', '30/06/2015 17:58','gourmet','Pork Katsu Curry','pork-katsu-curry','','Comprising all the best bits of the classic American number and none of the mayo, this is a warm & tasty chicken and bulgur salad with just a hint of Scandi influence. A beautifully summery medley of flavours and textures',511,11,62,0,'','','','meat','all','','pork',45,4,'Appetite','Great Britain','mexican','',56,0";

//Insert recipe
for($i=0;$i<count($dataValue);$i++){
    $sql = 'INSERT INTO "recipe" (
        "id",
        "created_at",
        "updated_at",
        "box_type",
        "title",
        "slug",
        "short_title",
        "marketing_description",
        "calories_kcal",
        "protein_grams",
        "fat_grams",
        "carbs_grams",
        "bulletpoint1",
        "bulletpoint2",
        "bulletpoint3",
        "recipe_diet_type",
        "season",
        "base",
        "protein_source",
        "preparation_time_minutes",
        "shelf_life_days",
        "equipment_needed",
        "origin_country",
        "recipe_cuisine",
        "in_your_box",
        "gousto_reference",
        "rate")
        VALUES ('.$dataValue[$i].')';
    $db->insert($sql);
}

echo "Database created successfully";

?>