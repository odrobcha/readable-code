<?php

$orders = [
    ['pizza'=>'calzone', 'person'=>'koen'],
    ['pizza'=>'margarita', 'person'=>'manuele'],
    ['pizza'=>'golden', 'person'=>'students'],
];
function orderPizza($pizzaType, $person) {
    try {
        $price = getPrice($pizzaType);
    }
    catch (Exception $e){
        echo 'Exception: ' . $e->getMessage(); //handle the exception
    }
    if($person == 'koen'){
        $address = 'a yacht in Antwerp';
    }
    if ($person == 'manuele'){
        $address = 'somewhere in Belgium';
    }
    if ($person == 'students') {
        $address = 'BeCode office';
    }

    echo 'Creating new order... <br>'
            .'A ' . $pizzaType  .' pizza should be sent to ' . $person . ". <br>The address:" .$address
            .'<br>'
            .'The bill is €' .$price .'.<br>'
            ."Order finished .<br><br>";
}
/**
 * Return pizza price
 *
 * @throws Exception
 */
function getPrice($pizza)
{
/*    $pizzas = [
        'margarita' => 5,
        'golden' => 100,
        'calzone' => 10
    ];

    if(!in_array($pizzaType, $pizzas)){
        throw new Exception($pizza . 'pizza is not in menu list');
    }

    return $pizzas[$pizzaType];

*/
   switch($pizza) {
        case 'margarita':
            return 5;
        case 'golden':
            return 100;
        case 'calzone':
            return 10;
        default:
            throw new Exception($pizza . 'pizza is not in menu list');
    }
}

function orderPizzaToAll($orderList)
{
   foreach ($orderList as $order){
      orderPizza($order['pizza'], $order['person']);
    }
}
orderPizzaToAll($orders);
