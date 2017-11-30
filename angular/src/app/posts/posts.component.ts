import { Component, OnInit } from '@angular/core';
import { Response } from '@angular/http';
import { Post } from "../post.interface";
import { PostService } from "../post.service";
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-posts',
  templateUrl: './posts.component.html',
  styleUrls: ['./posts.component.css']
})
export class PostsComponent implements OnInit {
  user_id: string;
  posts: Post[];
  error: Response;

  constructor(private postService: PostService, private authService: AuthService) {
    this.postService.getPosts().subscribe(
      (posts: Post[]) => this.posts = posts,
      (error: Response) => console.log(error)
    );
    this.user_id = authService.getId();
  }

  ngOnInit() {
    this.user_id = this.authService.getId();
  }

  onGetPosts(){
    this.postService.getPosts().subscribe(
      (posts: Post[]) => this.posts = posts,
      (error: Response) => console.log(error)
    );
  }

  onDeleted(post: Post){
    const position = this.posts.findIndex(
      (postEl: Post) => {
        return postEl.id === post.id;
      }
    );
    this.posts.splice(position, 1);
  }
}
