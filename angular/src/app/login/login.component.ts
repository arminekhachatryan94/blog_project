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

  onLogin(form: NgForm){
    this.authService.login(form.value.email, form.value.password)
      .subscribe(
        tokenData => console.log(tokenData),
        error => (this.error = error)
        //error => (this.error = error)
      );
    if( this.error ){
      this.router.navigate(['/']);
      alert('Welcome');
    }
    else{
      window.scrollTo(0, 0);
      alert('Invalid credentials. Please try again');
    }
  }

}
