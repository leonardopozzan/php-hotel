<?php 
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];
if(isset($_GET['parking']) && $_GET['parking'] != '' && isset($_GET['vote']) && $_GET['vote'] != ''){
    if($_GET['parking'] == 'park'){
        $hotels = array_filter($hotels, fn($value)=> $value['parking'] && $value['vote'] >= $_GET['vote']);
    }else{
        $hotels = array_filter($hotels, fn($value)=> !$value['parking'] && $value['vote'] >= $_GET['vote']);
    };
    
}elseif(isset($_GET['parking']) && $_GET['parking'] != ''){
    if($_GET['parking'] == 'park'){
        $hotels = array_filter($hotels, fn($value)=> $value['parking']);
    }else{
        $hotels = array_filter($hotels, fn($value)=> !$value['parking']);
    };
}elseif(isset($_GET['vote']) && $_GET['vote'] != ''){
    $hotels = array_filter($hotels, fn($value)=> $value['vote'] >= $_GET['vote']);
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <link rel='stylesheet' href='./CSS/style.css'>
    <script src='https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js'></script>
    <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
    <script src='./JS/script.js' defer></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="index.php" class="pt-5">
            <select name="parking">
                <option value="" selected>Scegli</option>
                <option value="park">Parking</option>
                <option value="noPark">No Parking</option>
            </select>
            <select name="vote">
                <option value="" selected>Scegli</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button>Filtra</button>
        </form>
        <div class="row pt-5">
            <?php foreach($hotels as $key => $hotel){ 
                $park = $hotel['parking'] ? 'avaliable' : 'unavailable'
            ?>
                <div class="col">
                    <?php foreach($hotel as $key => $value){  ?> 
                    <div><?php echo $key . $value  ?></div>
                    <?php }  ?>
                </div>
                <?php }  ?>
        </div>
    </div>
</body>