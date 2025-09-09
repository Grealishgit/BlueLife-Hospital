<?php
// User model for BlueLife Hospital
require_once __DIR__ . '/../../config/database.php';

class User
{
    public $id;
    public $first_name;
    public $last_name;
    public $phone;
    public $gender;
    public $dob;
    public $email;
    public $password;

    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    // Create a new user
    public function create($data)
    {
        $sql = "INSERT INTO users (first_name, last_name, phone, gender, dob, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['first_name'],
            $data['last_name'],
            $data['phone'],
            $data['gender'],
            $data['dob'],
            $data['email'],
            password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
    }

    // Find user by email or phone
    public function findByIdentifier($identifier)
    {
        $sql = "SELECT * FROM users WHERE email = ? OR phone = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$identifier, $identifier]);
        return $stmt->fetch();
    }

    // Verify user login
    public function verifyLogin($identifier, $password)
    {
        $user = $this->findByIdentifier($identifier);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getPdo()
    {
        return $this->db;
    }
}