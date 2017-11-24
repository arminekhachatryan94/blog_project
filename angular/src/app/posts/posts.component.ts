import { Component, OnInit } from '@angular/core';
import { Response } from '@angular/http';

import { Post } from "../post.interface";
import { PostService } from "../post.service";

@Component({
  selector: 'app-posts',
  templateUrl: './posts.component.html',
  styleUrls: ['./posts.component.css']
})
export class PostsComponent implements OnInit {
  posts: Post[];
  constructor(private postService: PostService) { }

  ngOnInit() {
  }

  onGetPosts(){
  	this.postService.getPosts().subscribe(
  		(posts: Post[]) => this.posts = posts,
  		(error: Response) => console.log(error)
  	);
  }
}
