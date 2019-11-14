<?php

namespace WorldAnalysis\Mysql ;

use mysqli;

Class oConexion extends MySQLi
{
    protected static $instance;
    protected static $options = array();

    public function __construct( $host, $user, $password, $database = "", $port = NULL, $socket = NUL) {
        $o = self::$options;



        @parent::__construct(
            $host, $user, $password, $database, $port, $socket
        );

        if( mysqli_connect_errno() ) {
            throw new exception(mysqli_connect_error(), mysqli_connect_errno());
        }
    }

    public static function getInstance() {
        if( !self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function setOptions( array $opt ) {
        self::$options = array_merge(self::$options, $opt);
    }

    public function query($query) {
        if( !$this->real_query($query) ) {
            throw new exception( $this->error, $this->errno );
        }

        return new mysqli_result($this);
        //return $result;
    }

    public function prepare($query) {
        $stmt = new mysqli_stmt($this, $query);
        return $stmt;
    }
}