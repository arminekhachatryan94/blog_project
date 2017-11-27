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
  name = '';

  constructor(private authService: AuthService, private router: Router){
  }

  ngOnInit(){
    this.name = this.authService.getName();
    if( this.name == '' ){    
      this.set = false;
    }
    else{
      this.set = true;
    }
  }

  logout(event){
    this.authService.resetLocalStorage();
    this.name = this.authService.getName();
    if( !this.name ){    
      this.set = false;
    }
    else{
      this.set = true;
    }
    this.router.navigate(['/login']);
  }
}
