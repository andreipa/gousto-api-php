<?php

$app->get('/recipes',function(){
    $dbInstance = new DB();
    $sql = "SELECT * FROM recipe";
    $data = $dbInstance->select($sql);
    if(isset($data)){
        header('Content-Type: application/json');
        echo json_encode($data);
    }
});

$app->get('/recipes/{id}',function($request){
    $dbInstance = new DB();
    $id = $request->getAttribute('id');
    $sql = "SELECT * FROM recipe WHERE id = ".$id;
    $data = $dbInstance->select($sql);
    if(isset($data)){
        header('Content-Type: application/json');
        echo json_encode($data);
    }
});

$app->get('/recipes/cuisine/{cuisine}',function($request){
    $dbInstance = new DB();
    $cuisine = $request->getAttribute('cuisine');
    if(isset($_GET['limit'])){
        $limit = $_GET['limit'];
    }else{
        $limit = 5;
    }
    if(isset($_GET['page']) && $_GET['page'] > 0){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $sql = "SELECT * FROM recipe WHERE recipe_cuisine = '".$cuisine."'";
    $data = $dbInstance->select($sql);
    if(is_array($data)){
        $total = count($data);
    }else{
        $total = 0;
    }
    $totalPages = ceil($total / $limit);
    $offSet = ($page - 1) * $limit;
    $sql = "SELECT * FROM recipe WHERE recipe_cuisine = '".$cuisine."' LIMIT ".$offSet." , ".$limit;
    $data = $dbInstance->select($sql);
    if(isset($data)){
        header('Content-Type: application/json');
        echo json_encode($data);
    }
});

$app->post('/recipes',function($request){
    $dbInstance = new DB();
    $parsedBody = $request->getParsedBody();
    $box_type = $parsedBody['box_type'] ?? '';
    $title = $parsedBody['title'] ?? '';
    $slug = $parsedBody['slug'] ?? '';
    $short_title = $parsedBody['short_title'] ?? '';
    $marketing_description = $parsedBody['marketing_description'] ?? '';
    $calories_kcal = $parsedBody['calories_kcal'] ?? 0;
    $protein_grams = $parsedBody['protein_grams'] ?? 0;
    $fat_grams = $parsedBody['fat_grams'] ?? 0;
    $carbs_grams = $parsedBody['carbs_grams'] ?? 0;
    $bulletpoint1 = $parsedBody['bulletpoint1'] ?? '';
    $bulletpoint2 = $parsedBody['bulletpoint2'] ?? '';
    $bulletpoint3 = $parsedBody['bulletpoint3'] ?? '';
    $recipe_diet_type = $parsedBody['recipe_diet_type'] ?? '';
    $season = $parsedBody['season'] ?? '';
    $base = $parsedBody['base'] ?? '';
    $protein_source = $parsedBody['protein_source'] ?? '';
    $preparation_time_minutes = $parsedBody['preparation_time_minutes'] ?? 0;
    $shelf_life_days = $parsedBody['shelf_life_days'] ?? 0;
    $equipment_needed = $parsedBody['equipment_needed'] ?? '';
    $origin_country = $parsedBody['origin_country'] ?? '';
    $recipe_cuisine = $parsedBody['recipe_cuisine'] ?? '';
    $in_your_box = $parsedBody['in_your_box'] ?? '';
    $gousto_reference = $parsedBody['gousto_reference'] ?? '';
    $rate = 0;
    $created_at = date('d/m/Y H:i');
    $updated_at = date('d/m/Y H:i');
    $sql = "INSERT INTO recipe(
        created_at,
        updated_at,
        box_type,
        title,
        slug,
        short_title,
        marketing_description,
        calories_kcal,
        protein_grams,
        fat_grams,
        carbs_grams,
        bulletpoint1,
        bulletpoint2,
        bulletpoint3,
        recipe_diet_type,
        season,
        base,
        protein_source,
        preparation_time_minutes,
        shelf_life_days,
        equipment_needed,
        origin_country,
        recipe_cuisine,
        in_your_box,
        gousto_reference,
        rate) 
        VALUES (
            '".$created_at."',
            '".$updated_at."',
            '".$box_type."',
            '".$title."',
            '".$slug."',
            '".$short_title."',
            '".$marketing_description."',
            ".$calories_kcal.",
            ".$protein_grams.",
            ".$fat_grams.",
            ".$carbs_grams.",
            '".$bulletpoint1."',
            '".$bulletpoint2."',
            '".$bulletpoint3."',
            '".$recipe_diet_type."',
            '".$season."',
            '".$base."',
            '".$protein_source."',
            ".$preparation_time_minutes.",
            ".$shelf_life_days.",
            '".$equipment_needed."',
            '".$origin_country."',
            '".$recipe_cuisine."',
            '".$in_your_box."',
            '".$gousto_reference."',
            0);";
    $data = $dbInstance->insert($sql);
});

