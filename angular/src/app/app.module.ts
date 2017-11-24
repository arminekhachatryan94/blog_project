import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { provideRoutes} from '@angular/router';

import { AppComponent } from "./app.component";
import { PostComponent } from "./post/post.component";
import { PostsComponent } from "./posts/posts.component";
import { NewPostComponent } from "./new-post/new-post.component";
import { routing } from "./app.routing";
import { PostService } from "./post.service";

@NgModule({
  declarations: [
    AppComponent,
    PostComponent,
    PostsComponent,
    NewPostComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    routing
  ],
  providers: [PostService],
  bootstrap: [AppComponent]
})
export class AppModule { }
