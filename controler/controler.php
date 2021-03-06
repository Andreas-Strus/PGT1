<?PHP
/**
 * This class includes methods for controllers.
 *
 * @abstract
 */
abstract class Controler{
 
    /**
     * Redirects to URL.
     *
     * @param string $url URL to redirect
     *
     * @return void
     */
    public function redirect($url) {
		header("location: ".$url);
 
    }
    /**
     * Loads the object with the view.
     *
     * @param string $name name class to load
     * @param string $path pathway to the file with the class
     *
     * @return object
     */
    public function loadView($name, $path='view/') {
		$path=$path.$name.'.php';
        $name=$name.'View';
        try {
            if(is_file($path)) {
                require $path;
                $ob=new $name();
            } else {
                throw new Exception('Can not open view '.$name.' in: '.$path);
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
     * Loads the object with the model.
     *
     * @param string $name name class to load
     * @param string $path pathway to the file with the class
     *
     * @return object
     */
    public function loadModel($name, $path='model/') {
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
 
}
?>