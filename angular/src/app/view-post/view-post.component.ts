import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-view-post',
  templateUrl: './view-post.component.html',
  styleUrls: ['./view-post.component.css']
})
export class ViewPostComponent implements OnInit {

  constructor(private route: ActivatedRoute) {
  }

  ngOnInit() {
    this.route.params.subscribe( params => {
      console.log(params);
    });
  }

}
