<?php 

class DB 
{
    // prisijungimo kintamieji
    private $serverName = 'localhost';
    private $userName = 'root';
    private $password = '';
    private $databaseName = 'Posts_OOP';

    //prisijungima saugantis kintamasis
    public $conn;
    public $status;

    public function __construct() {
        $this->conn = new mysqli($this->serverName, $this->userName, $this->password, $this->databaseName);

           //pasitikrinam ar veikia, nera prisijungimo klaidu
        if($this->conn->connect_error){
        //ivyko klaida
        // die sustabdo tolismesni kodo vykdyma
        die('Kazkas atsitiko: ' . $this->conn->connect_error);
    } 
    $this->status = "<h2 class='status'> Prisijungiam</h2>";

    }

    // metodas kad sukurti nauja lentele
    public function createDBPostsTable()
    {
        $sql = "CREATE TABLE Posts(
            id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(30) NOT NULL,
            author VARCHAR(30) NOT NULL,
            body TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        // if ($this->conn->query($sql) === true) {
        //     $this->status = "<h3 class='status'>Lentele sukurta sekmingai </h3>";
        // } else {
        //     $this->status = "<h3 class='status'>Klaida: $this->conn->error </h3>";
        // }       

        $this->makeQuery($sql, 'Lentele sukurta sekmingai');  


    }

    // funkcija prideti viena posta
    public function addPost($title, $author, $body)
    {
        $sql = "INSERT INTO Posts(`title`, `author`, `body`) VALUES ('$title', '$author', '$body')";

        // if ($this->conn->query($sql) === true) {
        //     $this->status = "<h3 class='status'>Irasas sukurta sekmingai </h3>";
        // } else {
        //     $this->status = "<h3 class='status'>Klaida: $this->conn->error </h3>";
        // }   
        $this->makeQuery($sql, 'Irasas sukurta sekmingai');
    }


    public function editPost($id, $title, $author, $body)
    {
        $sql = "UPDATE Posts
        SET `title` = '$title', `author` = '$author', `body` = '$body'
        WHERE `id` = '$id'
        LIMIT 1
        ";
        //siunciam duomenis
        $this->makeQuery($sql, 'Irasas atnaujintas sekmingai');
    }

    // deletinanm
    public function deletePost($id)
    {
        $sql = "DELETE FROM Posts WHERE `id` = '$id' LIMIT 1";
        $this->makeQuery($sql, 'Irasas istrintas sekmingai');
    }


    // pgagalbinis metodas atlikti uzklausai ir gauti feedbacka
    private function makeQuery($sql, $msg)
    {
        if ($this->conn->query($sql) === true) {
            $this->status = "<h3 class='status'> $msg </h3>";
        } else {
            $this->status = "<h3 class='status'>Klaida: $this->conn->error </h3>";
        }  
    }



    // metodas gauti visus postus is musu post lenteles
    public function getPosts()
    {
        $sql = "SELECT * FROM Posts";

        // $mysqliResultObj savybe num_rows
        $mysqliResultObj = $this->conn->query($sql);

        if($mysqliResultObj->num_rows > 0) {
            // gauta daugiau nei nulis eiluciu
            return $mysqliResultObj->fetch_all(MYSQLI_ASSOC);
        } else {
            $this->status = "<h3 class='status'>Klaida: 0 eiluciu rasta </h3>";
        }
    }





        // sukuriam nauja lentele
        // $db->createDBPostsTable();

        // priideti viena posta
        // $db->addPost('First Post', 'Jane Done', 'post from function db klases');
        // $db->addPost('third Post', 'Jane Done', 'post from function db klases');


        // edit post
        // $db->editPost(2, 'Second Post', 'New author Jane', 'same but diff lorem lorem');

        // delete post
        // $db->deletePost(3);









        // HELPER KLASE ATVAIZDUOTI FEEDBACK KAIP NORIME

        public function 






    // duomenu bazes susijungimo uzdarymas
    public function closeConn() {
        $this->conn->close();
    }

}





























?>