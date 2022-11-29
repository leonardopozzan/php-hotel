<?php 
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae veritatis et culpa labore omnis id laborum ad earum totam animi, nam cumque aliquid exercitationem dolorem assumenda officiis. Impedit, facere velit!',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae veritatis et culpa labore omnis id laborum ad earum totam animi, nam cumque aliquid exercitationem dolorem assumenda officiis. Impedit, facere velit!',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae veritatis et culpa labore omnis id laborum ad earum totam animi, nam cumque aliquid exercitationem dolorem assumenda officiis. Impedit, facere velit!',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae veritatis et culpa labore omnis id laborum ad earum totam animi, nam cumque aliquid exercitationem dolorem assumenda officiis. Impedit, facere velit!',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae veritatis et culpa labore omnis id laborum ad earum totam animi, nam cumque aliquid exercitationem dolorem assumenda officiis. Impedit, facere velit!',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];
if(isset($_GET['parking']) && !empty($_GET['parking'])){
    if($_GET['parking'] == 'park'){
        $hotels = array_filter($hotels, fn($value)=> $value['parking']);
    }else{
        $hotels = array_filter($hotels, fn($value)=> !$value['parking']);
    };
};
if(isset($_GET['vote']) && !empty($_GET['vote'])){
    $hotels = array_filter($hotels, fn($value)=> $value['vote'] >= $_GET['vote']);
};
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <link rel='stylesheet' href='./css/style.css'>
    <script src='https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js'></script>
    <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="index.php" class="pt-5">
            <label for="" class="fs-5">Parking</label>
            <select name="parking">
                <option value="" selected>Scegli</option>
                <option value="park">Parking</option>
                <option value="noPark">No Parking</option>
            </select>
            <label for="" class="fs-5">Vote</label>
            <select name="vote">
                <option value="" selected>Scegli</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <div>
                <button class="btn btn-dark mt-2">Filtra</button>
            </div>
        </form>
        <div class="d-flex pt-5">
            <?php foreach($hotels as $key => $hotel){ 
                $park = $hotel['parking'] ? 'avaliable' : 'unavailable'
            ?>
                <div class="my-col">
                    <div class="img-box"><img src="https://picsum.photos/300/400?random=<?php echo $key  ?>"></div>
                    <div class="title py-2"><?php echo $hotel['name']  ?></div>
                    <div class="sub-title">Description:</div>
                    <div class="info"><?php echo $hotel['description']  ?></div>
                    
                    <div class="py-2"><span class="sub-title"> Parking:</span> <?php echo $park  ?></div>
                    <div>
                        <?php for($i = 0; $i < $hotel['vote']; $i++){
                        echo '<i class="fa-solid fa-star text-warning"></i>';
                        }  ?>
                        <span class="vote"><?php echo $hotel['vote']  ?>/5</span>
                    </div>
                </div>
                <?php }  ?>
        </div>
    </div>
</body>