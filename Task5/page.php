<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<div class="p-2">
  <?php 
$products = [
    'product 1' =>[
        'price' => '33',
        'img' => './img/1.png',
        'desc' => 'bag1'
    ],
    'product 2' =>[
        'price' => '35',
        'img' => './img/2.jfif',
        'desc' => 'bag2'
    ],
   'product 3' => [
        'price' => '37',
        'img' => './img/3.jfif',
        'desc' => 'bag3'
    ],
    'product 4' =>[
        'price' => '43',
        'img' => './img/4.jfif',
        'desc' => 'bag4'
    ],
    'product 5' =>[
        'price' => '50',
        'img' => './img/5.jfif',
        'desc' => 'bag5'
    ],
   'product 6' => [
        'price' => '130',
        'img' => './img/6.jfif',
        'desc' => 'bag6'
    ]
];
  
  ?>
  <div class="row">
        <?php foreach ($products as $product): ?>
          <div class="col-md-4">
            <div class="card" style="width: 18rem; margin: 10px;">
                <img src="<?php echo $product['img']; ?>" width="25%"class="card-img-top" alt="<?php echo $product['desc']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['desc']; ?></h5>
                    <p class="card-text">$<?php echo $product['price']; ?></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    </div>


