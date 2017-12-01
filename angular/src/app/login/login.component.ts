import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';

import { AuthService } from '../auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  error: string;
  message: string;

  constructor(private authService: AuthService, private router: Router) { }

  ngOnInit() {
  }

  onLogin(form: NgForm) {
    console.log(form.value.email);
    console.log(form.value.password);
    this.authService.login(form.value.email, form.value.password)
      .subscribe(
        tokenData => {
          console.log(tokenData);
          console.log(this.authService.isAuth());
          if ( this.authService.isAuth() ) {
            form.reset();
            location.reload();
            this.router.navigate(['/posts']);
            alert('Welcome');
          }
          else {
            form.reset();
            this.router.navigate(['/login']);
            alert('Invalid credentials. Please try again');
          }
        },
        error => (this.error = error)
      );
      console.log(form.value.email);
      console.log(form.value.password);
  }

}
