import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

import { Post } from "../post.interface";
import { PostService } from "../post.service";
@Component({
  selector: 'app-post',
  templateUrl: './post.component.html',
  styleUrls: ['./post.component.css']
})
export class PostComponent implements OnInit {  
  @Input() post: Post;
  @Output() postDeleted = new EventEmitter<Post>();
  editing =  false;
  editBody = '';

  constructor(private postService: PostService) { }

  ngOnInit() {
  }

  onEdit(){
    this.editing = true;
    this.editBody = this.post.body;
  }

  onUpdate(){
    this.postService.updatePost(this.post.id, this.editBody)
    .subscribe(
      (post: Post) => {
        this.post.body = this.editBody;
        this.editBody = '';
      }
    );
    this.editBody = '';
    this.editing = false;
  }

  onCancel(){
    this.editBody = '';
    this.editing = false;
  }

  onDelete(){
    this.postService.deletePost(this.post.id)
    .subscribe(
      () => {
        this.postDeleted.emit(this.post);
        console.log('Post deleted');
      }
    );
  }
}
