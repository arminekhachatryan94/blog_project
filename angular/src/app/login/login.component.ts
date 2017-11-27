import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { FlashMessagesService } from 'angular2-flash-messages';

import { AuthService } from '../auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  error: string;

  constructor(private authService: AuthService, private router: Router, private _flashMessagesService: FlashMessagesService) { }

  ngOnInit() {
  }

  onLogin(form: NgForm){
    this.authService.login(form.value.email, form.value.password)
      .subscribe(
        tokenData => console.log(tokenData),
        // error => console.log(error)
        error => (this.error = error)
      );
    if( this.error != null ){
      this._flashMessagesService.show('Welcome back!', { cssClass: 'alert-success', timeout: 1000 });
      /**/this.router.navigate(['/']);
    }
    else{
      this._flashMessagesService.show('Invalid credentials. Please try again!', { cssClass: 'alert-danger', timeout: 1000 });
    }
  }

}
