<?php 
 
	if(isset($_GET['action']) && $_GET['action']=="add"){ 
		 
		$id=intval($_GET['id']); 
		 
		if(isset($_SESSION['cart'][$id])){ 
			 
			$_SESSION['cart'][$id]['quantity']++; 
			 
		}else{ 
			 
			$sql_s="SELECT * FROM wallpaper WHERE id={$id}"; 
			$query_s = mysqli_query($connection, $sql_s); 
			if(mysqli_num_rows($query_s)!=0){ 
				$row_s=mysqli_fetch_array($query_s); 
				 
				$_SESSION['cart'][$row_s['id']]=array( 
						"quantity" => 1, 
						"price" => $row_s['price'] 
					); 
				 
				 
			}else{ 
				 
				$message="This product id it's invalid!"; 
				 
			} 
			 
		} 
		 
	} 
 
?> 
	<h1>Список продуктов</h1> 
	<?php 
		if(isset($message)){ 
			echo "<h2>$message</h2>"; 
		} 
	?> 
	<table> 
		<tr> 
			<th>Название обоев</th> 
			<th>Стиль обоев</th> 
			<th>Описание</th> 
			<th>Цена</th> 
			<th>Действие</th> 
		</tr> 
		 
		<?php

		$query = "SELECT * FROM wallpaper WHERE id BETWEEN 36 AND 47 ORDER BY name_wall ASC";
		$result = mysqli_query($connection, $query);
		if (!$result) {
		die('Ошибка запроса: ' . mysqli_error($connection));
		}
		while ($row = mysqli_fetch_array($result)) {

		?> 
			<tr> 
			    <td><?php echo $row['name_wall'] ?></td>
				<td><?php echo $row['style_wall'] ?></td>  
			    <td><?php echo $row['description'] ?></td> 
			    <td><?php echo $row['price'] ?>₽</td> 
			    <td><a href="index.php?page=products&action=add&id=<?php echo $row['id'] ?>">Добавить в корзину</a></td> 
			</tr> 
		<?php 
				 
			} 
		?> 
		 
	</table>
	