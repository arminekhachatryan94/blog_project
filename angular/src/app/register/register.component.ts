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
  message: string;
  constructor(private authService: AuthService, private router: Router) { }

  ngOnInit() {
  }

  onRegister(form: NgForm){
    this.authService.register( form.value.name, form.value.email, form.value.password )
      .subscribe(
        response => {
          this.message = response['message'];
        }
        // error => console.log(error)
      )

    if( this.message === 'Successfully created user!' ){
      this.router.navigate(['/login']);
    }
    else{
      window.scrollTo(0, 0);
    }
  }

}
