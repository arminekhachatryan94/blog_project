import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';

import { AuthService } from '../auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  error: string;

  constructor(private authService: AuthService, private router: Router) { }

  ngOnInit() {
  }

  onLogin(form: NgForm){
    this.authService.login(form.value.email, form.value.password)
      .subscribe(
        tokenData => console.log(tokenData),
        // error => console.log(error)
        error => (this.error = error)
      );
    if( !this.error ){
      /**/this.router.navigate(['/']);
    }
  }

}
