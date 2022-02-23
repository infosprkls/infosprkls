<?php

namespace App\Repositories;


interface RepositoryInterface
{
    /**
     * Get's a post by it's ID
     *
     * @param int
     */
    public function get($id);

    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a post.
     *
     * @param  $post
     * @param array
     */
    public function update($id, array $post_data);

    public function create($data);
}
