<?php
namespace phplite\Database;

use phplite\File\File;
use PDO;
use PDOException;
use Exception;

class Database
{
    /**
     * Data base instance
     */
    protected static $instance;
    /**
     * Data base connection
     */
    protected static $connection;
    /**
     * Table
     */
    protected static $table;

    /**
     * Database query
     */
    protected static $query;
    /**
     * setter
     */
    protected static $setter;
    /**
     * Database select
     */
    protected static $select;

    /**
     * Where query
     */
    protected static $where;
    /**
     * where_binding query
     */
    protected static $where_binding = [];
    /**
     * join query
     */
    protected static $join;
    /**
     * $group_by query
     */
    protected static $group_by;
    /**
     * having query
     */
    protected static $having;
    /**
     * having_binding query
     */
    protected static $having_binding = [];
    /**
     * order_by query
     */
    protected static $order_by;
    /**
     * limit query
     */
    protected static $limit;
    /**
     * offset query
     */
    protected static $offset;
    /**
     * All binding query
     */
    protected static $binding = [];
    private function __construct()
    {
    }
    private static function connect()
    {
        if (!static::$connection) {
            $database_data = File::require_file('config/database.php');
            extract($database_data);
            $dsn = 'mysql:dbname=' . $database . ';host=' . $host . '';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_PERSISTENT => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "set NAMES " . $charset . " COLLATE " . $collation,
            ];
            try {
                static::$connection = new PDO($dsn, $username, $password, $options);
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }


        }
    }
    private static function instance()
    {
        static::connect();
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    /**
     * Database Query
     */
    public static function query($query = null)
    {
        static::instance();
        if ($query == null) {
            if (!static::$table) {
                throw new Exception("Pleas select your table");
            }
            $query = "SELECT ";
            $query .= static::$select ?: ' * ';
            $query .= " FROM " . static::$table . " ";
            // $query .= static::$join . " ";
            $query .= static::$where . " ";
            // $query .= static::$group_by . " ";
            // $query .= static::$having . " ";
            // $query .= static::$order_by . " ";
            // $query .= static::$limit . " ";
            // $query .= static::$offset . " ";
        }
        static::$query = $query;
        static::$binding = array_merge(static::$where_binding, static::$having_binding);
        static::instance();
    }
    /**
     * Select from database
     */
    public static function select()
    {
        $select = func_get_args();
        $select = implode(',', $select);

        static::$select = $select;
        return static::instance();
    }
    /**
     * Define table 
     * @param string $table
     * @return object $instance
     */
    public static function table($table)
    {
        static::$table = $table;
        return static::instance();
    }
    /**
     * Where query
     * @param string $column
     * @param string $operator
     * @param string $value
     * @param string $type
     * @return object $instance
     */
    public static function where($column, $operator, $value, $type = null)
    {
        $where = '`' . $column . '`' . $operator . ' ? ';
        if (!static::$where) {
            $statment = " WHERE " . $where;
        } else {
            if ($type == null) {
                $statment = " AND " . $where;
            } else {
                $statment = " " . $type . " " . $where;
            }
        }
        static::$where .= $statment;
        static::$where_binding[] = htmlspecialchars($value);
        return static::instance();
    }
    // public static function getQuery()
    // {
    //     static::query(static::$query);
    //     return static::$query;
    // }
    /**
     * fetch Execute
     *
     */
    private static function fetchExecute()
    {
        static::query(static::$query);
        $query = trim(static::$query, ' ');
        $data = static::$connection->prepare($query);
        $data->execute(static::$binding);
        static::clear();

        return $data;
    }
    /**
     * get recordes
     */
    public static function get()
    {
        $data = static::fetchExecute();
        $result = $data->fetchAll();

        return $result;
    }
    /**
     * get record
     */
    public static function first()
    {
        $data = static::fetchExecute();
        $result = $data->fetch();

        return $result;
    }
    /**
     *Execute
     *
     */
    private static function execute(array $data, $query, $where = null)
    {
        static::instance();
        if (!static::$table) {
            throw new Exception("unknow table");
        }
        foreach ($data as $key => $value) {
            static::$setter .= '`' . $key . '` = ?, ';
            static::$binding[] = filter_var($value, FILTER_SANITIZE_STRING);
        }
        static::$setter = trim(static::$setter, ', ');
        $query .= static::$setter;
        $query .= $where != null ? static::$where . " " : '';
        static::$binding = $where != null ? array_merge(static::$binding, static::$where_binding) : static::$binding;
        $data = static::$connection->prepare($query);
        $data->execute(static::$binding);
        static::clear();
    }
    /**
     * Insert to table
     *
     * @param array $data
     *
     * @return object
     */
    public static function insert($data)
    {
        $table = static::$table;

        $query = "INSERT INTO " . $table . " SET ";
        static::execute($data, $query);
        $object_id = static::$connection->lastInsertId();
        $object = static::table($table)->where('id', '=', $object_id)->first();
        return $object;
    }
    public static function update($data)
    {
          $query="UPDATE ".static::$table ." SET ";
          static::execute($data,$query,true);
          return true;
    }
    public static function delete()
    {
          $query="DELETE FROM ".static::$table ." ";
          static::execute([],$query,true);
          return true;
    }
    /**
     * Clear the properities
     *
     * @return void
     */
    private static function clear()
    {
        static::$select = '';
        static::$where = '';
        static::$where_binding = [];
        static::$query = '';
        static::$binding = [];
        static::$instance = '';
    }
}