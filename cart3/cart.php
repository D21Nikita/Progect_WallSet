


<?php 
 
 if(isset($_POST['submit'])){ 
      
     foreach($_POST['quantity'] as $key => $val) { 
         if($val==0) { 
             unset($_SESSION['cart'][$key]); 
         }else{ 
             $_SESSION['cart'][$key]['quantity']=$val; 
         } 
     } 
      
 } 

?> 

<h1>Просмотр корзины</h1> 
<a href="index.php?page=products">Вернуться на страницу с товарами.</a> 
<form method="post" action="index.php?page=cart"> 
  
 <table> 
      
     <tr> 
         <th>Стиль обоев</th> 
         <th>Количество</th> 
         <th>Цена</th> 
         <th>Общая стоимость</th> 
     </tr> 
      
     <?php 
      
         $sql="SELECT * FROM wallpaper WHERE id IN ("; 
                  
                 foreach($_SESSION['cart'] as $id => $value) { 
                     $sql.=$id.","; 
                 } 
                  
                 $sql=substr($sql, 0, -1).") ORDER BY name_wall ASC"; 
					$query=mysqli_query($connection, $sql); 
					$totalprice=0; 
					while($row=mysqli_fetch_array($query)){ 
						// Убедитесь, что 'quantity' и 'price' являются числами
                    $quantity = (int)$_SESSION['cart'][$row['id']]['quantity'];
                    $price = (float)$row['price'];

                        // Теперь вы можете безопасно выполнять умножение
                        $subtotal = $quantity * $price; 
						$totalprice+=$subtotal;  
                 ?> 
                     <tr> 
                         <td><?php echo $row['style_wall'] ?></td> 
                         <td><input type="text" name="quantity[<?php echo $row['id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" /></td> 
                         <td><?php echo $row['price'] ?>₽</td> 
                         <td><?php $quantity = (int)$_SESSION['cart'][$row['id']]['quantity'];
                         $price = (float)$row['price'];
                        echo $quantity * $price;?>₽</td> 
                     </tr> 
                 <?php 
                      
                 } 
     ?> 
                 <tr> 
                     <td colspan="4">Общая цена: <?php echo $totalprice ?></td> 
                 </tr> 
      
 </table> 
 <br /> 
 <button type="submit" name="submit">Oбновить корзину</button>
  
</form> 
<br /> 
<p>Чтобы удалить товар, установите его количество равным 0. </p>