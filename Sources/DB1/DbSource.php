<?php
namespace Sources\DB1;


use Sources\Source;
use \PDO;
class DbSource implements Source
{

    public $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $db   = 'test';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

    }

    /**
     * @return array
     */
    public function data(): array
    {
        $query = $this->pdo->prepare('SELECT * FROM staticdata_table');
        return $query->fetch();

    }

    /**
     * @return string
     */
    public function name(): string
    {
        return 'Positive Guys';
    }

    /**
     * @param int $month
     * @return int
     */
    public function countByMonth(int $month): int
    {
        $query = $this->pdo->prepare('SELECT sum(`people`) FROM staticdata_table where Month(`date`) =?');
        $query->execute([$month]);
        return $query->fetch();
    }


}