<?php
    class Post {
        private $db;

        public function __construct () {
            $this->db = new Database;
        }

        public function getPosts () {
            $this->db->query('SELECT *,
                                posts.id as postId,
                                user.id as userId,
                                posts.createdAt as postCreated
                                FROM posts
                                INNER JOIN user
                                ON posts.user_id = user.id
                                ORDER BY posts.createdAt DESC
                                ');
            $results = $this->db->resultSet();
            return $results;
        }
        
        public function addPost ($data) {
            $this->db->query('INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)');
            // Bind values parameter defined in
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            //Save Data
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }