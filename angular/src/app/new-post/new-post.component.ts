import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';

import { PostService } from "../post.service";
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-new-post',
  templateUrl: './new-post.component.html',
  styleUrls: ['./new-post.component.css']
})
export class NewPostComponent implements OnInit {
  id;
  constructor(private postService: PostService, private authService: AuthService) { }

  ngOnInit() {
  }

  onSubmit(form: NgForm){
    this.id = this.authService.getId();
    if( this.id != null ){
      this.postService.addPost(this.id, form.value.title, form.value.body)
      .subscribe(
        () => alert('Post created')
      );
      form.reset();
    }
    else{
      console.log('not signed in');
    }
  }

}
