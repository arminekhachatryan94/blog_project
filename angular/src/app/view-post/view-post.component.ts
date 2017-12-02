import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Post } from "../post.interface";
import { PostService } from "../post.service";
import { AuthService } from '../auth.service';
import { Response } from '@angular/http';

@Component({
  selector: 'app-view-post',
  templateUrl: './view-post.component.html',
  styleUrls: ['./view-post.component.css']
})
export class ViewPostComponent implements OnInit {
  post: Post;
  error: Response;
  id: number;
  user_id: string;

  constructor(private route: ActivatedRoute, private postService: PostService, private authService: AuthService, private router: Router) {
    this.user_id = authService.getId();

    this.route.params.subscribe( params => {
      this.id = +params['id'];
    });
    console.log('params: ' + this.id);

    this.postService.getOnePost(this.id).subscribe(
      (post: Post) => this.post = post,
      (error: Response) => console.log(error),
    );
  }

  ngOnInit() {
    this.user_id = this.authService.getId();
  }
  

}
