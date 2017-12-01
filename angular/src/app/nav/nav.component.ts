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
  name = '';

  constructor(private authService: AuthService, private router: Router) {
    this.user_id = this.authService.getId();
    this.name = this.authService.getName();
    if ( !this.authService.isAuth() ) {
      this.set = false;
    } else {
      this.set = true;
    }
  }

  ngOnInit() {
    this.user_id = this.authService.getId();
    this.name = this.authService.getName();
    if ( !this.authService.isAuth() ) {
      this.set = false;
    } else {
      this.set = true;
    }
  }

  logout(event) {
    this.user_id = '';
    this.authService.resetLocalStorage();
    this.name = '';
    if ( !this.authService.isAuth() ) {
      this.set = false;
    } else {
      this.set = true;
    }
    this.router.navigate(['/login']);
  }
}
