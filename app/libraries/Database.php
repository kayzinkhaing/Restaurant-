<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $pdo;
    private $stmt;
    private $error; 

    public function __construct()
    {
        //to connect to the mysql database
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        //mean separate different part, In this  ; means end of the host part and beginning of the database
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false // For General Error
        );

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
            // print_r($this->pdo);
            // echo "Success";
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // public function lastInsertId() {
    //     return $this->pdo->lastInsertId();
    // }
    public function create($table, $data)
    {
        try {
            $column = array_keys($data);
            $columnSql = implode(', ', $column);
            $bindingSql = ':' . implode(',:', $column);
            //echo $bindingSql;
            $sql = "INSERT INTO $table ($columnSql) VALUES ($bindingSql)";
            // echo $sql;
            $stm = $this->pdo->prepare($sql);  
            foreach ($data as $key => $value) {
                $stm->bindValue(':' . $key, $value);
            }
            // print_r($stm);
            $status = $stm->execute();
            // echo $status;
            return ($status) ? $this->pdo->lastInsertId() : false;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    // Update Query
    public function update($table, $id, $data)
    {   
        // First, we don't want id from category table
        if (isset($data['id'])) {
            unset($data['id']);
        }

        try {
            $columns = array_keys($data);
            function map ($item) {
                return $item . '=:' . $item;
            }
            $columns = array_map('map', $columns);
            $bindingSql = implode(',', $columns);
            // echo $bindingSql;
            // exit;
            $sql = 'UPDATE ' .  $table . ' SET ' . $bindingSql . ' WHERE `id` =:id';
            $stm = $this->pdo->prepare($sql);

            // Now, we assign id to bind
            $data['id'] = $id;

            foreach ($data as $key => $value) {
                $stm->bindValue(':' . $key, $value);
            }
            $status = $stm->execute();
            // print_r($status);
            return $status;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function delete($table, $id)
    {
        $sql = 'DELETE FROM ' . $table . ' WHERE `id` = :id';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        return ($success);
    }
    public function updateMenuQuantity($menu_id, $quantity) {
        // Check if the current quantity is greater than or equal to the quantity to be reduced
        $checkSql = 'SELECT quantity FROM menu WHERE id = :menu_id';
        $checkStm = $this->pdo->prepare($checkSql);
        $checkStm->bindValue(':menu_id', $menu_id);
        $checkStm->execute();
        $currentQuantity = $checkStm->fetchColumn();
    
        if ($currentQuantity >= $quantity) {
            // Update the quantity if the current quantity is greater than or equal to the quantity to be reduced
            $updateSql = 'UPDATE menu SET quantity = quantity - :quantity WHERE id = :menu_id';
            $updateStm = $this->pdo->prepare($updateSql);
            $updateStm->bindValue(':quantity', $quantity);
            $updateStm->bindValue(':menu_id', $menu_id);
            $success = $updateStm->execute();
            return $success;
        } else {
            // Return false if the quantity is not sufficient
            return false;
        }
    }
    

        public function deleteByUserId($table, $conditions)
    {
        $conditionString = implode(' AND ', array_map(function($key) {
            return "$key = :$key";
        }, array_keys($conditions)));

        $sql = "DELETE FROM $table WHERE $conditionString";
        $stmt = $this->pdo->prepare($sql);

        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }



    public function columnFilter($table, $column, $value)
    {
        // $sql = 'SELECT * FROM ' . $table . ' WHERE `' . $column . '` = :value';
        $sql = 'SELECT * FROM ' . $table . ' WHERE `' . str_replace('`', '', $column) . '` = :value';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':value', $value);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }
    public function filterByMultipleColumns($table, $conditions)
    {
        // Initialize the SQL query
        $sql = 'SELECT * FROM ' . $table . ' WHERE ';
        
        // Create an array to hold the column-value pairs for the SQL query
        $clauses = [];
        $parameters = [];

        // Loop through the conditions array to build the SQL query dynamically
        foreach ($conditions as $column => $value) {
            // Skip empty values
            if (empty($value)) {
                continue;
            }
            
            $column = str_replace('`', '', $column); // Remove any backticks from column names
            $clauses[] = "`$column` = :$column";
            $parameters[":$column"] = $value;
        }

        // Join the clauses with 'AND' to form the final WHERE clause
        if (empty($clauses)) {
            return []; // Return empty array if no conditions
        }
        
        $sql .= implode(' AND ', $clauses);

        // Prepare and execute the SQL statement
        $stm = $this->pdo->prepare($sql);

        // Bind the values dynamically
        foreach ($parameters as $param => $value) {
            $stm->bindValue($param, $value);
        }

        // Execute the statement and fetch all results
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        
        // Return the results
        return ($success) ? $row : [];
    }

    public function increaseQuantity($userId, $itemId, $price)
    {
        try {
            // SQL query to update the quantity and total price
            $sql = "UPDATE cart 
                    SET quantity = quantity + 1, 
                        total_amount = total_amount + :parsed_price 
                    WHERE user_id = :user_id AND item_id = :item_id";
            
            // Prepare the statement
            $stm = $this->pdo->prepare($sql);
            
            // Bind the parameters
            $stm->bindValue(':parsed_price', $price, PDO::PARAM_STR); // Use PDO::PARAM_STR if price is a decimal
            $stm->bindValue(':user_id', $userId, PDO::PARAM_INT);
            $stm->bindValue(':item_id', $itemId, PDO::PARAM_INT);
            
            // Execute the query
            $success = $stm->execute();
            
            // Return success or failure
            return $success;
        } catch (Exception $e) {
            // Handle any exceptions
            echo($e->getMessage());
            return false;
        }
    }
    public function decreaseQuantity($userId, $itemId, $price)
{
    try {
        $sql = "UPDATE cart 
                SET quantity = quantity - 1, 
                    total_amount = total_amount - :parsed_price 
                WHERE user_id = :user_id AND item_id = :item_id AND quantity > 1";
        
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':parsed_price', $price, PDO::PARAM_STR);
        $stm->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stm->bindValue(':item_id', $itemId, PDO::PARAM_INT);
        
        $success = $stm->execute();
        return $success;
    } catch (Exception $e) {
        echo($e->getMessage());
        return false;
    }
}

public function getCartQuantity($userId, $itemId)
{
    $sql = "SELECT quantity FROM cart WHERE user_id = :user_id AND item_id = :item_id";
    $stm = $this->pdo->prepare($sql);
    $stm->bindValue(':user_id', $userId, PDO::PARAM_INT);
    $stm->bindValue(':item_id', $itemId, PDO::PARAM_INT);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result ? (int) $result['quantity'] : 0;
}




    


    public function loginCheck($email, $password)
    {
        $sql = 'SELECT * FROM users WHERE `email` = :email AND `password` = :password';
        // echo $sql;
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':password', $password);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function setLogin($id)
    {
        $sql = 'UPDATE users SET `is_login` = :value WHERE `id` = :id';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':value', 1);
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        $stm->closeCursor();    // to solve PHP Unbuffered Queries
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function unsetLogin($id)
    {
       try{ 
           $sql = "UPDATE users SET is_login = :false WHERE id = :id"; //is_login = :false .is a placeholder to indicate user login(true) or not(false)
                                                                              // id = :id also 
           $stm = $this->pdo->prepare($sql);
           $stm->bindValue(':false','0');
           $stm->bindValue(':id',$id);
           $success = $stm->execute();
           $row     = $stm->fetch(PDO::FETCH_ASSOC);
           return ($success) ? $row : [];
        }
        catch( Exception $e)
        {
            echo($e);
        }
    }

    public function readAll($table)
    {
        $sql = 'SELECT * FROM ' . $table;
        // print_r($sql);
        $stm = $this->pdo->prepare($sql);
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }
    public function readById($table, $id) {
        try {
            $query = "SELECT * FROM $table WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            // Handle errors gracefully, e.g., log or return false
            return false;
        }
    }
    public function getById($table, $id)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE `id` =:id';
        // print_r($sql);
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function getByCategoryId($table, $column, $value)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE `' . str_replace('`', '', $column) . '` = :value';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':value', $value);
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }
  
    // For Dashboard
    public function incomeTransition()
    {
       try{

           $sql        = "SELECT *,SUM(amount) AS amount FROM incomes WHERE
           (date = { fn CURDATE() }) ";
           $stm = $this->pdo->prepare($sql);
           $success = $stm->execute();

           $row     = $stm->fetch(PDO::FETCH_ASSOC);
           return ($success) ? $row : [];

        }
        catch( Exception $e)
        {
            echo($e);
        }
     
    }

    public function expenseTransition()
    {
       try{

           $sql        = "SELECT * ,SUM(amount*qty) AS amount FROM expenses WHERE
           (date = { fn CURDATE() }) ";
           $stm = $this->pdo->prepare($sql);
           $success = $stm->execute();

           $row     = $stm->fetch(PDO::FETCH_ASSOC);
           return ($success) ? $row : [];

        }
        catch( Exception $e)
        {
            echo($e);
        }
     
    }

    public function getTotalCount($table)
    {
        $sql = 'SELECT COUNT(*) as total FROM `' . $table . '`'; // Using backticks around table name
        $stm = $this->pdo->prepare($sql);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
    
        return $result['total'];
    }
    public function getTotalCartCount(string $table, $column, $value): int
    {
        $sql = 'SELECT SUM(`quantity`) as total FROM ' . $table . ' WHERE ' . $column . ' = :value';

        try {
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':value', $value);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);

            if ($result === false) {
                throw new Exception("Failed to fetch total count for table: $table");
            }

            return (int) $result['total'];
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
    public function updateCartItemQuantity($menu_id, $quantity): bool {
        $sql = 'UPDATE cart_view SET quantity = :quantity WHERE menu_id = :menu_id AND user_id = :user_id';
    
        try {
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':quantity', $quantity, PDO::PARAM_INT);
            $stm->bindValue(':menu_id', $menu_id, PDO::PARAM_INT);
            $stm->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
    
            if ($stm->execute()) {
                return true;
            } else {
                throw new Exception("Failed to update quantity for menu_id: $menu_id");
            }
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
    // public function getQtyForEachItem(string $table, $column, $value): int
    // {
    //     $sql = 'SELECT SUM(`quantity`) as total FROM ' . $table . ' WHERE ' . $column . ' = :value';

    //     try {
    //         $stm = $this->pdo->prepare($sql);
    //         $stm->bindValue(':value', $value);
    //         $stm->execute();
    //         $result = $stm->fetch(PDO::FETCH_ASSOC);

    //         if ($result === false) {
    //             throw new Exception("Failed to fetch total count for table: $table");
    //         }

    //         return (int) $result['total'];
    //     } catch (PDOException $e) {
    //         throw new Exception("Database error: " . $e->getMessage());
    //     }
    // }

}

