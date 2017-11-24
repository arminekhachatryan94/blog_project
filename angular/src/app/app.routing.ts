
import { ModuleWithProviders } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { PostsComponent } from "./posts/posts.component";
import { NewPostComponent } from "./new-post/new-post.component";
import { RegisterComponent } from "./register/register.component";
import { LoginComponent } from "./login/login.component";

const APP_ROUTES: Routes = [
	{ path: '', component: PostsComponent },
	{ path: 'new-post', component: NewPostComponent },
	{ path: 'register', component: RegisterComponent },
	{ path: 'login', component: LoginComponent }	
	
];

export const routing: ModuleWithProviders = RouterModule.forRoot(APP_ROUTES);