$app->put('/recipes/{id}',function($request){
    $dbInstance = new DB();
    $id = $request->getAttribute('id');
    $parsedBody = $request->getParsedBody();
    $box_type = $parsedBody['box_type'] ?? '';
    $title = $parsedBody['title'] ?? '';
    $slug = $parsedBody['slug'] ?? '';
    $short_title = $parsedBody['short_title'] ?? '';
    $marketing_description = $parsedBody['marketing_description'] ?? '';
    $calories_kcal = $parsedBody['calories_kcal'] ?? 0;
    $protein_grams = $parsedBody['protein_grams'] ?? 0;
    $fat_grams = $parsedBody['fat_grams'] ?? 0;
    $carbs_grams = $parsedBody['carbs_grams'] ?? 0;
    $bulletpoint1 = $parsedBody['bulletpoint1'] ?? '';
    $bulletpoint2 = $parsedBody['bulletpoint2'] ?? '';
    $bulletpoint3 = $parsedBody['bulletpoint3'] ?? '';
    $recipe_diet_type = $parsedBody['recipe_diet_type'] ?? '';
    $season = $parsedBody['season'] ?? '';
    $base = $parsedBody['base'] ?? '';
    $protein_source = $parsedBody['protein_source'] ?? '';
    $preparation_time_minutes = $parsedBody['preparation_time_minutes'] ?? 0;
    $shelf_life_days = $parsedBody['shelf_life_days'] ?? 0;
    $equipment_needed = $parsedBody['equipment_needed'] ?? '';
    $origin_country = $parsedBody['origin_country'] ?? '';
    $recipe_cuisine = $parsedBody['recipe_cuisine'] ?? '';
    $in_your_box = $parsedBody['in_your_box'] ?? '';
    $gousto_reference = $parsedBody['gousto_reference'] ?? '';
    $updated_at = date('d/m/Y H:i');
    $sql = "UPDATE recipe SET 
        updated_at = '".$updated_at."',
        box_type = '".$box_type."',
        title = '".$title."',
        slug = '".$slug."',
        short_title = '".$short_title."',
        marketing_description = '".$marketing_description."',
        calories_kcal = ".$calories_kcal.",
        protein_grams = ".$protein_grams.",
        fat_grams = ".$fat_grams.",
        carbs_grams = ".$carbs_grams.",
        bulletpoint1 = '".$bulletpoint1."',
        bulletpoint2 = '".$bulletpoint2."',
        bulletpoint3 = '".$bulletpoint3."',
        recipe_diet_type = '".$recipe_diet_type."',
        season = '".$season."',
        base = '".$base."',
        protein_source = '".$protein_source."',
        preparation_time_minutes = ".$preparation_time_minutes.",
        shelf_life_days = ".$shelf_life_days.",
        equipment_needed = '".$equipment_needed."',
        origin_country = '".$origin_country."',
        recipe_cuisine = '".$recipe_cuisine."',
        in_your_box = '".$in_your_box."',
        gousto_reference = '".$gousto_reference."',
         WHERE id = ".$id;
    $data = $dbInstance->update($sql);
});

$app->put('/recipes/{id}/rate',function($request){
    $dbInstance = new DB();
    $id = $request->getAttribute('id');
    $parsedBody = $request->getParsedBody();
    $rate = $parsedBody['rate'] ?? 0;
    if($rate < 0 || $rate > 5){
        $rate = 1;
    }
    $updated_at = date('d/m/Y H:i');
    $sql = "UPDATE recipe SET updated_at = '".$updated_at."', rate = ".$rate." WHERE id = ".$id;
    $data = $dbInstance->update($sql);
});

?>