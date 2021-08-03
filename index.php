<?php

$orders = [
    [
        'pizza'=>'calzone',
        'person'=>'koen'],
    [
        'pizza'=>'margarita',
        'person'=>'manuele'],
    [
        'pizza'=>'golden',
        'person'=>'students'],
];

function orderPizza($pizzaType, $person){
    $addresses = [
        'koen' => 'a yacht in Antwerp',
        'manuele' => 'somewhere in Belgium',
        'students' => 'BeCode office'
    ];

    if(!in_array($person, array_keys($addresses))){
        throw new Exception('User ' . $person . ' not found');
    }

    try {
        $price = getPrice($pizzaType);
    }
    catch (Exception $e){
        echo 'Exception: ' . $e->getMessage(); //handle the exception
        return;
    }

    $address = $addresses[$person];

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
       try {
           orderPizza($order['pizza'], $order['person']);
       } catch (Exception $e) {
           echo 'Error: ' .$e->getMessage();
           return;
       }
   }
}
orderPizzaToAll($orders);
