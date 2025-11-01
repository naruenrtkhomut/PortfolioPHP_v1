<?php
    abstract class DatabaseProp {
        /** parameters */
        protected $host = null;
        protected $name = null;
        protected $user = null;
        protected $pass = null;
        protected $port = null;
        protected $conn = null;
        protected $error = null;
        protected $type = null;

        /**
         * database property construct
         * @param string $dbType
         */
        public function __construct(string $dbType)
        {
            $this->type = $dbType;
            /** getting database properties */
            $this->host = DatabaseEnum::HOST->Value(dbType: $dbType);
            $this->name = DatabaseEnum::NAME->Value(dbType: $dbType);
            $this->user = DatabaseEnum::USER->Value(dbType: $dbType);
            $this->pass = DatabaseEnum::PASS->Value(dbType: $dbType);
            $this->port = DatabaseEnum::PORT->Value(dbType: $dbType);

            switch ($dbType) {
                /** connection database of MySQL */
                case "MYSQL":
                    {
                        try {
                            $this->conn = new PDO(dsn: "mysql:host=".($this->host).";port=".($this->port).";dbname=".($this->name), username: $this->user, password: $this->pass);
                            $this->conn->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
                        }
                        catch (PDOException $getError) {
                            $this->conn = null;
                            $this->error = $getError;
                        }
                    }
                    break;
                /** connection database of PostgreSQL */
                case "POSTGESQL":
                    {
                        try {
                            $this->conn = new PDO(dsn: "pgsql:host=".($this->host).";port=".($this->port).";dbname=".($this->name), username: $this->user, password: $this->pass);
                            $this->conn->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
                        }
                        catch(PDOException $getError) {
                            $this->conn = null;
                            $this->error = $getError;
                        }
                    }
                    break;
                /** connection database MSSQL */
                case "MSSQL":
                    {
                        try {
                            $this->conn = new PDO(dsn: "sqlsrv:host=".($this->host).";port=".($this->port).";dbname=".($this->name), username: $this->user, password: $this->pass);
                        }
                        catch(PDOException $getError) {
                            $this->conn = null;
                            $this->error = $getError;
                        }
                    }
                    break;
                /** connection database MongoDB */
                case "MONGO":
                    {

                    }
                    break;
            }
        }

        /**
         * query data from database
         * @param string $commStr
         * @return mixed
         */
        public function QueryData(string $commStr): mixed {
            $data = array();
            if ($this->conn === null) return $data;
            if ($this->type === "MYSQL" || $this->type === "POSTGESQL" || $this->type === "MSSQL") {
                try {
                    $commPre = $this->conn->query(query: $commStr);
                    $commPre->execute();
                    $commResult = $commPre->setFetchMode(mode: PDO::FETCH_ASSOC);
                    foreach ($commPre->fetchAll() as $getData) {
                        array_push(array: $data, values: $getData);
                    }
                    $this->conn = null;
                }
                catch (PDOException $getError) {
                    $this->error = $getError;
                }
            }
            return $data;
        }


        /**
         * checking database connection
         * @return mixed
         */
        public function CheckConnection(): mixed {
            $data = array();
            $data["result"] = $this->conn !== null;
            $data["error"] = $this->error;
            return $data;
        }
    }


    /**
     * class of database connection
     */
    class DatabaseConnection_MD extends DatabaseProp {

        /**
         * database connection
         * @param string $dbType
         */
        public function __construct(string $dbType)
        {
            parent::__construct(dbType: $dbType);
        }
    }
?>