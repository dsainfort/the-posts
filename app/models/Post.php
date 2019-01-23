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
    }