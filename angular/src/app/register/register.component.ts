import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';

import { AuthService } from '../auth.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {
  error: string;
  message: string;
  constructor(private authService: AuthService, private router: Router) { }

  ngOnInit() {
  }

  onRegister(form: NgForm){
    this.authService.register( form.value.firstName, form.value.lastName, form.value.email, form.value.password )
      .subscribe(
        response => {
          alert(response['message']);
        },
        error => {
          this.error = error;
        }
      );
  }
}
