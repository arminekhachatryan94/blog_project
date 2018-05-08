import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { provideRoutes} from '@angular/router';
import { LocationStrategy, HashLocationStrategy } from '@angular/common';
import { APP_BASE_HREF } from '@angular/common';

import { AppComponent } from './app.component';
import { PostComponent } from './post/post.component';
import { PostsComponent } from './posts/posts.component';
import { NewPostComponent } from './new-post/new-post.component';
import { routing } from './app.routing';
import { PostService } from './post.service';
import { RegisterComponent } from './register/register.component';
import { LoginComponent } from './login/login.component';
import { AuthService } from './auth.service';
import { NavComponent } from './nav/nav.component';
import { EqualValidator } from './equal-validator.directive';

@NgModule({
  declarations: [
    AppComponent,
    PostComponent,
    PostsComponent,
    NewPostComponent,
    RegisterComponent,
    LoginComponent,
    NavComponent,
    EqualValidator
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    routing
  ],
  providers: [PostService, AuthService, { provide: APP_BASE_HREF, useValue : '/' }],
  bootstrap: [AppComponent]
})
export class AppModule { }
