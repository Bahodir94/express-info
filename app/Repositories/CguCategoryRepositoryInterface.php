<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 19.08.2019
 * Time: 21:57
 */

namespace App\Repositories;


interface CguCategoryRepositoryInterface
{
    /**
     * Get's a post by it's ID
     *
     * @param int
     */
    public function get($post_id);

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
    public function delete($post_id);

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($post_id, array $post_data);

    /**
     * Store a post
     *
     * @param array $post_data
     * @return mixed
     */
    public function store(array $post_data);
}