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
    console.log(form.value.email);
    console.log(form.value.password);
    this.authService.login(form.value.email, form.value.password)
      .subscribe(
        tokenData => console.log(tokenData),
        error => (this.error = error)
      );
      console.log(form.value.email);
      console.log(form.value.password);
  
    if( this.authService.isAuth() ){
      this.router.navigate(['/']);
      alert('Welcome');
    }
    else{
      form.reset();
      this.router.navigate(['/login']);
      alert('Invalid credentials. Please try again');
    }
  }

}
