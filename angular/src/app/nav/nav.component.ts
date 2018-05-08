import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.css']
})
export class NavComponent implements OnInit {
  title = '';
  set = false;
  user_id = '';
  firstName = '';
  lastName = '';

  constructor(private authService: AuthService, private router: Router) {
    this.user_id = this.authService.getId();
    this.firstName = this.authService.getFirstName();
    this.lastName = this.authService.getLastName();
    if ( !this.authService.isAuth() ) {
      this.set = false;
    } else {
      this.set = true;
    }
  }

  ngOnInit() {
    this.user_id = this.authService.getId();
    this.firstName = this.authService.getFirstName();
    this.lastName = this.authService.getLastName();
    if ( !this.authService.isAuth() ) {
      this.set = false;
    } else {
      this.set = true;
    }
  }

  logout(event) {
    this.user_id = '';
    this.authService.resetLocalStorage();
    this.firstName = '';
    this.lastName = '';
    if ( !this.authService.isAuth() ) {
      this.set = false;
    } else {
      this.set = true;
    }
    this.router.navigate(['/login']);
  }
}
