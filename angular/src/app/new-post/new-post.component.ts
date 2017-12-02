import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';

import { PostService } from "../post.service";
import { AuthService } from '../auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-new-post',
  templateUrl: './new-post.component.html',
  styleUrls: ['./new-post.component.css']
})
export class NewPostComponent implements OnInit {
  id;
  constructor(private postService: PostService, private authService: AuthService, private router: Router) { }

  ngOnInit() {
  }

  onSubmit(form: NgForm){
    this.id = this.authService.getId();
    if( this.id != null ){
      this.postService.addPost(this.id, form.value.title, form.value.body)
      .subscribe(
        //() => alert('Post created')
      );
      form.reset();
      this.router.navigate(['/']);


    }
    else{
      alert('not signed in');
    }
  }

}
