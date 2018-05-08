import { Component } from '@angular/core';
import { AuthService } from './auth.service';
import { NavComponent } from './nav/nav.component';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  constructor(private authService: AuthService){
  }

  ngOnInit(){
  }

}
