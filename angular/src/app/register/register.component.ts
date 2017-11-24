import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';

import { AuthService } from '../auth.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

  constructor(private authService: AuthService) { }

  ngOnInit() {
  }

  onRegister(form: NgForm){
    this.authService.register( form.value.name, form.value.email, form.value.password )
      .subscribe(
        response => console.log(response),
        error => console.log(error)
      );
  }

}
