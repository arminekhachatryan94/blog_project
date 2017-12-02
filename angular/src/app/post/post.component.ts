import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

import { Post } from '../post.interface';
import { PostService } from '../post.service';
import { Router } from '@angular/router';
import { AuthService } from '../auth.service';
import { Comment } from '../comment.interface';
import { User } from '../user.interface';

@Component({
  selector: 'app-post',
  templateUrl: './post.component.html',
  styleUrls: ['./post.component.css']
})
export class PostComponent implements OnInit {
  user_id: string;
  @Input() post: Post;
  @Output() postDeleted = new EventEmitter<Post>();

  editing =  false;
  editTitle = '';
  editBody = '';

  viewComments = false;
  // comments: Comment[];

  constructor(private postService: PostService, private router: Router, private authService: AuthService) {
    this.user_id = authService.getId();
  }

  ngOnInit() {
    this.user_id = this.authService.getId();
  }

  onEdit() {
    this.editing = true;
    this.editTitle = this.post.title;
    this.editBody = this.post.body;
  }

  onUpdate() {
    this.postService.updatePost(this.post.id, this.editTitle, this.editBody)
    .subscribe(
      (post: Post) => {
        this.post.title = this.editTitle;
        this.post.body = this.editBody;
        this.editTitle = '';
        this.editBody = '';
      }
    );
    this.editTitle = '';
    this.editBody = '';
    this.editing = false;
    location.reload();
    alert('Post has been updated!');
  }

  onCancel() {
    this.editTitle = '';
    this.editBody = '';
    this.editing = false;
  }

  onDelete(){
    this.postService.deletePost(this.post.id)
    .subscribe(
      () => {
        this.postDeleted.emit(this.post);
        alert('Post deleted');
      }
    );
  }

  showComments(){
    this.viewComments = true;
  }

  hideComments(){
    this.viewComments = false;
  }
}
