<?php 
require('AdminBDD/Conexion.php'); 

class  tienda2022n
{
	public function getCustomer(int $id)
	{
		$query = $this->pdo->query('SELECT * FROM productos WHERE id = '.$id);
		return $query->fetch();
	}

	public function getOrder(int $id)
	{
		$query = $this->pdo->query('SELECT * FROM detalles WHERE id = '.$id);
		return $query->fetch();
	}

	public function getOrderDetails(int $id)
	{
		$query = $this->pdo->query('SELECT product_code, product_name, description, quantity, unit_price
				FROM order_details
				JOIN products ON products.id = product_id
				WHERE order_details.order_id = '.$id);
		return $query->fetchAll();
	}
}

