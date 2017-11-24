import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';

import { PostService } from "../post.service";

@Component({
  selector: 'app-new-post',
  templateUrl: './new-post.component.html',
  styleUrls: ['./new-post.component.css']
})
export class NewPostComponent implements OnInit {

  constructor(private postService: PostService) { }

  ngOnInit() {
  }

  onSubmit(form: NgForm){
    this.postService.addPost(form.value.body)
    .subscribe(
      () => alert('Post created')
    );
    form.reset();
  }

}
