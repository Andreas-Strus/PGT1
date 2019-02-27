<?PHP
/**
 * Includes methods for models.
 *
 * @abstract
 */
abstract class Model{
    /**
     * object with mysqli connection
     *
     * @var object
     */
    protected $conn;
 
    /**
     * Sets connect with the database.
     *
     * @return void
     */
    public function  __construct() {
		 try{
			require 'config/sql.php';
            $this->conn=new mysqli($host, $user, $pass, $db);
        }
        catch(DBException $e) {
            echo 'The connect can not create: ' . $e->getMessage();
        }
 
    }
    /**
     * Loads the object with the model.
     *
     * @param string $name name class to load
     * @param string $path pathway to the file with the class
     *
     * @return object
     */
    public function loadModel($name, $path='') {
		$path=$path.$name.'.php';
        $name=$name.'Model';
        try {
            if(is_file($path)) {
                require $path;
                $ob=new $name();
            } else {
                throw new Exception('Can not open model '.$name.' in: '.$path);
            }
        }
        catch(Exception $e) {
            echo $e->getMessage().'<br />
                File: '.$e->getFile().'<br />
                Code line: '.$e->getLine().'<br />
                Trace: '.$e->getTraceAsString();
            exit;
        }
        return $ob;
    }
    /**
     * It selects data from the database.
     *
     * @param string $from Table
     * @param <type> $select Records to select (default * (all))
     * @param <type> $where Condition to query
     * @param <type> $order Order ($record ASC/DESC)
     * @param <type> $limit LIMIT
     * @return array
     */
    public function select($from, $select='*', $where=NULL, $order=NULL, $limit=NULL) {
		$from=$this->conn->real_escape_string($from);
		$select=$this->conn->real_escape_string($select);
		$query ='SELECT '.$select.' FROM '.$from;
		$data = [];
        if($where!=NULL){
			//$where=$this->conn->real_escape_string($where);
			$query=$query.' WHERE '.$where;
		}
        if($order!=NULL){
			$order=$this->conn->real_escape_string($order);
			$query=$query.' ORDER BY '.$order;
		}
        if($limit!=NULL){
			$limit=$this->conn->real_escape_string($limit);
			$query=$query.' LIMIT '.$limit;
		}
        $results=$this->conn->query($query);
		if ($results->num_rows > 0) {
		// output data of each row
		while($row = $results->fetch_assoc()) {
			$data[]=$row;
		}
		} else {
		echo "0 results";
		}
		return $data;
 
    }
	public function insert($table, $columns, $values) {
		$table=$this->conn->real_escape_string($table);
		$toInsert = array_combine($columns,$values);
		$query='INSERT INTO '.$table;
		$colString=" (";
		$valString =" VALUES (";
		$addSomething = false;
		foreach ($toInsert as $column => $value){
			
			//$value=$this->conn->real_escape_string($value);
			//$column=$this->conn->real_escape_string($column);
			if($addSomething) {
				$colString=$colString.", ";
				$valString=$valString.", ";
			}
			$colString=$colString.$column;
			$valString=$valString.$value;
			$addSomething=true;
		}
		$colString=$colString.") ";
		$valString=$valString.") ";
		if($addSomething){
			$query=$query.$colString.$valString;
			$this->conn->query($query);
		}
		 
    }
}
?>