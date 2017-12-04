<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Post;

class PostTest extends TestCase {
    use DatabaseMigrations;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    /*
    public function setUp(){
        parent::setUp();
        Artisan::call('migrate');
    }*/

    public function test_user_posts(){
        /*
        User::create([
            'firstName' => 'Armine',
            'lastName' => 'Khachatryan',
            'email' => 'armine@gmail.com',
            'password' => bcrypt('armine')
        ]);
        
        Post::create([
            'user_id' => 1,
            'title' => 'first post',
            'body' => 'blogger'
        ]);
        Post::create([
            'user_id' => 1,
            'title' => 'second post',
            'body' => 'iblog'
        ]);
        
        $user = User::find('armine@gmail.com');
        $posts = $user->posts();

        $a = [1,2];
        $this->assertCount(2, $posts);
        */
        
        // check if users table is empty
        $init_users = User::all();
        $this->assertEquals(0, count($init_users));
        
        // create a user (user id will be 1)
        $user = factory(User::class)->create();

        // check if user was created
        $after_users = User::all();
        $this->assertEquals(1, count($after_users));

        // create a new post for user 1
        $post = $user->posts()->create([
            'title' => 'Post Title',
            'body' => 'Post body'
        ]);

        // get all posts for user_id of 1 and check
        $found_post = Post::find(1);
        $this->assertEquals($found_post->title, 'Post Title');
        $this->assertEquals($found_post->body, 'Post body');
        //$this->seeInDatabase('posts', ['id' => 1, 'title' => 'Post Title', 'body' => 'Post body']);
    }
}